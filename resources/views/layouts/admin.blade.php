<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin IFRAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- si tu utilises Vite -->
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('images/logo-ifran-light.png') }}" alt="IFRAN">
        </div>
  <a href="{{ route('admin.dashboard') }}"><i class="bi bi-house-door-fill"></i> Accueil</a>
<a href="{{ route('admin.roles.index') }}"><i class="bi bi-shield-lock"></i> Rôles disponibles</a>

<!-- 🔽 Menu déroulant Utilisateurs -->
<div class="dropdown">
    <a href="#"><i class="bi bi-person-circle"></i> Utilisateurs</a>
    <div class="dropdown-content">
        <a href="{{ route('admin.users.index') }}">Liste des utilisateurs</a>
        <a href="{{ route('admin.users.create') }}">Créer un utilisateur</a>
    </div>
</div>

<a href="#"><i class="bi bi-calendar2-week"></i> Année académique</a>
<a href="#"><i class="bi bi-clock-history"></i> Trimestres</a>
<a href="#"><i class="bi bi-building"></i> Classes</a>
<a href="#"><i class="bi bi-journal-bookmark"></i> Matières</a>
<a href="#"><i class="bi bi-ui-checks"></i> Types de cours</a>
<a href="#"><i class="bi bi-record-circle"></i> Statut de séance</a>
<a href="#"><i class="bi bi-check2-square"></i> Statut de présence</a>
<a href="#"><i class="bi bi-diagram-3"></i> Gérer les passages</a>


        <div class="bottom">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <i class="bi bi-box-arrow-right"></i> Déconnexion
                </button>
            </form>
        </div>
    </div>

    <!-- Main content -->
    <div class="main">
        <div class="top-bar">
            <h1>Dashboard Administrateur</h1>
            <input type="text" placeholder="Chercher une donnée . . .">
        </div>

        <div class="content-wrapper px-4 py-3">
            @yield('content')
        </div>
    </div>
</body>
</html>
