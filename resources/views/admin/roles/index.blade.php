@extends('layouts.admin')

@section('content')
    <h2 class="mb-4">Liste des rôles</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du rôle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ ucfirst($role->nom) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
