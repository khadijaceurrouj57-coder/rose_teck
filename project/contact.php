<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Rose Teck</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .rose { color: #d04383; }
        .bg-rose { background-color: #d04383; }
        .hover-rose:hover { background-color: #bc3672; }
        .border-rose { border-color: #d04383; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-600 antialiased selection:bg-[#d04383] selection:text-white min-h-screen flex flex-col justify-between">

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-white/80 border-b border-slate-100 px-6 lg:px-16 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full animate-pulse" style="background:#d04383"></span>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Rose<span style="color:#d04383" class="font-black">Teck</span></span>
        </div>
        <nav class="flex items-center gap-4">
            <a href="index.php" class="text-sm font-semibold text-slate-600 hover:text-[#d04383] transition-colors flex items-center gap-1">
                <span class="material-symbols-outlined text-lg">home</span> Accueil
            </a>
            <a href="login.php" class="text-sm font-semibold text-slate-600 hover:text-[#d04383] transition-colors">
                Se connecter
            </a>
            <a href="register.php" class="text-sm font-bold text-white px-5 py-2.5 rounded-xl transition-all shadow-sm hover:-translate-y-0.5 duration-200 bg-rose hover-rose"
               style="background-color:#d04383">
                S'inscrire
            </a>
        </nav>
    </header>

    <!-- MAIN -->
    <main class="max-w-4xl mx-auto px-4 py-16 w-full flex-1 flex flex-col justify-center">

        <h1 class="text-3xl font-black tracking-tight text-slate-900 mb-12 text-left pl-4" style="border-left: 4px solid #d04383">
            Contact Rose Teck
        </h1>

        <div class="grid md:grid-cols-12 gap-8 items-stretch">

            <!-- Infos -->
            <div class="md:col-span-7 bg-white border border-slate-100 p-8 rounded-2xl shadow-sm space-y-6">
                <h2 class="text-base font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2 mb-2">
                    <span class="material-symbols-outlined text-xl" style="color:#d04383">info</span>
                    Nos Informations
                </h2>

                <div class="space-y-4">
                    <div class="flex items-center gap-4 py-2">
                        <span class="material-symbols-outlined text-slate-400">location_on</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Localisation</div>
                            <div class="text-sm font-bold text-slate-800">Tanger, Maroc</div>
                        </div>
                    </div>

                    <a href="https://wa.me/212611149295" target="_blank" class="flex items-center gap-4 py-2 transition-colors group hover:text-[#d04383]">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-[#d04383]">call</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">WhatsApp</div>
                            <div class="text-sm font-bold text-slate-800">+212 6 11 14 92 95</div>
                        </div>
                    </a>

                    <a href="https://instagram.com/roseteck" target="_blank" class="flex items-center gap-4 py-2 transition-colors group hover:text-[#d04383]">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-[#d04383]">photo_camera</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Instagram</div>
                            <div class="text-sm font-bold text-slate-800">@roseteck</div>
                        </div>
                    </a>

                    <a href="#" class="flex items-center gap-4 py-2 transition-colors group hover:text-[#d04383]">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-[#d04383]">public</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Facebook</div>
                            <div class="text-sm font-bold text-slate-800">Rose Teck</div>
                        </div>
                    </a>

                    <a href="mailto:roseteck@gmail.com" class="flex items-center gap-4 py-2 transition-colors group hover:text-[#d04383]">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-[#d04383]">mail</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Email</div>
                            <div class="text-sm font-bold text-slate-800">roseteck@gmail.com</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Horaires -->
            <div class="md:col-span-5 bg-slate-900 text-white p-8 rounded-2xl flex flex-col justify-between">
                <div class="space-y-4">
                    <h2 class="text-base font-bold uppercase tracking-wider flex items-center gap-2">
                        <span class="material-symbols-outlined" style="color:#d04383">schedule</span>
                        Horaires
                    </h2>
                    <p class="text-slate-300 text-sm leading-relaxed pt-2">
                        Nous sommes disponibles 24h/24 et 7j/7 pour répondre à vos besoins.
                    </p>
                </div>
                <div class="border-t border-slate-800 pt-4 mt-6">
                    <span class="text-xs font-bold uppercase tracking-widest block" style="color:#d04383">Disponibilité</span>
                    <span class="text-xs text-slate-400">Assistance continue pour nos clients.</span>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-100 bg-white py-6 text-center text-xs text-slate-400 font-medium">
        <p>© 2026 Rose Teck. Tous droits réservés.</p>
    </footer>

</body>
</html>