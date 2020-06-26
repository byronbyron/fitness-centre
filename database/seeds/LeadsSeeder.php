<?php

use Illuminate\Database\Seeder;

class LeadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Lead::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '01234567890',
            'package' => 'Annual package',
            'date_of_birth' => '1990-10-08',
            'age' => 29,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        App\Lead::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '09876543210',
            'package' => 'Annual package',
            'date_of_birth' => '1991-11-09',
            'age' => 28,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        App\Lead::create([
            'name' => 'Joe Blogs',
            'email' => 'joe@example.com',
            'phone' => '01234345623',
            'package' => 'Monthly package',
            'date_of_birth' => '1993-03-17',
            'age' => 26,
            'user_id' => 1,
            'branch_id' => 1,
        ]);
    }
}
