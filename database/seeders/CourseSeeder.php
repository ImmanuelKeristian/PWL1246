<?php

namespace Database\Seeders;

use App\Models\Matkul;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CourseSeeder extends Seeder
{
    public function run()
    {
        // Insert the first course
        Matkul::create([
            'idCourse'      => '7',
            'codeCourse'    => 'IN227',
            'nameCourse'    => 'Bahasa Inggris',
            'statusCourse'  => 'Open',
            'created_at'    => '2024-04-20 15:22:09',
            'updated_at'    => '2024-04-20 15:22:09',
            'sks'           => '3'
        ]);

        // Insert the second course
        Matkul::create([
            'idCourse'      => '8',
            'codeCourse'    => 'IN239',
            'nameCourse'    => 'Pancasila',
            'statusCourse'  => 'Open',
            'created_at'    => '2024-04-20 15:22:09',
            'updated_at'    => '2024-04-20 15:22:09',
            'sks'           => '2'
        ]);
    }
}