@extends('layouts.app')
@section('title', 'Banking and finance | ' . config('site.name'))
@section('description', 'BetterDoc DMS for banking and finance: invoice processing, KYC document packs and audit trails.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Banking and finance</h1>
  <p class="mt-3 text-slate-600 max-w-2xl">Invoice processing, KYC document packs and audit trails that stand up to scrutiny.</p>
  <div class="mt-8 grid md:grid-cols-3 gap-5">
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5"><h3 class="font-semibold">Invoice processing</h3><p class="mt-2 text-sm text-slate-600">AI capture extracts data from invoices; humans review before filing.</p></div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5"><h3 class="font-semibold">KYC document packs</h3><p class="mt-2 text-sm text-slate-600">Keep customer document packs complete, current and access-controlled.</p></div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5"><h3 class="font-semibold">Audit trails</h3><p class="mt-2 text-sm text-slate-600">Tamper-evident record of every action for compliance and audit.</p></div>
  </div>
</section>
@endsection
