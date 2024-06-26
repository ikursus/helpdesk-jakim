<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data User 1
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'), // Hash::make('admin')
            'phone' => '0123456789'
        ]);

        // Data User 2
        DB::table('users')->insert([
            'name' => 'Demo User 1',
            'email' => 'demo1@gmail.com',
            'password' => bcrypt('demo1'), // Hash::make('demo1')
            'phone' => '0123456789'
        ]);

        // Data User 3
        DB::table('users')->insert([
            'name' => 'Demo User 2',
            'email' => 'demo2@gmail.com',
            'password' => bcrypt('demo2'), // Hash::make('demo2')
            'phone' => '0123456789'
        ]);
    }
}
