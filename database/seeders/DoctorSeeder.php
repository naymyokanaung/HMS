<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Doctor::create([
            "name" => "Dr David",
            "email" => "david@gmail.com",
            "phone" => "09789066652",
            "specialization" => "operation",
            "department_id" => 1,
        ]);

        Doctor::create([
            "name" => "Dr Sain",
            "email" => "sain@gmail.com",
            "phone" => "09789066652",
            "specialization" => "child",
            "department_id" => 2,
        ]);
    }
}
