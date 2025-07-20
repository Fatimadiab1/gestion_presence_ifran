<?php

namespace App\Http\Controllers;

use App\Models\Role;

class RoleController extends Controller
{
    // Afficher la liste des roles

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }
    
}
