<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'idUser'=> '003',
                'namaUser'=>'Christian Adriel',
                'emailUser'=>'2272012@gmail.com',
                'roleUser'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'idUser'=> '004',
                'namaUser'=>'Murid1',
                'emailUser'=>'murid1@gmail.com',
                'roleUser'=>'student',
                'password'=>bcrypt('123456')
            ],
            [
                'idUser'=> '005',
                'namaUser'=>'programstudi',
                'emailUser'=>'progstu@gmail.com',
                'roleUser'=>'program',
                'password'=>bcrypt('123456')
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
