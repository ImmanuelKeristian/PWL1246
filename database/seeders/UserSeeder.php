<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '2272046',
            'nama' => 'Immanuel Christian',
            'email' => 'iman055@gmail.com',
            'password' => Hash::make('cbzdavid123'),
            'role' => 'Admin'
        ]);

        User::create([
            'id' => '2272012',
            'nama' => 'Christian Adriel',
            'email' => '2272012@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'Prodi'
        ]);
    }
}
