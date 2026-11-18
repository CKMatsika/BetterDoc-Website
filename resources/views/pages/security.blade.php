@extends('layouts.app')
@section('title', 'Security | ' . config('site.name'))
@section('description', 'How BetterDoc DMS protects data: encryption, clearance enforcement, audit trail, backups, data stays in your building by default.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">How your data is protected</h1>
  <ul class="mt-6 space-y-3 text-slate-700">
    <li><strong>Encryption:</strong> data encrypted at rest and in backups.</li>
    <li><strong>Clearance enforcement:</strong> users never see, search for or receive documents above their level.</li>
    <li><strong>Audit trail:</strong> tamper-evident record of every action.</li>
    <li><strong>Backups:</strong> encrypted backups, including off-site encrypted copies.</li>
    <li><strong>Data location:</strong> by default, data stays in your building.</li>
  </ul>
  <h2 class="mt-10 text-xl font-bold">Standards we design to</h2>
  <p class="mt-2 text-slate-600">BetterDoc DMS is designed to align with:</p>
  <ul class="mt-3 list-disc pl-6 text-slate-700">
    @foreach(config('site.standards') as $s)
      <li>{{ $s }}</li>
    @endforeach
  </ul>
  <p class="mt-4 text-sm text-slate-500">No certification is claimed. Standards list is editable in config.</p>
</section>
@endsection
