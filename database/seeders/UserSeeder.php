<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

          [

            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'stanley@gmail.com',
            'phone_number' => '0717960821',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('admin.password')
          ],


            [

                'name' => 'Student User',
                'username' => 'student',
                'email' => 'student@gmail.com',
                'phone_number' => '0717960820',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('student.password')
            ],

            [

              'name' => 'Felix Owino',
              'username' => 'felix',
              'email' => 'alicx00@gmail.com',
              'phone_number' => '0717960822',
              'role' => 'user',
              'status' => 'active',
              'password' => bcrypt('felix.password')
            ], 
            
            [

              'name' => 'Jane Doe',
              'username' => 'Doe',
              'email' => 'kizeima20@gmail.com',
              'phone_number' => '0717960823',
              'role' => 'user',
              'status' => 'active',
              'password' => bcrypt('jane.password')
            ], 


            [

              'name' => 'Internal Supervisor',
              'username' => 'InternalSup',
              'email' => 'internalsup@gmail.com',
              'phone_number' => '0717960823',
              'role' => 'internal_supervisor',
              'status' => 'active',
              'password' => bcrypt('password')
            ], 
            


        ]);
    }
}
