<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();
        // Employee::factory(3)->create();
        LeaveRequest::factory(3)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);

        // Employee::create(
        //     [
        //         'name' => 'Fakhrul',
        //         'type' => 'Part-Time'
        //     ]
        // );

        // Employee::create(
        //     [
        //         'name' => 'Nik',
        //         'type' => 'Full-Time'
        //     ]
        // );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
