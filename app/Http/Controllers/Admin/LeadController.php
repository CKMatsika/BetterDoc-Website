<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->string('q')->toString();
        $leads = Lead::query()
            ->when($q, fn ($query) => $query->where(function ($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                    ->orWhere('organisation', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            }))
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.leads.index', compact('leads', 'q'));
    }

    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    public function markContacted(Lead $lead)
    {
        $lead->update(['status' => 'contacted', 'contacted_at' => now()]);

        return back()->with('status', 'Marked as contacted.');
    }

    public function export(): StreamedResponse
    {
        $filename = 'leads-'.now()->format('Y-m-d').'.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        return response()->stream(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['id', 'name', 'organisation', 'email', 'phone', 'industry', 'size', 'status', 'created_at']);
            Lead::orderBy('id')->chunk(200, function ($leads) use ($handle) {
                foreach ($leads as $lead) {
                    fputcsv($handle, [
                        $lead->id,
                        $this->csvSafe((string) $lead->name),
                        $this->csvSafe((string) $lead->organisation),
                        $this->csvSafe((string) $lead->email),
                        $this->csvSafe((string) ($lead->phone ?? '')),
                        $lead->industry,
                        $lead->size,
                        $lead->status,
                        $lead->created_at,
                    ]);
                }
            });
            fclose($handle);
        }, 200, $headers);
    }

    private function csvSafe(string $value): string
    {
        if ($value !== '' && in_array($value[0], ['=', '+', '-', '@', "\t", "\r"], true)) {
            return "'".$value;
        }

        return $value;
    }
}
