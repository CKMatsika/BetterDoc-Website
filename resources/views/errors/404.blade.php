@extends('layouts.app')
@section('title', 'Page not found | ' . config('site.name'))
@section('description', 'Page not found.')
@section('content')
<section class="max-w-[640px] mx-auto px-4 sm:px-6 pt-16 text-center">
  <h1 class="text-3xl font-bold">404</h1>
  <p class="mt-3 text-slate-600">Page not found.</p>
  <a href="{{ route('home') }}" class="mt-6 inline-block text-[#0E7C66]">Home</a>
</section>
@endsection
