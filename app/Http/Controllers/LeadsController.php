<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Lead;

class LeadsController extends Controller
{
    private $validations;

    public function __construct()
    {
        $this->validations = [
            'name' => 'required',
            'email' => 'required|email',
            'date_of_birth' => 'required|date',
            'phone' => 'required',
            'package' => 'sometimes',
        ];
    }

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
        $data = $this->validate($request, $this->validations);

        $package = '';
        if ($request->has('package')) {
            $package = $request->input('package');
        }

        $dateOfBirth = Carbon::parse($data['date_of_birth']);
        $age = $dateOfBirth->age;

        Lead::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'date_of_birth' => $dateOfBirth,
            'age' => $age,
            'phone' => $data['phone'],
            'branch_id' => 1,
            'user_id' => Auth::user()->id,
            'package' => $package,
        ]);

        return redirect()->route('lead.index');
    }

    public function view(Lead $lead)
    {
        $lead->load(['reminders']);

        return Inertia::render('Leads/View', ['lead-prop' => $lead]);
    }

    public function update(Request $request)
    {
        $rules = $this->validations;
        $rules['id'] = 'required|exists:leads';

        $data = $this->validate($request, $rules);
        $data['age'] = Carbon::parse($data['date_of_birth'])->age;

        $lead = Lead::where('id', $data['id'])->update($data);

        return redirect()->route('lead.index');
    }
}
