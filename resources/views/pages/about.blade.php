@extends('layouts.app')
@section('title', 'About | ' . config('site.name'))
@section('description', 'About BetterDoc DMS, a product of ' . config('site.company') . '.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">About</h1>
  <div class="mt-6 grid lg:grid-cols-2 gap-8 items-center">
    <div>
      <p class="text-slate-600">BetterDoc DMS is a product of {{ config('site.company') }}, based in Harare, Zimbabwe. We build secure document management and workflow software for organisations that cannot depend on the cloud.</p>
      <p class="mt-3 text-slate-600">Contact: {{ config('site.email') }} | {{ config('site.phone') }}</p>
      <p class="mt-3 text-slate-600">{{ config('site.address') }}</p>
    </div>
    <div><img src="{{ asset('images/about.jpg') }}" alt="Our team" class="rounded-[14px] border border-[#E2E8F0]" loading="lazy"></div>
  </div>
</section>
@endsection
