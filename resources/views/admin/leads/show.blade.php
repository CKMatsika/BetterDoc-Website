<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lead | Admin</title>
  <meta name="robots" content="noindex,nofollow">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F8FA] text-[#0F172A]">
  <div class="max-w-[800px] mx-auto px-4 sm:px-6 py-8">
    <a href="{{ route('admin.leads.index') }}" class="text-sm text-[#0E7C66]">Back</a>
    <h1 class="text-2xl font-bold mt-2">{{ $lead->name }}</h1>
    <div class="mt-4 bg-white border border-[#E2E8F0] rounded-[14px] p-5 space-y-2 text-sm">
      <p><strong>Organisation:</strong> {{ $lead->organisation }}</p>
      <p><strong>Email:</strong> {{ $lead->email }}</p>
      <p><strong>Phone:</strong> {{ $lead->phone }}</p>
      <p><strong>Industry:</strong> {{ $lead->industry }}</p>
      <p><strong>Size:</strong> {{ $lead->size }}</p>
      <p><strong>Status:</strong> {{ $lead->status }}</p>
      <p><strong>Message:</strong> {{ $lead->message }}</p>
    </div>
    @if($lead->status !== 'contacted')
    <form method="POST" action="{{ route('admin.leads.contacted', $lead) }}" class="mt-4">@csrf @method('PATCH')<button class="bg-[#0E7C66] text-white px-4 py-2 rounded-[14px] text-sm">Mark contacted</button></form>
    @endif
  </div>
</body>
</html>
