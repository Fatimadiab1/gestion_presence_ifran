<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin IFRAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    @vite('resources/css/admin.css')
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

        <div class="cards">
            <div class="card"><i class="bi bi-columns-gap"></i><h3>Classes<br>21</h3></div>
            <div class="card"><i class="bi bi-journal"></i><h3>Matières<br>230</h3></div>
            <div class="card"><i class="bi bi-mortarboard"></i><h3>Étudiants<br>340</h3></div>
            <div class="card"><i class="bi bi-person-badge"></i><h3>Coordinateurs<br>5</h3></div>
            <div class="card"><i class="bi bi-person-workspace"></i><h3>Professeurs<br>14</h3></div>
            <div class="card"><i class="bi bi-people"></i><h3>Parents<br>345</h3></div>
        </div>

        <div class="highlight-box">
            <h3>Année académique : 2025-2026</h3>
            <a href="#">Modifier l'année</a>
        </div>

        <div class="chart-box">
            <h4>Effectif des étudiants par année scolaire</h4>
            <img src="{{ asset('images/fake-chart.png') }}" alt="chart" style="width:100%;">
        </div>

        <div class="user-list">
            <h4>Liste des utilisateurs (1004)</h4>
            <button>Filtrer par rôle</button>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Chawki+Khalife" alt=""><span>Chawki Khalife</span> &mdash; Étudiant</div>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Diab+Fatima" alt=""><span>Diab Fatima</span> &mdash; Étudiant</div>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Banga+Florian" alt=""><span>Banga Florian</span> &mdash; Étudiant</div>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Sarah+Traore" alt=""><span>Sarah Traoré</span> &mdash; Coordinatrice</div>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Abou+Djalo" alt=""><span>Abou Djalo</span> &mdash; Professeur</div>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Jean+Martin" alt=""><span>Jean Martin</span> &mdash; Professeur</div>
            <div class="user"><img src="https://ui-avatars.com/api/?name=Celia+Bintou" alt=""><span>Celia Bintou</span> &mdash; Étudiant</div>
        </div>
    </div>
</body>
</html>
