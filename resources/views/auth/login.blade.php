<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion IFRAN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite('resources/css/login.css')
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>

<body class="min-h-screen">
{{-- Bar du haut --}}
    <div class="flex justify-between items-center px-6 py-6">

<div class="h-10 flex items-center">
    <img src="{{ asset('images/logo-ifran-light.png') }}" alt="Logo IFRAN clair" class="h-28 block dark:hidden">
    <img src="{{ asset('images/logo-ifran-dark.png') }}" alt="Logo IFRAN sombre" class="h-44 hidden dark:block">
</div>
        <div class="flex items-center gap-4">
            <a href="https://ifran.ci/" class="text-sm hover:underline flex items-center gap-2">
                <i class="fas fa-globe text-lg"></i>
                <span>Site web</span>
            </a>
            <button onclick="toggleTheme()" class="text-lg border border-gray-300 dark:border-gray-600 px-2 py-1 rounded hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                <i class="fas fa-adjust"></i>
            </button>
        </div>
    </div>

    {{-- Section principale --}}
    <div class="flex flex-col items-center justify-center px-4 min-h-[calc(100vh-80px)]">

        {{-- Titre --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl title-ifran mb-1">Espace <span class="text-[#FF0047]">IFRAN</span></h1>
            <p class="text-lg">Accédez à votre espace personnel IFRAN</p>
        </div>

        {{-- Formulaire --}}
        <div class="w-full max-w-md bg-white dark:bg-[#4D5066] p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Connexion</h2>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block font-medium mb-1">Identifiant</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        placeholder="ex : nom@exemple.com"
                        class="w-full p-2 rounded-lg bg-gray-100 dark:bg-gray-800 dark:text-white placeholder-gray-400 focus:outline-none" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-medium mb-1">Mot de passe</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        placeholder="Votre mot de passe"
                        class="w-full p-2 rounded-lg bg-gray-100 dark:bg-gray-800 dark:text-white placeholder-gray-400 focus:outline-none" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <div class="mb-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-white hover:underline transition">Mot de passe oublié ?</a>
                </div>

                <button type="submit"
                    class="w-full bg-[#FF0047] hover:bg-[#2B2F4D] text-white py-2 rounded-lg font-bold text-lg transition duration-300">
                    Se connecter
                </button>
            </form>
        </div>
    </div>


    <script>
        function toggleTheme() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>
</body>
</html>
