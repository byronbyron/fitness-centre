<?php

use App\Reminder;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RemindersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reminder::create([
            'lead_id' => 1,
            'user_id' => 1,
            'reminder' => 'Call to check on the membership',
            'reminder_date' => Carbon::now()->subDays(3),
            'note' => 'Customer asked to call again after 2 days.',
            'status' => 'completed',
        ]);

        Reminder::create([
            'lead_id' => 2,
            'user_id' => 1,
            'reminder' => 'A reminder to call the customer again.',
            'reminder_date' => Carbon::now()->subDays(2),
            'status' => 'pending',
        ]);

        Reminder::create([
            'lead_id' => 2,
            'user_id' => 1,
            'reminder' => 'A reminder to call the customer again.',
            'reminder_date' => Carbon::now()->subDays(2),
            'note' => 'Not interested in a plan.',
            'status' => 'completed',
        ]);
    }
}
