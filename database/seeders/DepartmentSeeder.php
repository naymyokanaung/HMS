<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Department::create([
            "name" => "Surgeon",
            "description" => "Surgeon",
            "phone" => "09787326272",
            "location" => "Building A, room 001",
        ]);

        Department::create([
            "name" => "Child",
            "description" => "Child",
            "phone" => "09787275622",
            "location" => "Building B, room 001",
        ]);
    }
}
