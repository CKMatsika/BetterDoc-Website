<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leads | Admin</title>
  <meta name="robots" content="noindex,nofollow">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F7F8FA] text-[#0F172A]">
  <div class="max-w-[1180px] mx-auto px-4 sm:px-6 py-8">
    <div class="flex items-center justify-between">
      <h1 class="text-2xl font-bold">Leads</h1>
      <div class="flex gap-3">
        <a href="{{ route('admin.leads.export') }}" class="border border-[#E2E8F0] bg-white px-4 py-2 rounded-[14px] text-sm">Export CSV</a>
        <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="text-sm text-slate-600">Logout</button></form>
      </div>
    </div>
    <form method="GET" class="mt-4">
      <input name="q" value="{{ $q }}" placeholder="Search" class="border border-[#E2E8F0] rounded-[14px] px-3 py-2">
      <button class="bg-[#0E7C66] text-white px-4 py-2 rounded-[14px] text-sm">Search</button>
    </form>
    <div class="mt-6 bg-white border border-[#E2E8F0] rounded-[14px] overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-slate-50">
          <tr><th class="px-4 py-3 text-left">Name</th><th class="px-4 py-3 text-left">Org</th><th class="px-4 py-3 text-left">Email</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3"></th></tr>
        </thead>
        <tbody>
          @foreach($leads as $lead)
          <tr class="border-t border-[#E2E8F0]">
            <td class="px-4 py-3"><a href="{{ route('admin.leads.show', $lead) }}" class="text-[#0E7C66]">{{ $lead->name }}</a></td>
            <td class="px-4 py-3">{{ $lead->organisation }}</td>
            <td class="px-4 py-3">{{ $lead->email }}</td>
            <td class="px-4 py-3">{{ $lead->status }}</td>
            <td class="px-4 py-3">
              @if($lead->status !== 'contacted')
              <form method="POST" action="{{ route('admin.leads.contacted', $lead) }}">@csrf @method('PATCH')<button class="text-xs text-[#0E7C66]">Mark contacted</button></form>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-4">{{ $leads->links() }}</div>
  </div>
</body>
</html>
