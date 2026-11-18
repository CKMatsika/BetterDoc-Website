@extends('layouts.app')
@section('title', 'How we work | ' . config('site.name'))
@section('description', 'Onboarding steps: discovery, pilot, installation, training, support.')
@section('content')
<section class="max-w-[1180px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">How we work</h1>
  <ol class="mt-8 space-y-4">
    @foreach(['Discovery','Pilot','Installation','Training','Support'] as $i => $s)
    <li class="bg-white border border-[#E2E8F0] rounded-[14px] p-5">
      <div class="font-semibold">{{ $i+1 }}. {{ $s }}</div>
      <p class="mt-1 text-sm text-slate-600">We {{ strtolower($s) }} with you to get BetterDoc running in your organisation.</p>
    </li>
    @endforeach
  </ol>
</section>
@endsection
