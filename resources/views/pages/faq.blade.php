@extends('layouts.app')
@section('title', 'FAQ | ' . config('site.name'))
@section('description', 'Frequently asked questions about BetterDoc DMS.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Frequently asked questions</h1>
  <div class="mt-8 space-y-4">
    @php
    $faqs = [
      ['Does it work offline?', 'Yes. BetterDoc runs on your own network and needs no internet.'],
      ['Where is my data?', 'By default, data stays in your building.'],
      ['How do signatures work?', 'Offline signatures using your own certificates, with tamper detection.'],
      ['Does the AI need the cloud?', 'No. AI runs on your own server, with human review.'],
      ['What is the pricing model?', 'Contact us for pricing.'],
      ['What support is included?', 'Installation, training and ongoing support.'],
      ['Can we migrate from paper?', 'Yes. Scanning with OCR converts paper to searchable PDFs.'],
      ['What hardware do we need?', 'See the Deployment page for small, medium and large options.'],
      ['Who can see sensitive documents?', 'Only users cleared at the right level.'],
      ['Is there an audit trail?', 'Yes, tamper-evident audit trail.'],
    ];
    @endphp
    @foreach($faqs as $f)
    <details class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <summary class="font-semibold cursor-pointer">{{ $f[0] }}</summary>
      <p class="mt-2 text-slate-600">{{ $f[1] }}</p>
    </details>
    @endforeach
  </div>
</section>
@endsection
