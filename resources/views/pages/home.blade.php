@extends('layouts.app')
@section('title', 'Document management that works when the internet doesn\'t. | ' . config('site.name'))
@section('description', 'BetterDoc DMS is a secure, on-premises document management and workflow platform. Clearance-level access, offline signatures, AI capture on your own server. Runs fully offline.')
@section('structured_data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Organization",
  "name": "{{ config('site.name') }}",
  "url": "{{ url('/') }}",
  "email": "{{ config('site.email') }}",
  "telephone": "{{ config('site.phone') }}"
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "BetterDoc DMS",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "On-premises",
  "description": "{{ config('site.description') }}"
}
</script>
@endsection
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-16 pb-12">
  <div class="grid lg:grid-cols-2 gap-12 items-center">
    <div>
      <span class="inline-block text-xs font-medium bg-[#DDF3EC] text-[#0E7C66] px-3 py-1 rounded-full">On-premises document management</span>
      <h1 class="mt-4 text-4xl sm:text-5xl font-bold leading-tight">Document management that works when the internet doesn't.</h1>
      <p class="mt-5 text-lg text-slate-600">BetterDoc DMS runs on your organisation's own network. No cloud dependency, no data leaving your building, no downtime when connectivity drops. Built for organisations where documents are sensitive and the internet is unreliable.</p>
      <div class="mt-7 flex flex-wrap gap-3">
        <a href="{{ route('contact') }}" class="bg-[#0E7C66] hover:bg-[#0A6552] text-white px-6 py-3 rounded-[14px] font-medium">Book a demo</a>
        <a href="{{ route('features') }}" class="border border-[#E2E8F0] bg-white hover:bg-slate-50 px-6 py-3 rounded-[14px] font-medium">See features</a>
      </div>
    </div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-6 shadow-sm">
      {{-- pure CSS document mock-up --}}
      <div class="bg-[#F7F8FA] rounded-lg p-4">
        <div class="flex items-center gap-2 mb-3">
          <div class="w-3 h-3 rounded-full bg-red-400"></div>
          <div class="w-3 h-3 rounded-full bg-amber-400"></div>
          <div class="w-3 h-3 rounded-full bg-green-400"></div>
        </div>
        <div class="bg-white rounded border border-[#E2E8F0] p-4">
          <div class="h-3 w-2/3 bg-slate-200 rounded mb-2"></div>
          <div class="h-3 w-full bg-slate-100 rounded mb-2"></div>
          <div class="h-3 w-5/6 bg-slate-100 rounded mb-4"></div>
          <div class="grid grid-cols-3 gap-2">
            <div class="h-16 bg-[#DDF3EC] rounded flex items-center justify-center text-xs text-[#0E7C66] font-medium">Cleared</div>
            <div class="h-16 bg-slate-100 rounded flex items-center justify-center text-xs text-slate-500">Pending</div>
            <div class="h-16 bg-slate-100 rounded flex items-center justify-center text-xs text-slate-500">Signed</div>
          </div>
          <div class="mt-4 flex gap-2">
            <div class="h-8 flex-1 bg-[#0E7C66] rounded text-white text-xs flex items-center justify-center">Approve</div>
            <div class="h-8 flex-1 border border-[#E2E8F0] rounded text-xs flex items-center justify-center">Reject</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="max-w-[1180px] mx-auto px-4 sm:px-6 py-12">
  <h2 class="text-2xl font-bold">Everything you need to run documents end to end</h2>
  <p class="mt-2 text-slate-600">Six capabilities that cover the full document lifecycle.</p>
  <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
    @php
    $cards = [
      ['Clearance-level access', 'People never see, search for or receive documents above their level.'],
      ['Offline digital signatures', 'Sign using your own certificates, with tamper detection.'],
      ['AI document capture', 'Classification and data extraction on your own server, with human review.'],
      ['Secure printing', 'One-click printing with secure release and watermarking.'],
      ['Scan and OCR', 'Scan to searchable PDFs with full-text search.'],
      ['Workflows', 'Approvals, deadlines and escalations, tracked end to end.'],
    ];
    @endphp
    @foreach($cards as $c)
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <div class="w-9 h-9 rounded-lg bg-[#DDF3EC] flex items-center justify-center text-[#0E7C66] font-bold">{{ substr($c[0],0,1) }}</div>
      <h3 class="mt-3 font-semibold">{{ $c[0] }}</h3>
      <p class="mt-1 text-sm text-slate-600">{{ $c[1] }}</p>
    </div>
    @endforeach
  </div>
</section>

<section class="max-w-[1180px] mx-auto px-4 sm:px-6 py-12">
  <h2 class="text-2xl font-bold">From capture to archive in four steps</h2>
  <ol class="mt-8 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
    @php $steps = ['Capture','Classify','Route and sign','Archive']; @endphp
    @foreach($steps as $i => $s)
    <li class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <div class="text-sm font-medium text-[#0E7C66]">Step {{ $i+1 }}</div>
      <div class="mt-1 font-semibold">{{ $s }}</div>
    </li>
    @endforeach
  </ol>
</section>

<section class="max-w-[1180px] mx-auto px-4 sm:px-6 py-12">
  <h2 class="text-2xl font-bold">How BetterDoc compares</h2>
  <p class="mt-2 text-slate-600">Against a typical cloud-first DMS.</p>
  <div class="mt-6 overflow-x-auto">
    <table class="w-full text-sm border border-[#E2E8F0] rounded-[14px] overflow-hidden">
      <thead class="bg-slate-50">
        <tr>
          <th class="text-left px-4 py-3">Capability</th>
          <th class="text-left px-4 py-3">BetterDoc DMS</th>
          <th class="text-left px-4 py-3">Typical cloud-first DMS</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Works fully offline</td><td class="px-4 py-3 text-[#0E7C66]">Yes</td><td class="px-4 py-3 text-slate-500">No</td></tr>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Data stays in your building</td><td class="px-4 py-3 text-[#0E7C66]">By default</td><td class="px-4 py-3 text-slate-500">Cloud hosted</td></tr>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Clearance-level access</td><td class="px-4 py-3 text-[#0E7C66]">Yes</td><td class="px-4 py-3 text-slate-500">Role based only</td></tr>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Offline signatures with tamper detection</td><td class="px-4 py-3 text-[#0E7C66]">Yes</td><td class="px-4 py-3 text-slate-500">Cloud signing</td></tr>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">AI on your own server</td><td class="px-4 py-3 text-[#0E7C66]">Yes</td><td class="px-4 py-3 text-slate-500">Cloud AI</td></tr>
      </tbody>
    </table>
  </div>
</section>

<section class="max-w-[1180px] mx-auto px-4 sm:px-6 py-12">
  <h2 class="text-2xl font-bold">Deployment options</h2>
  <div class="mt-6 grid md:grid-cols-3 gap-5">
    @foreach(['On-premises (fully offline)','On-premises with encrypted cloud backup','Managed hosting'] as $d)
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">{{ $d }}</h3>
      <p class="mt-2 text-sm text-slate-600">Choose the option that fits your connectivity and compliance needs.</p>
    </div>
    @endforeach
  </div>
</section>

<section class="max-w-[1180px] mx-auto px-4 sm:px-6 py-16 text-center">
  <h2 class="text-3xl font-bold">Ready to see BetterDoc in action?</h2>
  <p class="mt-3 text-slate-600">Book a demo and we will walk you through it.</p>
  <a href="{{ route('contact') }}" class="mt-6 inline-block bg-[#0E7C66] hover:bg-[#0A6552] text-white px-6 py-3 rounded-[14px] font-medium">Book a demo</a>
</section>
@endsection
