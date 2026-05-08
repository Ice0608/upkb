<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="/images/icon/noBgLogo.jpeg">
    <title>Login</title>
    <style>
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out;
    }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen overflow-hidden no-bg">

    <!-- VIDEO -->
    <video autoplay muted loop playsinline
        class="fixed top-0 left-0 w-full h-full object-cover"
        poster="{{ asset('images/galeri/bgLogin.png') }}">

        <source src="{{ asset('videos/bgVLogin3.mp4') }}" type="video/mp4">
    </video>

    <!-- 🌫️ OVERLAY -->
    <div class="fixed inset-0 bg-gradient-to-br from-black/60 via-black/60 to-black/80 z-10"></div>

    <div class="relative z-20 min-h-screen flex items-center justify-center px-4">

    <!-- 💳 LOGIN CARD -->
    <div class="w-full max-w-md p-8 rounded-2xl 
            bg-white/10 backdrop-blur-xl shadow-2xl
            animate-fadeInUp">
    
    <div class="flex items-center mb-4">

        <a href="{{ url('/') }}"
        class="flex items-center gap-2 text-gray-300 hover:text-orange-400 transition">

            <!-- Arrow Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-5 w-5"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 19l-7-7 7-7" />
            </svg>

            <span class="text-sm">Kembali</span>
        </a>

    </div>        

        <!-- LOGO -->
        <div class="text-center mb-6">
            <img src="{{ asset('images/icon/SES LOGO RENEW.png') }}"
                 class="w-28 md:w-32 mx-auto mb-4 
                        drop-shadow-[0_0_35px_rgba(255,165,0,0.9)]
                        animate-pulse">

            <h2 class="text-2xl font-bold text-orange-400">
                SMART EDUCATION SOCIETY
            </h2>

            <p class="text-gray-300 text-sm">
                Sila Log Masuk untuk Teruskan
            </p>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- USERNAME -->
            <input type="text" name="username" placeholder="Nama Pengguna"
                class="w-full mb-4 px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300
                       focus:outline-none focus:ring-2 focus:ring-orange-400">

            <!-- PASSWORD -->
            <div class="relative mb-6">

                <input id="password" type="password" name="password" placeholder="Kata Laluan"
                    class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300
                        focus:outline-none focus:ring-2 focus:ring-orange-400 pr-10">

                <!-- ICON MATA -->
                <button type="button" onclick="togglePassword()"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-300 hover:text-white">

                    <!-- Eye -->
                    <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5
                            c4.477 0 8.268 2.943 9.542 7
                            -1.274 4.057-5.065 7-9.542 7
                            -4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>

                    <!-- Eye Off -->
                    <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19
                            c-4.478 0-8.268-2.943-9.543-7
                            a9.956 9.956 0 012.042-3.362M6.1 6.1
                            A9.956 9.956 0 0112 5c4.478 0
                            8.268 2.943 9.543 7a9.96 9.96 0
                            01-4.132 5.411M15 12a3 3 0
                            11-6 0 3 3 0 016 0zm6 6L3 3"/>
                    </svg>

                </button>

            </div>
             
            <!-- REMEMBER -->
            <div class="flex justify-between items-center text-sm mb-6">
                <label class="flex items-center text-gray-400">
                    <input type="checkbox" name="remember" class="mr-2">
                    Ingat saya
                </label>
            </div>
                       
            <!-- BUTTON -->
            <button
                class="w-full py-2 rounded-lg 
                        bg-gradient-to-r from-orange-500 to-yellow-400 
                        text-black font-semibold
                        shadow-lg shadow-orange-500/30
                        hover:scale-105 hover:shadow-orange-400/50
                        transition duration-300">
                Log Masuk
            </button>

        </form>

    </div>

</div>

<script>
function togglePassword() {
    const password = document.getElementById("password");
    const eyeOpen = document.getElementById("eyeOpen");
    const eyeClose = document.getElementById("eyeClose");

    if (password.type === "password") {
        password.type = "text";
        eyeOpen.classList.add("hidden");
        eyeClose.classList.remove("hidden");
    } else {
        password.type = "password";
        eyeOpen.classList.remove("hidden");
        eyeClose.classList.add("hidden");
    }
}
</script>

</body>

</html>