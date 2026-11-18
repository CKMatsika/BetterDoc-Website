<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin login | {{ config('site.name') }}</title>
  <meta name="robots" content="noindex,nofollow">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F8FA] text-[#0F172A] min-h-screen flex items-center justify-center">
  <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-8 w-full max-w-md">
    <h1 class="text-xl font-bold">Admin login</h1>
    <form method="POST" action="{{ route('admin.login.store') }}" class="mt-6 space-y-4">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium">Email</label>
        <input id="email" name="email" type="email" required class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
      </div>
      <div>
        <label for="password" class="block text-sm font-medium">Password</label>
        <input id="password" name="password" type="password" required class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
      </div>
      @if(config('site.admin_2fa_enabled'))
      <div>
        <label for="otp" class="block text-sm font-medium">2FA code</label>
        <input id="otp" name="otp" type="text" class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
      </div>
      @endif
      @if($errors->any())
        <div class="text-red-600 text-sm">{{ $errors->first() }}</div>
      @endif
      <button type="submit" class="w-full bg-[#0E7C66] hover:bg-[#0A6552] text-white px-6 py-3 rounded-[14px] font-medium">Sign in</button>
    </form>
  </div>
</body>
</html>
