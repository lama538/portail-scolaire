<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Portail Scolaire') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white border-r border-gray-200 shadow-md hidden sm:block">

            <div class="p-4 text-xl font-bold text-blue-700 border-b border-gray-200">
    🎓 Portail Scolaire
</div>

            <nav class="px-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-blue-100">🏠 Tableau de bord</a>
                <a href="{{ route('eleves.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">👨‍🎓 Élèves</a>
                <a href="{{ route('enseignants.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">👩‍🏫 Enseignants</a>
                <a href="{{ route('classes.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">🏷️ Classes</a>
                <a href="{{ route('bulletins.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">📑 Bulletins</a>
                <a href="{{ route('notes.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">📋 Notes</a>

                <a href="{{ route('niveaux.index') }}" class="flex py-2 px-3 rounded hover:bg-green-100 items-center text-green-700 font-semibold">
                    {{-- Icône Niveaux --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12h3v7H3v-7zM9 8h3v11H9V8zM15 4h3v15h-3V4z" />
                    </svg>
                    Niveaux
                </a>

                <a href="{{ route('matieres.index') }}" class="flex py-2 px-3 rounded hover:bg-blue-100 items-center text-blue-700 font-semibold">
                    {{-- Icône Matières --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-6-6h12" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 19a8 8 0 0116 0v-14a8 8 0 00-16 0v14z" />
                    </svg>
                    Matières
                </a>

                <a href="{{ route('affectations.index') }}" class="flex py-2 px-3 rounded hover:bg-indigo-100 items-center text-indigo-700 font-semibold">
    {{-- Icône Affectations --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 00-8 0v4H5a2 2 0 00-2 2v5a2 2 0 002 2h14a2 2 0 002-2v-5a2 2 0 00-2-2h-3V7z" />
    </svg>
    Affectations
</a>


                <a href="{{ route('periodes.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">📅 Périodes</a>
                <a href="{{ route('annees.index') }}" class="block py-2 px-3 rounded hover:bg-blue-100">📆 Années scolaires</a>

                <a href="#" class="block py-2 px-3 rounded hover:bg-blue-100 text-red-600">🔓 Déconnexion</a>
            </nav>
        </aside>

        {{-- Contenu principal --}}
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-700">@yield('title', 'Dashboard')</h1>
                <div class="text-sm text-gray-600">
                    {{ Auth::user()->name ?? 'Admin' }}
                </div>
            </header>

            <!-- Contenu -->
            <main class="flex-1 p-6 overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
