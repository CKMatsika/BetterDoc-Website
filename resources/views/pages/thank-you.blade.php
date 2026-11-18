@extends('layouts.app')
@section('title', 'Thank you | ' . config('site.name'))
@section('description', 'Thank you for your request.')
@section('content')
<section class="max-w-[640px] mx-auto px-4 sm:px-6 pt-16 text-center">
  <h1 class="text-3xl font-bold">Thank you</h1>
  <p class="mt-3 text-slate-600">We have received your request and will be in touch.</p>
  <a href="{{ route('home') }}" class="mt-6 inline-block text-[#0E7C66]">Back to home</a>
</section>
@endsection
