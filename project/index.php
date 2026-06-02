<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose Teck - La tech au féminin</title>
    <!-- Tailwind CSS لـ ديزاين احترافي وعصري ف البلاصة -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Icons باش نزيدو أيقونات خطيرة ورقاق -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-600 antialiased selection:bg-pink-500 selection:text-white">

    <!-- NAVBAR (Style Pro / Glassmorphism) -->
    <header class="sticky top-0 z-50 backdrop-blur-md bg-white/80 border-b border-slate-100 px-6 lg:px-16 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="w-3 h-3 rounded-full bg-pink-500 animate-pulse"></span>
            <h1 class="text-xl font-extrabold tracking-tight text-slate-900">ROSE <span class="text-pink-500 font-black">TECK</span></h1>
        </div>
        <nav class="flex items-center gap-6">
            <a href="contact.php" class="text-sm font-semibold text-slate-600 hover:text-pink-500 transition-colors">Contact</a>
            <a href="register.php" class="text-sm font-bold text-white bg-slate-900 hover:bg-pink-600 px-5 py-2.5 rounded-xl transition-all shadow-sm hover:shadow-pink-200 hover:-translate-y-0.5 duration-200">
                S'inscrire
            </a>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-24">
        
        <!-- HERO SECTION (Modern Startup Layout) -->
        <section class="grid lg:grid-template-columns lg:grid-cols-12 gap-12 items-center pt-6">
            <div class="lg:col-span-7 space-y-6 text-left">
                <div class="inline-flex items-center gap-2 bg-pink-50 text-pink-700 px-3 py-1.5 rounded-full text-xs font-bold tracking-wide uppercase">
                    ✨ L'excellence au féminin
                </div>
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight text-slate-900 leading-[1.15]">
                    La tech au <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-600">féminin</span>,<br>
                    l'expertise sans limites.
                </h2>
                <p class="text-base sm:text-lg text-slate-500 max-w-xl leading-relaxed">
                    Rose Teck est une coopérative de femmes à Tanger spécialisée dans la réparation avancée de smartphones et la vente d'appareils reconditionnés.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="register.php" class="bg-slate-900 text-white font-bold px-6 py-3.5 rounded-xl shadow-md hover:bg-pink-600 hover:shadow-lg hover:shadow-pink-100 transition-all duration-200">
                        Commencer maintenant
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 relative flex justify-center">
                <!-- الديكور الخلفي العصري -->
                <div class="absolute inset-0 bg-gradient-to-tr from-pink-200 to-rose-100 rounded-3xl filter blur-2xl opacity-30 -z-10 transform scale-95"></div>
                <!-- صورة نقية بدون كادرات قديمة -->
                <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?auto=format&fit=crop&q=80&w=600" 
                     alt="Technicienne Rose Teck" 
                     class="w-full max-w-[380px] h-[440px] object-cover rounded-2xl shadow-xl border border-white">
            </div>
        </section>

        <!-- IDEE DE CREATION (Clean & Minimalist Card) -->
        <section class="bg-white border border-slate-100 rounded-3xl p-8 lg:p-12 shadow-sm relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-pink-50/50 rounded-full filter blur-3xl -z-10"></div>
            <div class="max-w-3xl space-y-6">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 flex items-center gap-3">
                    <span class="material-symbols-outlines text-pink-500 text-3xl">lightbulb</span>
                    Idée de Création
                </h2>
                <div class="space-y-4 text-slate-500 text-base leading-relaxed font-normal">
                    <p>
                        L’idée de création de Rose Teck est née du besoin d’offrir un espace technologique moderne dirigé par des femmes, spécialisé dans la réparation et la vente des smartphones.
                    </p>
                    <p class="border-l-2 border-pink-500 pl-4 bg-slate-50/50 py-2 pr-2 rounded-r-lg text-slate-600 font-medium">
                        Cette coopérative a été créée pour résoudre plusieurs problèmes rencontrés dans les magasins de réparation traditionnels, comme le manque d’organisation, le retard des réparations et l’absence de suivi des clients.
                    </p>
                    <p>
                        Grâce à cette plateforme, la coopérative peut gérer facilement les clients, les réparations, les ventes et le stock, tout en offrant un service rapide, professionnel et fiable.
                    </p>
                </div>
            </div>
        </section>

        <!-- SERVICES (Premium Grid Dashboard Style) -->
        <section class="space-y-12">
            <div class="text-center space-y-3">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                    Nos <span class="text-pink-500">Services</span>
                </h2>
                <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Tout ce dont vous avez besoin en un seul endroit</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-pink-500/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">build</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Réparation Rapide</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Écran cassé, batterie, caméra... réparation rapide avec garantie de service.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-pink-500/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">smartphone</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Vente Reconditionnée</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Smartphones hauts de gamme testés et certifiés par nos techniciennes.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-pink-500/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Formation Tech</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Nous formons les femmes de Tanger aux métiers et compétences technologiques.</p>
                </div>
                <!-- Card 4 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-pink-500/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">local_shipping</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Livraison Sécurisée</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Livraison et récupération rapides et sécurisées à Tanger et ses environs.</p>
                </div>
                <!-- Card 5 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-pink-500/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-pink-500 flex items-center justify-center group-hover:bg-pink-500 group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">language</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Création Web</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Conception de sites web modernes et sur-mesure adaptés à vos besoins.</p>
                </div>
            </div>
        </section>

        <!-- OBJECTIFS (Modern List Layout) -->
        <section class="grid lg:grid-cols-2 gap-12 items-center bg-slate-900 text-white rounded-3xl p-8 lg:p-12 shadow-xl shadow-slate-900/10">
            <div class="space-y-6">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Nos Objectifs</h2>
                <p class="text-slate-400 text-sm sm:text-base">
                    Nous travaillons chaque jour pour repousser les limites et offrir un impact réel à Tanger.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-pink-500 mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Offrir un service rapide et hautement professionnel</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-pink-500 mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Autonomiser les femmes dans l'écosystème tech local</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-pink-500 mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Digitaliser et faciliter la gestion complète des réparations</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-pink-500 mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Garantir la transparence et la satisfaction client</span>
                    </li>
                </ul>
            </div>
            <div class="border border-slate-800 bg-slate-950/40 backdrop-blur-sm p-8 rounded-2xl text-center space-y-4">
                <div class="text-xs font-bold tracking-widest text-pink-500 uppercase">Impact Hub</div>
                <div class="text-5xl font-black text-white">100%</div>
                <div class="text-sm font-semibold text-slate-300">Dédié à l'innovation féminine</div>
                <p class="text-xs text-slate-500 leading-relaxed">Une plateforme intégrée pour transformer le secteur de la réparation de smartphones à Tanger.</p>
            </div>
        </section>

    </main>

    <!-- FOOTER (Minimalist & Corporate) -->
    <footer class="border-t border-slate-100 bg-white mt-24 py-8 text-center text-xs sm:text-sm text-slate-400 font-medium">
        <p>© 2026 Rose Teck. Tous droits réservés.</p>
    </footer>

</body>
</html>