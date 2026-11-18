@extends('layouts.app')
@section('title', 'Defence and government | ' . config('site.name'))
@section('description', 'BetterDoc DMS for defence and government: clearance levels, correspondence registers and secure printing.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Defence and government</h1>
  <p class="mt-3 text-slate-600 max-w-2xl">Real problems in plain language: clearance levels that actually hold, correspondence registers that are complete, and printing that cannot leak.</p>
  <div class="mt-8 grid md:grid-cols-3 gap-5">
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">Clearance levels</h3>
      <p class="mt-2 text-sm text-slate-600">People never see, search for or receive documents above their level. No workarounds.</p>
    </div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">Correspondence registers</h3>
      <p class="mt-2 text-sm text-slate-600">Track incoming and outgoing correspondence with routing and status.</p>
    </div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">Secure printing</h3>
      <p class="mt-2 text-sm text-slate-600">One-click printing with secure release and watermarking, so paper cannot quietly leave the building.</p>
    </div>
  </div>
</section>
@endsection
