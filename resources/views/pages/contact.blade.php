@extends('layouts.app')
@section('title', 'Contact / Book a demo | ' . config('site.name'))
@section('description', 'Book a demo of BetterDoc DMS.')
@section('content')
<section class="max-w-[640px] mx-auto px-4 sm:px-6 pt-12">
  <h1 class="text-3xl font-bold">Book a demo</h1>
  <p class="mt-2 text-slate-600">Tell us about your organisation.</p>
  @if($errors->any())
    <div class="mt-4 bg-red-50 border border-red-200 text-red-700 rounded p-3 text-sm">
      <ul class="list-disc pl-5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif
  <form method="POST" action="{{ route('contact.store') }}" class="mt-6 space-y-4">
    @csrf
    <div style="position:absolute;left:-9999px;" aria-hidden="true">
      <label for="website">Website</label>
      <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
    </div>
    <div>
      <label for="name" class="block text-sm font-medium">Name</label>
      <input id="name" name="name" type="text" required value="{{ old('name') }}" class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
    </div>
    <div>
      <label for="organisation" class="block text-sm font-medium">Organisation</label>
      <input id="organisation" name="organisation" type="text" required value="{{ old('organisation') }}" class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
    </div>
    <div>
      <label for="email" class="block text-sm font-medium">Work email</label>
      <input id="email" name="email" type="email" required value="{{ old('email') }}" class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
    </div>
    <div>
      <label for="phone" class="block text-sm font-medium">Phone</label>
      <input id="phone" name="phone" type="text" value="{{ old('phone') }}" class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
    </div>
    <div>
      <label for="industry" class="block text-sm font-medium">Industry</label>
      <select id="industry" name="industry" required class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
        <option value="">Select</option>
        @foreach(['defence'=>'Defence','government'=>'Government','banking'=>'Banking & finance','corporate'=>'Corporate','other'=>'Other'] as $v=>$l)
          <option value="{{ $v }}" @selected(old('industry')===$v)>{{ $l }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="size" class="block text-sm font-medium">Organisation size</label>
      <select id="size" name="size" required class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">
        <option value="">Select</option>
        @foreach(['1-50','51-200','201-1000','1000+'] as $s)
          <option value="{{ $s }}" @selected(old('size')===$s)>{{ $s }}</option>
        @endforeach
      </select>
    </div>
    <div>
      <label for="message" class="block text-sm font-medium">Message</label>
      <textarea id="message" name="message" rows="4" class="mt-1 w-full border border-[#E2E8F0] rounded-[14px] px-3 py-2">{{ old('message') }}</textarea>
    </div>
    <button type="submit" class="bg-[#0E7C66] hover:bg-[#0A6552] text-white px-6 py-3 rounded-[14px] font-medium">Send request</button>
  </form>
  <div class="mt-8 text-sm text-slate-600">
    <p>WhatsApp: <a href="{{ config('site.whatsapp') }}" class="text-[#0E7C66]">{{ config('site.whatsapp') }}</a></p>
    <p>Email: <a href="mailto:{{ config('site.email') }}" class="text-[#0E7C66]">{{ config('site.email') }}</a></p>
  </div>
</section>
@endsection
