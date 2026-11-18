@extends('layouts.app')
@section('title', 'Features | ' . config('site.name'))
@section('description', 'Detailed capabilities of BetterDoc DMS: clearance access, offline signatures, AI capture, secure printing, scanning OCR, workflows, audit trail, retention, encryption, correspondence registry.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Features</h1>
  <p class="mt-2 text-slate-600">One detailed section per capability.</p>
</section>

@php
$keys = ['clearance_access','offline_signatures','ai_capture','secure_printing','scan_ocr','workflows','audit_trail','retention_hold','encrypted_storage','correspondence_registry'];
$sections = [
 ['Clearance-level access control', 'People never see, search for or receive documents above their level.', 'Your documents carry a clearance level. Users only ever see what they are cleared for — in search results, in notifications, in shared links.'],
 ['Offline digital signatures', 'Sign using your organisation\'s own certificates, with tamper detection.', 'Signatures are created offline with your own certificates. Any later change to the document breaks the signature, so tampering is detectable.'],
 ['AI document capture', 'Classification and data extraction on your own server, with human review.', 'AI runs on your server: it classifies documents and extracts data, then a human reviews before anything is filed.'],
 ['Secure printing', 'One-click printing with secure release and watermarking.', 'Print jobs are held until released at the printer, and every page carries a watermark tied to the user and time.'],
 ['Scanning with OCR', 'Scan to searchable PDFs with full-text search.', 'Scan paper into searchable PDFs so the whole archive becomes searchable.'],
 ['Workflows', 'Approvals, deadlines and escalations, tracked end to end.', 'Route documents for approval with deadlines; escalate when deadlines are missed.'],
 ['Tamper-evident audit trail', 'Every action is recorded and cannot be quietly changed.', 'A complete record of who did what and when, protected against tampering.'],
 ['Retention and legal hold', 'Keep documents for as long as required, and freeze them when needed.', 'Define retention rules and place legal holds that prevent deletion.'],
 ['Encrypted storage and backups', 'Data encrypted at rest and in backup.', 'Storage and backups are encrypted; backups can be taken off-site encrypted.'],
 ['Correspondence registry', 'Track incoming and outgoing correspondence.', 'A registry for letters and correspondence with routing and status.'],
];
@endphp

@foreach($sections as $i => $s)
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 py-10 border-t border-[#E2E8F0]">
  <div class="grid lg:grid-cols-2 gap-8 items-center">
    <div>
      <div class="flex items-center gap-2">
        <h2 class="text-2xl font-bold">{{ $s[0] }}</h2>
        @php $st = config('features.features.'.$keys[$i].'.status', 'available'); @endphp
        @if($st !== 'available')
          <span class="text-xs bg-[#F59E0B] text-white px-2 py-0.5 rounded">{{ config('features.statuses.'.$st) }}</span>
        @endif
      </div>
      <p class="mt-2 text-sm font-medium text-[#0E7C66]">{{ $s[1] }}</p>
      <p class="mt-3 text-slate-600">{{ $s[2] }}</p>
    </div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-6 h-48 flex items-center justify-center overflow-hidden">
      <img src="{{ asset('images/feature1.jpg') }}" alt="Feature illustration" class="h-full w-full object-cover rounded" loading="lazy">
    </div>
  </div>
</section>
@endforeach
@endsection
