<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Test',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        User::create([
            'nom' => 'Étudiant',
            'prenom' => 'Test',
            'email' => 'etudiant@test.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);

        User::create([
            'nom' => 'Professeur',
            'prenom' => 'Test',
            'email' => 'prof@test.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);

        User::create([
            'nom' => 'Parent',
            'prenom' => 'Test',
            'email' => 'parent@test.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
        ]);

        User::create([
            'nom' => 'Coordinateur',
            'prenom' => 'Test',
            'email' => 'coor@test.com',
            'password' => Hash::make('password'),
            'role_id' => 5,
        ]);
    }
}
