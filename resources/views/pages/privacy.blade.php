@extends('layouts.app')
@section('title', 'Privacy notice | ' . config('site.name'))
@section('description', 'Privacy notice for ' . config('site.name') . '.')
@section('content')
<section class="max-w-[800px] mx-auto px-4 sm:px-6 pt-12 prose">
  <h1 class="text-3xl font-bold">Privacy notice</h1>
  <p class="mt-3 text-slate-600">Privacy notice for {{ config('site.name') }}, a product of {{ config('site.company') }}. Contact {{ config('site.email') }}.</p>
</section>
@endsection
