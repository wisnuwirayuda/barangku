<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username'      => 'officer',
                'email'         => 'officer@mrg.com',
                'password'      => Hash::make('officer'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'username'      => 'manager',
                'email'         => 'manager@mrg.com',
                'password'      => Hash::make('manager'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'username'      => 'finance',
                'email'         => 'finance@mrg.com',
                'password'      => Hash::make('finance'),
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
