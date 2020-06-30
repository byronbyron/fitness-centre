<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Reminder;
use App\Lead;

class RemindersController extends Controller
{
    public function create(Lead $lead)
    {
        return Inertia::render('Reminders/Create', ['lead' => $lead]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'reminder' => 'required|min:3',
            'reminder_date' => 'required|date',
            'lead_id' => 'required|exists:leads,id'
        ]);

        $data['user_id'] = $request->user()->id;
        $data['status'] = 'pending';

        $lead = Lead::find($data['lead_id']);
        $lead->reminders()->create($data);

        return redirect()->route('lead.view', ['lead' => $lead]);
    }

    public function view(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Reminders/View', [
            'lead' => $lead,
            'reminder' => $reminder
        ]);
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'reminder_id' => 'required|exists:reminders,id'
        ]);

        $reminder = Reminder::find($data['reminder_id']);
        $reminder->status = 'completed';
        $reminder->save();

        $lead = Lead::find($reminder->lead_id);

        return redirect()->route('reminder.create', ['lead' => $lead]);
    }

    public function addNote(Lead $lead, Reminder $reminder)
    {
        return Inertia::render('Reminders/Note', [
            'lead' => $lead,
            'reminder' => $reminder
        ]);
    }

    public function close(Request $request)
    {
        $data = $this->validate($request, [
            'reminder_id' => 'required|exists:reminders,id',
            'note' => 'required|min:3',
        ]);

        $reminder = Reminder::find($data['reminder_id']);
        $reminder->note = $data['note'];
        $reminder->status = 'completed';
        $reminder->save();

        $lead = Lead::find($reminder->lead_id);

        return redirect()->route('lead.view', ['lead' => $lead]);
    }
}
