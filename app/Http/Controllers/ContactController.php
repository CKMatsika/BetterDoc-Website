<?php

namespace App\Http\Controllers;

use App\Mail\LeadReceived;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Honeypot
        if ($request->filled('website')) {
            return redirect()->route('thank-you');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'organisation' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:60'],
            'industry' => ['required', Rule::in(['defence', 'government', 'banking', 'corporate', 'other'])],
            'size' => ['required', Rule::in(['1-50', '51-200', '201-1000', '1000+'])],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $lead = Lead::create(array_merge($validated, [
            'ip_address' => $request->ip(),
            'status' => 'new',
        ]));

        Mail::to(config('site.lead_notification_email'))
            ->queue(new LeadReceived($lead));

        return redirect()->route('thank-you');
    }
}
