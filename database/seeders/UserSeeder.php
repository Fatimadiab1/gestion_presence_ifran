<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\ParentModel;
use App\Models\Coordinateur;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'nom' => 'Admin',
            'prenom' => 'Test',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        // Étudiant
        $etudiant = User::create([
            'nom' => 'Étudiant',
            'prenom' => 'Test',
            'email' => 'etudiant@test.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        Etudiant::create(['user_id' => $etudiant->id]);

        // Professeur
        $prof = User::create([
            'nom' => 'Professeur',
            'prenom' => 'Test',
            'email' => 'prof@test.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
        Professeur::create(['user_id' => $prof->id]);

        // Parent
        $parent = User::create([
            'nom' => 'Parent',
            'prenom' => 'Test',
            'email' => 'parent@test.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
        ]);
        ParentModel::create(['user_id' => $parent->id]);

        // Coordinateur
        $coor = User::create([
            'nom' => 'Coordinateur',
            'prenom' => 'Test',
            'email' => 'coor@test.com',
            'password' => Hash::make('password'),
            'role_id' => 5,
        ]);
        Coordinateur::create(['user_id' => $coor->id]);
    }
}
