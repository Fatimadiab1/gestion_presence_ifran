<h1>Bienvenue Étudiant</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Déconnexion</button>
</form>
