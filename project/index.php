<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose Teck - La tech au féminin</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        /* الألوان المطابقة بدقة لشاشتك واللوغو */
        .bg-custom-rose { background-color: #d04383; }
        .text-custom-rose { color: #d04383; }
        .border-custom-rose { border-color: #d04383; }
        .hover\:bg-custom-rose-dark:hover { background-color: #bc3672; }
        .selection\:bg-custom-rose::selection { background-color: #d04383; color: white; }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-600 antialiased selection:bg-custom-rose">

    <!-- CONTAINER PRINCIPAL DU HERO (الخلفية الكاملة تجمع الـ Navbar والـ Hero) -->
    <div class="relative min-h-screen flex flex-col bg-cover bg-center bg-no-repeat" style="background-image: url('ROSE.png');">
        
        <!-- التدرج الأبيض الخفيف لضمان وضوح النصوص -->
        <div class="absolute inset-0 bg-gradient-to-r from-white/95 via-white/50 to-white/10 pointer-events-none"></div>

        <!-- NAVBAR TRANSPARENTE (بدون زر Connexion) -->
        <header class="relative w-full px-6 lg:px-16 py-6 flex justify-between items-center z-20">
            <!-- Le Logo Exact -->
            <div>
                <span class="text-xl font-black tracking-tight text-slate-900 uppercase">Rose<span class="text-custom-rose">Teck</span></span>
                <span class="block text-[9px] uppercase tracking-widest text-slate-500 font-bold -mt-1">Cooperative</span>
            </div>
            
            <!-- Actions Droite (فقط زر Contactez-nous) -->
            <div class="flex items-center">
                <a href="contact.php" class="text-sm font-bold text-white bg-custom-rose hover:bg-custom-rose-dark px-6 py-2.5 rounded-full transition-all shadow-md shadow-pink-900/20">
                    Contactez-nous
                </a>
            </div>
        </header>

        <!-- HERO CONTENT -->
        <div class="relative my-auto w-full max-w-7xl mx-auto px-6 sm:px-12 lg:px-16 z-10 py-12">
            <div class="max-w-xl space-y-6 sm:space-y-8">
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                    La tech au <br><span class="text-custom-rose font-black">féminin</span>,<br>
                    l'expertise sans limites.
                </h2>
                <p class="text-base sm:text-lg text-slate-800 leading-relaxed font-semibold max-w-md">
                    La Roseteck Cooperative est une coopérative par excellence à Tanger, unissant le design et le savoir-faire pour une expertise optimale en réparation électronique de pointe.
                </p>
                <div class="pt-4">
                    <a href="register.php" class="inline-block bg-custom-rose hover:bg-custom-rose-dark text-white font-bold px-8 py-4 rounded-full shadow-lg shadow-pink-900/20 hover:-translate-y-0.5 transition-all duration-200">
                        Commencer maintenant
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- CONTENT WRAPPER -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 space-y-24">
        
        <!-- IDEE DE CREATION -->
        <section class="bg-white border border-slate-100 rounded-3xl p-8 lg:p-12 shadow-sm relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-pink-50/30 rounded-full filter blur-3xl -z-10"></div>
            <div class="max-w-3xl space-y-6">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 flex items-center gap-3">
                    <span class="material-symbols-outlined text-custom-rose text-3xl">lightbulb</span>
                    Idée de Création
                </h2>
                <div class="space-y-4 text-slate-500 text-base leading-relaxed font-normal">
                    <p>
                        L’idée de création de Rose Teck est née du besoin d’offrir un espace technologique moderne dirigé par des femmes, spécialisé dans la réparation et la vente des smartphones.
                    </p>
                    <p class="border-l-2 border-custom-rose pl-4 bg-slate-50/50 py-2 pr-2 rounded-r-lg text-slate-600 font-medium">
                        Cette coopérative a été créée pour résoudre plusieurs problèmes rencontrés dans les magasins de réparation traditionnels, comme le manque d’organisation, le retard des réparations et l’absence de suivi des clients.
                    </p>
                    <p>
                        Grâce à cette plateforme, la coopérative peut gérer facilement les clients, les réparations, les ventes et le stock, tout en offrant un service rapide, professionnel et fiable.
                    </p>
                </div>
            </div>
        </section>

        <!-- SERVICES -->
        <section class="space-y-12">
            <div class="text-center space-y-3">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900">
                    Nos <span class="text-custom-rose">Services</span>
                </h2>
                <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Tout ce dont vous avez besoin en un seul endroit</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-custom-rose/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-custom-rose flex items-center justify-center group-hover:bg-custom-rose group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">build</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Réparation Rapide</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Écran cassé, batterie, caméra... réparation rapide avec garantie de service.</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-custom-rose/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-custom-rose flex items-center justify-center group-hover:bg-custom-rose group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">smartphone</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Vente Reconditionnée</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Smartphones hauts de gamme testés et certifiés par nos techniciennes.</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-custom-rose/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-custom-rose flex items-center justify-center group-hover:bg-custom-rose group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Formation Tech</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Nous formons les femmes de Tanger aux métiers et compétences technologiques.</p>
                </div>
                <!-- Card 4 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-custom-rose/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-custom-rose flex items-center justify-center group-hover:bg-custom-rose group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">local_shipping</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Livraison Sécurisée</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Livraison et récupération rapides et sécurisées à Tanger et ses environs.</p>
                </div>
                <!-- Card 5 -->
                <div class="bg-white border border-slate-100 p-8 rounded-2xl hover:border-custom-rose/30 hover:shadow-xl hover:shadow-slate-100 transition-all duration-300 group sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 rounded-xl bg-pink-50 text-custom-rose flex items-center justify-center group-hover:bg-custom-rose group-hover:text-white transition-all duration-300 mb-6">
                        <span class="material-symbols-outlined">language</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Création Web</h3>
                    <p class="text-sm text-slate-400 leading-relaxed">Conception de sites web modernes et sur-mesure adaptés à vos besoins.</p>
                </div>
            </div>
        </section>

        <!-- OBJECTIFS -->
        <section class="grid lg:grid-cols-2 gap-12 items-center bg-slate-900 text-white rounded-3xl p-8 lg:p-12 shadow-xl shadow-slate-900/10">
            <div class="space-y-6">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Nos Objectifs</h2>
                <p class="text-slate-400 text-sm sm:text-base">
                    Nous travaillons chaque jour pour repousser les limites et offrir un impact réel à Tanger.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-custom-rose mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Offrir un service rapide et hautement professionnel</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-custom-rose mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Autonomiser les femmes dans l'écosystème tech local</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-custom-rose mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Digitaliser et faciliter la gestion complète des réparations</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-custom-rose mt-0.5">check_circle</span>
                        <span class="text-slate-200 font-medium text-sm sm:text-base">Garantir la transparence et la satisfaction client</span>
                    </li>
                </ul>
            </div>
            <div class="border border-slate-800 bg-slate-950/40 backdrop-blur-sm p-8 rounded-2xl text-center space-y-4">
                <div class="text-xs font-bold tracking-widest text-custom-rose uppercase">Impact Hub</div>
                <div class="text-5xl font-black text-white">100%</div>
                <div class="text-sm font-semibold text-slate-300">Dédié à l'innovation féminine</div>
                <p class="text-xs text-slate-500 leading-relaxed">Une plateforme intégrée pour transformer le secteur de la réparation de smartphones à Tanger.</p>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-100 bg-white mt-24 py-8 text-center text-xs sm:text-sm text-slate-400 font-medium">
        <p>© 2026 Rose Teck. Tous droits réservés.</p>
    </footer>

</body>
</html>