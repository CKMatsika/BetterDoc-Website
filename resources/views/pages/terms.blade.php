@extends('layouts.app')
@section('title', 'Terms | ' . config('site.name'))
@section('description', 'Terms for ' . config('site.name') . '.')
@section('content')
<section class="max-w-[800px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Terms</h1>
  <p class="mt-3 text-slate-600">Terms for {{ config('site.name') }}, a product of {{ config('site.company') }}.</p>
</section>
@endsection
