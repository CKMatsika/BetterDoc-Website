@extends('layouts.app')
@section('title', 'Deployment | ' . config('site.name'))
@section('description', 'Deployment options for BetterDoc DMS: on-premises, on-premises with encrypted cloud backup, managed hosting, and hardware needs.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Deployment</h1>
  <div class="mt-8 grid md:grid-cols-3 gap-5">
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">On-premises (fully offline)</h3>
      <div class="mt-3 h-24 bg-[#F7F8FA] rounded flex items-center justify-center text-xs text-slate-500">[diagram: server in building]</div>
      <p class="mt-3 text-sm text-slate-600">Everything runs inside your network. No internet required.</p>
    </div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">On-premises + encrypted cloud backup</h3>
      <div class="mt-3 h-24 bg-[#F7F8FA] rounded flex items-center justify-center text-xs text-slate-500">[diagram: server + encrypted backup]</div>
      <p class="mt-3 text-sm text-slate-600">Local operation with encrypted off-site backups.</p>
    </div>
    <div class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <h3 class="font-semibold">Managed hosting</h3>
      <div class="mt-3 h-24 bg-[#F7F8FA] rounded flex items-center justify-center text-xs text-slate-500">[diagram: hosted instance]</div>
      <p class="mt-3 text-sm text-slate-600">We host and operate it for you.</p>
    </div>
  </div>
  <h2 class="mt-10 text-xl font-bold">Typical hardware needs</h2>
  <div class="mt-4 overflow-x-auto">
    <table class="w-full text-sm border border-[#E2E8F0] rounded-[14px]">
      <thead class="bg-slate-50"><tr><th class="px-4 py-3 text-left">Size</th><th class="px-4 py-3 text-left">Hardware</th></tr></thead>
      <tbody>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Small</td><td class="px-4 py-3">Single server, 16GB RAM, 1TB storage</td></tr>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Medium</td><td class="px-4 py-3">Server with 32GB RAM, 4TB storage, backup target</td></tr>
        <tr class="border-t border-[#E2E8F0]"><td class="px-4 py-3">Large</td><td class="px-4 py-3">Clustered servers, redundant storage, dedicated backup</td></tr>
      </tbody>
    </table>
  </div>
</section>
@endsection
