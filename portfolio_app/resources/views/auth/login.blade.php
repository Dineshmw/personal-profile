<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Dinesh Weerasekara</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
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
<body class="bg-gray-900 text-gray-100 font-sans min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full p-8 bg-gray-800 rounded-2xl shadow-xl border border-gray-700">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-accent mb-2">Admin Portal</h1>
            <p class="text-gray-400">Sign in to manage your portfolio</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            @if ($errors->any())
                <div class="bg-red-500/10 border border-red-500/50 text-red-500 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full bg-gray-900 border border-gray-700 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full bg-gray-900 border border-gray-700 rounded-lg py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
            </div>

            <button type="submit"
                class="w-full py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-gradient-to-r from-primary to-accent hover:from-blue-600 hover:to-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary focus:ring-offset-gray-900 transition-all">
                Sign In
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <a href="/" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Portfolio</a>
        </div>
    </div>

</body>
</html>
