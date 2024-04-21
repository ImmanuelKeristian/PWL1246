<?php

namespace Database\Seeders;

use App\Models\course;
use App\Models\Polls;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        course::create([
            'idCourse' => '1',
            'codeCourse' => 'IN241',
            'nameCourse' => 'Statistika',
            'statusCourse' => 'Open'
        ]);
    }
}
