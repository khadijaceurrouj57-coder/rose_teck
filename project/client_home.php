<?php
session_start();
include "database.php";

/* ================= CHECK LOGIN ================= */
if(!isset($_SESSION['user']) || empty($_SESSION['user']['id'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$page = $_GET['page'] ?? 'home';

/* ================= SAVE REPAIR ================= */
if(isset($_POST['send_repair'])) {

    if(empty($user['id'])){
        die("SESSION ERROR: user id missing");
    }

    $device = $_POST['device'];
    $problem = $_POST['problem'];

    $stmt = $pdo->prepare("
        INSERT INTO repairs (user_id, device, problem, status, accepted)
        VALUES (?, ?, ?, 'En attente', 0)
    ");

    $stmt->execute([
        $user['id'],
        $device,
        $problem
    ]);

    header("Location: client_home.php?page=track&success=1");
    exit();
}

/* ================= SUCCESS MESSAGE ================= */
$message = "";
if(isset($_GET['success'])) {
    $message = "✔ Demande envoyée avec succès";
}

/* ================= REPAIRS LIST ================= */
$repairs = $pdo->prepare("
    SELECT * FROM repairs 
    WHERE user_id=? 
    ORDER BY id DESC
");
$repairs->execute([$user['id']]);
$data = $repairs->fetchAll();

/* ================= PRODUCTS ================= */
$products = $pdo->query("
    SELECT * FROM products 
    ORDER BY id DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Client - Rose Teck</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen flex">

    <div class="w-64 bg-slate-900 text-white min-h-screen p-6 flex flex-col justify-between fixed top-0 bottom-0 left-0 z-10 shadow-lg">
        <div>
            <div class="mb-8 px-2">
                <h2 class="text-xl font-black tracking-wider text-white">ROSE <span class="text-pink-500">TECK</span></h2>
                <p class="text-[10px] text-slate-400 mt-1 uppercase tracking-widest">Espace Client</p>
            </div>

            <div class="bg-slate-850/50 border border-slate-800 rounded-xl p-3.5 mb-6 flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-pink-500/10 border border-pink-500/20 flex items-center justify-center text-pink-400 font-bold text-sm">
                    <?= strtoupper(substr($user['prenom'], 0, 1)) ?>
                </div>
                <div>
                    <p class="text-xs text-slate-400">Bienvenue 👋</p>
                    <p class="text-sm font-semibold text-white truncate max-w-[140px]"><?= htmlspecialchars($user['prenom']) ?></p>
                </div>
            </div>

            <nav class="space-y-1.5">
                <a href="?page=home" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'home' ? 'bg-pink-600 text-white shadow-sm shadow-pink-600/10' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>🏠</span> Accueil
                </a>
                <a href="?page=repair" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'repair' ? 'bg-pink-600 text-white shadow-sm shadow-pink-600/10' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>🛠️</span> Réparation
                </a>
                <a href="?page=track" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'track' ? 'bg-pink-600 text-white shadow-sm shadow-pink-600/10' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>📦</span> Suivi Demandes
                </a>
                <a href="?page=shop" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'shop' ? 'bg-pink-600 text-white shadow-sm shadow-pink-600/10' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>🛍️</span> Boutique Tech
                </a>
            </nav>
        </div>

        <div>
            <a href="logout.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 transition-all">
                <span>🚪</span> Déconnexion
            </a>
        </div>
    </div>

    <div class="flex-1 ml-64 p-8">

        <?php if($page == "home"){ ?>
            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm max-w-4xl">
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Ravi de vous revoir, <?= htmlspecialchars($user['prenom']) ?> ! 🌸</h2>
                <p class="text-slate-600 text-sm leading-relaxed">Bienvenue sur votre espace personnel Rose Teck. Ici, vous pouvez demander une réparation pour votre smartphone, suivre l'avancement de vos appareils en temps réel ou jeter un œيل à notre boutique d'appareils reconditionnés certifiés.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                    <a href="?page=repair" class="p-4 bg-slate-50 border border-slate-200 rounded-xl hover:border-pink-500 transition-all group">
                        <div class="text-xl mb-2">🔧</div>
                        <h4 class="text-sm font-bold text-slate-900 group-hover:text-pink-600">Demander une réparation</h4>
                        <p class="text-xs text-slate-500 mt-1">Écran, batterie, connecteur... Confiez-nous votre téléphone.</p>
                    </a>
                    <a href="?page=track" class="p-4 bg-slate-50 border border-slate-200 rounded-xl hover:border-pink-500 transition-all group">
                        <div class="text-xl mb-2">📦</div>
                        <h4 class="text-sm font-bold text-slate-900 group-hover:text-pink-600">Suivre mes dossiers</h4>
                        <p class="text-xs text-slate-500 mt-1">Vérifiez si votre demande est acceptée ou en cours de réparation.</p>
                    </a>
                    <a href="?page=shop" class="p-4 bg-slate-50 border border-slate-200 rounded-xl hover:border-pink-500 transition-all group">
                        <div class="text-xl mb-2">🛍️</div>
                        <h4 class="text-sm font-bold text-slate-900 group-hover:text-pink-600">Visiter la boutique</h4>
                        <p class="text-xs text-slate-500 mt-1">Découvrez nos smartphones reconditionnés par nos expertes.</p>
                    </a>
                </div>
            </div>
        <?php } ?>

        <?php if($page == "repair"){ ?>
            <div class="max-w-xl bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <h2 class="text-xl font-bold text-slate-900 mb-1">🛠️ Nouvelle demande de réparation</h2>
                <p class="text-slate-500 text-xs mb-6">Remplissez les détails et notre équipe examinera votre demande.</p>

                <?php if($message != "") { ?>
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 text-xs p-3 rounded-xl mb-6 font-medium"><?= $message ?></div>
                <?php } ?>

                <form method="POST" class="space-y-4">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Modèle du Téléphone</label>
                        <input type="text" name="device" required placeholder="Ex: iPhone 13 Pro, Samsung S22..." 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Description du Problème</label>
                        <textarea name="problem" required rows="4" placeholder="Ex: Écran fissuré, la batterie se décharge vite, vitre arrière cassée..." 
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm resize-none"></textarea>
                    </div>

                    <button type="submit" name="send_repair" 
                        class="w-full bg-slate-900 hover:bg-pink-600 text-white font-medium py-2.5 rounded-xl transition-all text-sm shadow-sm pt-3">
                        Envoyer la demande
                    </button>
                </form>
            </div>
        <?php } ?>

        <?php if($page == "track"){ ?>
            <div class="max-w-4xl">
                <h2 class="text-xl font-bold text-slate-900 mb-1">📦 Suivi de vos réparations</h2>
                <p class="text-slate-500 text-xs mb-6">Suivez l'état d'avancement de vos téléphones déposés.</p>

                <?php if(count($data) == 0){ ?>
                    <div class="bg-white border border-slate-200 rounded-xl p-6 text-center text-sm text-slate-500 shadow-sm">
                        ❌ Vous n'avez envoyé aucune demande pour le moment.
                    </div>
                <?php } ?>

                <div class="space-y-3">
                    <?php foreach($data as $r){ 
                        $statusClass = "bg-slate-100 text-slate-700 border-slate-200";
                        if($r['status'] == "En cours") $statusClass = "bg-blue-50 text-blue-600 border-blue-200";
                        if($r['status'] == "Refusé") $statusClass = "bg-red-50 text-red-600 border-red-200";
                        if($r['status'] == "Terminé") $statusClass = "bg-emerald-50 text-emerald-600 border-emerald-200";
                    ?>
                        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div>
                                <h4 class="text-sm font-bold text-slate-900">📱 <?= htmlspecialchars($r['device']) ?></h4>
                                <p class="text-xs text-slate-500 mt-1"><b>Problème :</b> <?= htmlspecialchars($r['problem']) ?></p>
                            </div>
                            <div class="flex items-center">
                                <span class="text-xs font-semibold px-3 py-1 rounded-full border <?= $statusClass ?>">
                                    <?= htmlspecialchars($r['status']) ?>
                                </span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if($page == "shop"){ ?>
            <div class="max-w-6xl">
                <h2 class="text-xl font-bold text-slate-900 mb-1">🛍️ Boutique Rose Teck</h2>
                <p class="text-slate-500 text-xs mb-6">Nos smartphones reconditionnés, testés et garantis.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php foreach($products as $p){ 
                        // صياغة نص الرسالة الجاهزة
                        $messageWhatsApp = "Bonjour Rose Teck, Je souhaite réserver l'appareil suivant :\n\n"
                                         . "📱 Produit : " . $p['name'] . "\n"
                                         . "💰 Prix : " . number_format($p['price'], 2) . " DH\n\n"
                                         . "Nom du client : " . $user['prenom'] . " " . $user['nom'] . "\n"
                                         . "Merci de me confirmer la disponibilité.";
                        
                        $urlWhatsApp = "https://wa.me/212611149295?text=" . urlencode($messageWhatsApp);
                    ?>
                        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm flex flex-col justify-between transition-all hover:shadow-md">
                            <div>
                                <div class="w-full h-48 bg-slate-100 border-b border-slate-100 flex items-center justify-center overflow-hidden">
                                    <?php if(!empty($p['image'])){ ?>
                                        <img src="../uploads/<?= htmlspecialchars($p['image']) ?>" class="w-full h-full object-cover">
                                    <?php } else { ?>
                                        <span class="text-4xl">📱</span>
                                    <?php } ?>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-sm font-bold text-slate-900 truncate"><?= htmlspecialchars($p['name']) ?></h3>
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2 h-8"><?= htmlspecialchars($p['description']) ?></p>
                                    <p class="text-lg font-black text-slate-900 mt-3">💰 <?= number_format($p['price'], 2) ?> DH</p>
                                </div>
                            </div>
                            
                            <div class="p-4 pt-0">
                                <div class="flex items-center justify-between text-xs mt-2 border-t border-slate-100 py-3">
                                    <span class="text-slate-500">Stock: <b class="text-slate-900"><?= $p['stock'] ?></b></span>
                                    <?php if($p['stock'] > 0){ ?>
                                        <span class="text-emerald-600 font-semibold bg-emerald-50 px-2 py-0.5 rounded-md">✔ Disponible</span>
                                    <?php } else { ?>
                                        <span class="text-red-600 font-semibold bg-red-50 px-2 py-0.5 rounded-md">❌ Rupture</span>
                                    <?php } ?>
                                </div>

                                <?php if($p['stock'] > 0){ ?>
                                    <a href="<?= $urlWhatsApp ?>" target="_blank" 
                                       class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-medium py-2 rounded-xl transition-all text-xs shadow-sm flex items-center justify-center gap-2 mt-1">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397 0 11.93 0c3.168.001 6.148 1.233 8.39 3.476 2.242 2.241 3.471 5.218 3.47 8.387-.003 6.582-5.338 11.93-11.872 11.93-.005 0-.01 0-.014 0-1.996-.001-3.957-.503-5.69-1.448L0 24zm6.59-4.846c1.657.983 3.3 1.493 5.333 1.495 5.518 0 10.011-4.493 10.014-10.01.002-2.673-1.033-5.184-2.919-7.07C17.13 1.683 14.624.642 11.954.642 6.436.642 1.943 5.135 1.94 10.654c-.001 1.942.5 3.824 1.452 5.432l-.999 3.648 3.733-.979z"/></svg>
                                        Réserver par WhatsApp
                                    </a>
                                <?php } else { ?>
                                    <button disabled 
                                       class="w-full bg-slate-100 text-slate-400 font-medium py-2 rounded-xl text-xs cursor-not-allowed flex items-center justify-center gap-2 mt-1">
                                        Indisponible
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

    </div>

</body>
</html>