<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center px-4
             bg-gradient-to-br from-[#0f172a] via-[#1e1b4b] to-[#312e81]">

<div class="w-full max-w-5xl flex flex-col md:flex-row rounded-3xl overflow-hidden shadow-2xl">

    <!-- LEFT (FORM) -->
    <div class="w-full md:w-1/2 bg-black p-8 md:p-10 text-white">

        <h2 class="text-3xl font-bold text-orange-400 mb-2">
            WELCOME BACK!
        </h2>

        <p class="text-gray-400 text-sm mb-6">
            Please login to continue
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- USERNAME -->
            <div class="mb-4">
                <label class="text-sm text-gray-400">Username</label>
                <input type="text" name="username"
                    class="w-full mt-1 px-4 py-2 bg-transparent border border-orange-400 rounded-full
                           focus:outline-none focus:ring-2 focus:ring-orange-500"
                    value="{{ old('username') }}"
                    required autofocus>
                @if ($errors->has('username'))
                    <span class="text-red-500 text-xs mt-1">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <!-- PASSWORD -->
            <div class="mb-4">
                <label class="text-sm text-gray-400">Password</label>
                <input type="password" name="password"
                    class="w-full mt-1 px-4 py-2 bg-transparent border border-orange-400 rounded-full
                           focus:outline-none focus:ring-2 focus:ring-orange-500"
                    required>
                @if ($errors->has('password'))
                    <span class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- REMEMBER -->
            <div class="flex justify-between items-center text-sm mb-6">
                <label class="flex items-center text-gray-400">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember me
                </label>
            </div>

            <!-- BUTTON -->
            <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-600 text-black font-semibold py-2 rounded-full transition">
                Sign In
            </button>

        </form>

    </div>

    <!-- RIGHT (LOGO WOW EFFECT) -->
    <div class="relative w-full md:w-1/2 h-52 md:h-auto flex items-center justify-center
                bg-gradient-to-br from-orange-500 to-yellow-400">

        <!-- Glow -->
        <div class="absolute w-80 h-80 bg-white/20 blur-3xl rounded-full"></div>

        <!-- Glass -->
        <div class="absolute inset-0 bg-white/10 backdrop-blur-md"></div>

        <!-- LOGO -->
        <img src="{{ asset('images/icon/noBgLogo.jpeg') }}"
             class="relative w-40 md:w-72 
                    drop-shadow-[0_20px_50px_rgba(0,0,0,0.8)]
                    contrast-125 brightness-110">

    </div>

</div>

</body>
</html>