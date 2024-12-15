<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Mouha',
            'email' => 'dhenbio@gmail.com',
            'password' => Hash::make('dhenbio@gmail.com'),
            'is_admin' => true
        ]);
    }
}