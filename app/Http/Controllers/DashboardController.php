<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Reminder;

class DashboardController extends Controller
{
    public function index()
    {
        $reminders = Reminder::query()
            ->with(['lead'])
            ->where('reminders.reminder_date', now()->format('Y-m-d'))
            ->where('reminders.user_id', Auth::user()->id)
            ->where('reminders.status', 'pending')
            ->get();

        $data = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'reminders' => $reminders,
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
