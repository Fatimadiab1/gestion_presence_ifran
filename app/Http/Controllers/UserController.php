<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\ParentModel;
use App\Models\Coordinateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Afficher la liste des users
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.users.index', compact('users'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $roles = Role::where('nom', '!=', 'admin')->get();
        return view('admin.users.create', compact('roles'));
    }

    // Enregistrer un user
    public function store(Request $request)
    {
        $request->validate([
            'nom'      => 'required|string|min:2|max:50|regex:/^[A-Za-z\s\-]+$/',
            'prenom'   => 'required|string|min:2|max:50|regex:/^[A-Za-z\s\-]+$/',
            'email'    => 'required|email|unique:users,email',
             'password' => 'required|string|min:6|confirmed',
            'role_id'  => 'required|exists:roles,id',
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = basename($request->file('photo')->store('photos', 'public'));
        }

        // Créer un user
        $user = User::create([
            'nom'      => $request->nom,
            'prenom'   => $request->prenom,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
            'photo'    => $photoPath,
        ]);

        // Vérifier le role
        $role = Role::find($request->role_id);
        if (!$role || strtolower($role->nom) === 'admin') {
            return redirect()->route('admin.users.index')->with('error', 'Création de rôle non autorisé.');
        }

        // Associer a la table correspondante
        switch (strtolower($role->nom)) {
            case 'etudiant':
                Etudiant::create(['user_id' => $user->id]);
                break;
            case 'professeur':
                Professeur::create(['user_id' => $user->id]);
                break;
            case 'parent':
                ParentModel::create(['user_id' => $user->id]);
                break;
            case 'coordinateur':
                Coordinateur::create(['user_id' => $user->id]);
                break;
        }

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Modifier un user
    public function edit(User $user)
    {
        $roles = Role::where('nom', '!=', 'admin')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    // Mise a jour de user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom'      => 'required|string|min:2|max:50|regex:/^[A-Za-z\s\-]+$/',
            'prenom'   => 'required|string|min:2|max:50|regex:/^[A-Za-z\s\-]+$/',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role_id'  => 'required|exists:roles,id',
             'password' => 'required|string|min:6|confirmed',
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload photo 
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/photos/' . $user->photo)) {
                Storage::delete('public/photos/' . $user->photo);
            }
            $user->photo = basename($request->file('photo')->store('photos', 'public'));
        }

        // Mise a jour des infos
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour.');
    }

    // Supprime un user
    public function destroy(User $user)
    {
        if ($user->photo && Storage::exists('public/photos/' . $user->photo)) {
            Storage::delete('public/photos/' . $user->photo);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé.');
    }
}
