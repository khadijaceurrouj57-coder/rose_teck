<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Rose Teck</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-600 antialiased selection:bg-pink-500 selection:text-white min-h-screen flex flex-col justify-between">

    <!-- NAVBAR (متناسقة تماماً مع الصفحة الرئيسية) -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-white/80 border-b border-slate-100 px-6 lg:px-16 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-pink-500 animate-pulse"></span>
            <h1 class="text-xl font-extrabold tracking-tight text-slate-900">ROSE <span class="text-pink-500 font-black">TECK</span></h1>
        </div>
        <nav class="flex items-center gap-6">
            <a href="index.php" class="text-sm font-semibold text-slate-600 hover:text-pink-500 transition-colors flex items-center gap-1">
                <span class="material-symbols-outlined text-lg">home</span> Accueil
            </a>
            <a href="register.php" class="text-sm font-bold text-white bg-slate-900 hover:bg-pink-600 px-5 py-2.5 rounded-xl transition-all shadow-sm hover:shadow-pink-200 hover:-translate-y-0.5 duration-200">
                S'inscrire
            </a>
        </nav>
    </header>

    <!-- MAIN CONTENT (Clean Layout) -->
    <main class="max-w-4xl mx-auto px-4 py-16 w-full flex-1 flex flex-col justify-center">
        
        <!-- العنوان مباشر وبدون إضافات -->
        <h1 class="text-3xl font-black tracking-tight text-slate-900 mb-12 text-left border-l-4 border-pink-500 pl-4">
            Contact Rose Teck
        </h1>

        <div class="grid md:grid-cols-12 gap-8 items-stretch">
            
            <!-- معلومات الاتصال بنظرة ناعمة وأنيقة بدون خلفيات ملونة بزاف -->
            <div class="md:col-span-7 bg-white border border-slate-100 p-8 rounded-2xl shadow-xs space-y-6">
                <h2 class="text-base font-bold text-slate-900 uppercase tracking-wider flex items-center gap-2 mb-2">
                    <span class="material-symbols-outlined text-pink-500 text-xl">info</span>
                    Nos Informations
                </h2>
                
                <div class="space-y-4">
                    <!-- Location -->
                    <div class="flex items-center gap-4 py-2">
                        <span class="material-symbols-outlined text-slate-400">location_on</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Localisation</div>
                            <div class="text-sm font-bold text-slate-800">Tanger, Maroc</div>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/212611149295" target="_blank" class="flex items-center gap-4 py-2 hover:text-pink-500 transition-colors group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-pink-500">call</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">WhatsApp</div>
                            <div class="text-sm font-bold text-slate-800">+212 6 11 14 92 95</div>
                        </div>
                    </a>

                    <!-- Instagram -->
                    <a href="https://instagram.com/roseteck" target="_blank" class="flex items-center gap-4 py-2 hover:text-pink-500 transition-colors group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-pink-500">photo_camera</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Instagram</div>
                            <div class="text-sm font-bold text-slate-800">@roseteck</div>
                        </div>
                    </a>

                    <!-- Facebook -->
                    <a href="#" class="flex items-center gap-4 py-2 hover:text-pink-500 transition-colors group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-pink-500">public</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Facebook</div>
                            <div class="text-sm font-bold text-slate-800">Rose Teck</div>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:roseteck@gmail.com" class="flex items-center gap-4 py-2 hover:text-pink-500 transition-colors group">
                        <span class="material-symbols-outlined text-slate-400 group-hover:text-pink-500">mail</span>
                        <div>
                            <div class="text-xs text-slate-400 font-semibold uppercase">Email</div>
                            <div class="text-sm font-bold text-slate-800">roseteck@gmail.com</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- بطاقة الأوقات مدمجة بنفس بساطة البروجي -->
            <div class="md:col-span-5 bg-slate-900 text-white p-8 rounded-2xl flex flex-col justify-between">
                <div class="space-y-4">
                    <h2 class="text-base font-bold uppercase tracking-wider flex items-center gap-2">
                        <span class="material-symbols-outlined text-pink-500">schedule</span>
                        Horaires
                    </h2>
                    <p class="text-slate-300 text-sm leading-relaxed pt-2">
                        Nous sommes disponibles 24h/24 et 7j/7 pour répondre à vos besoins.
                    </p>
                </div>
                
                <div class="border-t border-slate-800 pt-4 mt-6 text-left">
                    <span class="text-xs font-bold text-pink-500 uppercase tracking-widest block">Disponibilité</span>
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