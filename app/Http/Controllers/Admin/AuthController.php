<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'otp' => ['nullable', 'string'],
        ]);

        $key = 'admin-login:'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            return back()->withErrors(['email' => 'Too many attempts. Try again later.'])->withInput();
        }

        if (! Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'is_admin' => true], $request->boolean('remember'))) {
            RateLimiter::hit($key, 60);

            return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }

        $user = Auth::user();
        if (config('site.admin_2fa_enabled')) {
            $otp = $credentials['otp'] ?? '';
            if (! $this->verifyOtp($user, $otp)) {
                Auth::logout();
                RateLimiter::hit($key, 60);

                return back()->withErrors(['otp' => 'Invalid two-factor code.'])->withInput();
            }
        }

        RateLimiter::clear($key);
        $request->session()->regenerate();

        return redirect()->intended(route('admin.leads.index'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    protected function verifyOtp($user, string $otp): bool
    {
        $secret = config('site.admin_2fa_secret') ?: $user->totp_secret;
        if (! $secret) {
            return true;
        }

        return $this->totp($secret) === $otp;
    }

    protected function totp(string $secret): string
    {
        $key = base32_decode($secret);
        $counter = floor(time() / 30);
        $binary = pack('N*', 0).pack('N*', $counter);
        $hash = hash_hmac('sha1', $binary, $key, true);
        $offset = ord(substr($hash, -1)) & 0x0F;
        $code = (
            ((ord($hash[$offset]) & 0x7F) << 24) |
            ((ord($hash[$offset + 1]) & 0xFF) << 16) |
            ((ord($hash[$offset + 2]) & 0xFF) << 8) |
            (ord($hash[$offset + 3]) & 0xFF)
        ) % 1000000;

        return str_pad((string) $code, 6, '0', STR_PAD_LEFT);
    }
}

function base32_decode(string $b32): string
{
    $b32 = strtoupper($b32);
    $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $bits = '';
    foreach (str_split($b32) as $char) {
        $pos = strpos($alphabet, $char);
        if ($pos === false) {
            continue;
        }
        $bits .= str_pad(decbin($pos), 5, '0', STR_PAD_LEFT);
    }
    $bytes = '';
    foreach (str_split($bits, 8) as $byte) {
        if (strlen($byte) < 8) {
            break;
        }
        $bytes .= chr(bindec($byte));
    }

    return $bytes;
}
