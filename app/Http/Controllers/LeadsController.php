<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lead;

class LeadsController extends Controller
{
    public function index()
    {
        $leads = Lead::query()
            ->where('branch_id', 1)
            ->orderByDesc('id')
            ->get();

        return Inertia::render('Leads/Index', ['leads' => $leads]);
    }

    public function create()
    {
        return Inertia::render('Leads/Create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'phone' => 'required',
        ]);

        $package = '';
        if ($request->has('package')) {
            $package = $request->input('package');
        }

        Lead::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'date_of_birth' => $data['date_of_birth'],
            'phone' => $data['phone'],
            'branch_id' => 1,
            'user_id' => Auth::user()->id,
            'package' => $package,
        ]);

        return redirect()->route('dashboard');
    }

    public function show(Lead $lead)
    {
        return Inertia::render('Leads/Show', ['lead-prop' => $lead]);
    }
}
