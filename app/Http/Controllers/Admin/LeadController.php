<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;

class LeadController extends Controller
{
    public function index()
    {
        return view('admin.leads.index', [
            'leads' => ContactLead::latest()->paginate(20),
        ]);
    }

    public function show(ContactLead $lead)
    {
        if (! $lead->is_read) {
            $lead->update(['is_read' => true]);
        }

        return view('admin.leads.show', ['lead' => $lead]);
    }

    public function destroy(ContactLead $lead)
    {
        $lead->delete();

        return redirect()->route('admin.leads.index')->with('status', 'Lead deleted.');
    }
}
