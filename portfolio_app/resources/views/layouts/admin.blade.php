<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Dinesh Weerasekara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'], },
                    colors: { primary: '#3b82f6', secondary: '#1e293b', accent: '#0ea5e9' }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900 flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 min-h-screen text-white shadow-2xl flex flex-col hidden md:flex">
        <div class="h-16 flex items-center px-6 border-b border-gray-800">
            <a href="/" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-accent">DW Admin</a>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.projects.*') ? 'text-primary' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Projects
            </a>
            <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-colors">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.skills.*') ? 'text-primary' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Skills
            </a>
        </nav>
        <div class="p-4 border-t border-gray-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition-colors flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-h-screen bg-gray-50">
        <!-- Top Navbar (Mobile only) -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-4 md:hidden">
            <a href="/" class="text-xl font-bold text-gray-900">DW Admin</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm font-medium text-red-600">Logout</button>
            </form>
        </header>

        <!-- Page Content -->
        <div class="flex-1 p-8">
            <div class="max-w-7xl mx-auto">
                {{-- Flash Messages --}}
                @if (session('success'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200 text-green-700 font-medium">
                        {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
