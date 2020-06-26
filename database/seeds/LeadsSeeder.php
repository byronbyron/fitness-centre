<?php

use App\Lead;
use Carbon\Carbon;
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
        Lead::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '01234567890',
            'package' => 'Annual package',
            'date_of_birth' => Carbon::parse('08/10/1990'),
            'age' => Carbon::parse('08/10/1990')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '09876543210',
            'package' => 'Monthly package',
            'date_of_birth' => Carbon::parse('11/20/1991'),
            'age' => Carbon::parse('11/20/1991')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Joe Blogs',
            'email' => 'joe@example.com',
            'phone' => '01234345623',
            'package' => 'Monthly package',
            'date_of_birth' => Carbon::parse('03/17/1993'),
            'age' => Carbon::parse('03/17/1993')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Mark Wood',
            'email' => 'mark.wood@worldweb.com',
            'phone' => '01234567890',
            'package' => 'Annual plan',
            'date_of_birth' => Carbon::parse('08/08/1986'),
            'age' => Carbon::parse('08/08/1986')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Jesse Wood',
            'email' => 'jesse.wood@worldweb.com',
            'phone' => '09876543210',
            'package' => 'Annual plan',
            'date_of_birth' => Carbon::parse('04/03/1987'),
            'age' => Carbon::parse('04/03/1987')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'James Smith',
            'email' => 'james.smith@worldweb.com',
            'phone' => '01234567890',
            'package' => 'Annual plan',
            'date_of_birth' => Carbon::parse('02/01/1986'),
            'age' => Carbon::parse('02/01/1986')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Shane Hope',
            'email' => 'shane.hope@gmail.com',
            'phone' => '01234560000',
            'package' => 'Monthly plan',
            'date_of_birth' => Carbon::parse('02/05/1982'),
            'age' => Carbon::parse('02/05/1982')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Alan Lamb',
            'email' => 'alan.lamb@worldweb.com',
            'phone' => '09876541234',
            'package' => 'Annual plan',
            'date_of_birth' => Carbon::parse('02/07/1991'),
            'age' => Carbon::parse('02/07/1991')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);

        Lead::create([
            'name' => 'Kunal Kabra',
            'email' => 'kunal.kabra@outlook.com',
            'phone' => '45678901234',
            'package' => 'Monthly plan',
            'date_of_birth' => Carbon::parse('09/09/1983'),
            'age' => Carbon::parse('09/09/1983')->age,
            'user_id' => 1,
            'branch_id' => 1,
        ]);
    }
}
