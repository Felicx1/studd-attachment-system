<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supervisors')->insert([

            [

                'name' => 'James Cherut',
                'email' => 'james@gmail.com',
                'department' => 'software'

            ],

            [

                'name' => 'John Doe',
                'email' => 'johndoe@gmail.com',
                'department' => 'Finance'

            ],
            

        ]);
    }
}
