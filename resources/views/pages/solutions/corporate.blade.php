@extends('layouts.app')
@section('title', 'Corporate | ' . config('site.name'))
@section('description', 'BetterDoc DMS for corporates: contracts and approvals.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Corporate</h1>
  <p class="mt-3 text-slate-600 max-w-2xl">Contracts and approvals without the email chaos.</p>
  <div class="mt-8 grid md:grid-cols-2 gap-5">
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5"><h3 class="font-semibold">Contracts</h3><p class="mt-2 text-sm text-slate-600">Versioned contracts with offline signatures and tamper detection.</p></div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5"><h3 class="font-semibold">Approvals</h3><p class="mt-2 text-sm text-slate-600">Workflows with approvals, deadlines and escalations.</p></div>
  </div>
</section>
@endsection
