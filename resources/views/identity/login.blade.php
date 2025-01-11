<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Laravel 11</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-800 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-[50rem] bg-gray-900 p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-center text-white mb-4">Login Aplikasi</h2>
            <p class="text-center text-gray-400 mb-6">Silahkan login untuk mengakses aplikasi</p>

            @if (session('failed'))
                <p class="text-red-500 text-xs text-center mb-4">{{ session('failed') }}</p>
            @endif

            <form action="{{ route('login.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input type="email" name="email" id="email" class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-2 bg-gray-700 text-white border border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="w-full py-2 px-4 bg-gradient-to-r from-indigo-500 to-indigo-700 text-white font-semibold rounded-lg shadow-md transform transition duration-200 hover:scale-105 hover:shadow-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 hover:bg-indigo-800">
                        Login
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-sm text-gray-400">
                Belum punya akun? <a href="{{ route('registrasi.show') }}" class="text-indigo-400 hover:text-indigo-500 font-semibold transition duration-300 ease-in-out">Daftar sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>
