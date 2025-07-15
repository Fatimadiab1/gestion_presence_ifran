<h1>Bienvenue Professeur</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Déconnexion</button>
</form>
