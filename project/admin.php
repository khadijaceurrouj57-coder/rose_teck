<?php
session_start();
include "database.php";

/* ================= CHECK LOGIN ================= */
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != "admin") {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
$page = $_GET['page'] ?? 'home';

/* ================= ADD PRODUCT ================= */
if(isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $imageName = uniqid() . "_" . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmp, "../uploads/" . $imageName);

    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, stock, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $stock, $imageName]);

    header("Location: admin.php?page=products");
    exit();
}

/* ================= EDIT PRODUCT ================= */
if(isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if(!empty($_FILES['image']['name'])) {
        $imageName = uniqid() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);
        $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, price=?, stock=?, image=? WHERE id=?");
        $stmt->execute([$name, $description, $price, $stock, $imageName, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE products SET name=?, description=?, price=?, stock=? WHERE id=?");
        $stmt->execute([$name, $description, $price, $stock, $id]);
    }
    header("Location: admin.php?page=products");
    exit();
}

/* ================= DELETE PRODUCT ================= */
if(isset($_POST['delete_product'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$id]);
    header("Location: admin.php?page=products");
    exit();
}

/* ================= STOCK ACTIONS ================= */
if(isset($_POST['stock_action'])) {
    $id = $_POST['id'];
    $action = $_POST['stock_action'];

    $stmt = $pdo->prepare("SELECT stock FROM products WHERE id=?");
    $stmt->execute([$id]);
    $p = $stmt->fetch();

    if($p){
        $newStock = ($action == "add") ? $p['stock'] + 1 : $p['stock'] - 1;
        if($newStock < 0) $newStock = 0;
        $update = $pdo->prepare("UPDATE products SET stock=? WHERE id=?");
        $update->execute([$newStock, $id]);
    }
    header("Location: admin.php?page=products");
    exit();
}

/* ================= REPAIRS STATUS ACTIONS ================= */
if(isset($_POST['accept_repair'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("UPDATE repairs SET status='En cours', accepted=1 WHERE id=?");
    $stmt->execute([$id]);
    header("Location: admin.php?page=repairs");
    exit();
}

if(isset($_POST['reject_repair'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("UPDATE repairs SET status='Refusé', accepted=0 WHERE id=?");
    $stmt->execute([$id]);
    header("Location: admin.php?page=repairs");
    exit();
}

// إنهاء الإصلاح وإدخال ثمن الفاتورة
if(isset($_POST['complete_repair'])) {
    $id = $_POST['id'];
    $price = $_POST['repair_price'] ?? 0;
    
    $stmt = $pdo->prepare("UPDATE repairs SET status='Terminé', price=?, date_completed=CURDATE() WHERE id=?");
    $stmt->execute([$price, $id]);
    header("Location: admin.php?page=repairs");
    exit();
}

/* ================= FETCH DATA ================= */
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();

$repairs = $pdo->query("
    SELECT repairs.*, users.prenom, users.nom, users.telephone 
    FROM repairs 
    JOIN users ON users.id = repairs.user_id
    ORDER BY repairs.id DESC
")->fetchAll();

// حساب المدخول اليومي
$sales_today = $pdo->query("SELECT SUM(price) as total FROM repairs WHERE status='Terminé' AND date_completed=CURDATE()");
$revenue_today = $sales_today->fetch()['total'] ?? 0;

$repairs_today = $pdo->query("SELECT repairs.*, users.prenom, users.nom FROM repairs JOIN users ON users.id = repairs.user_id WHERE status='Terminé' AND date_completed=CURDATE()")->fetchAll();

// إحصائيات عامة للـ Dashboard
$totalProducts = count($products);
$totalRepairs = count($repairs);
$pendingRepairs = count(array_filter($repairs, function($r) { return $r['status'] == 'En attente'; }));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Admin - Rose Teck</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            .print-area { width: 100% !important; margin: 0 !important; padding: 0 !important; box-shadow: none !important; }
        }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex">

    <div class="no-print w-64 bg-slate-900 text-white min-h-screen p-6 flex flex-col justify-between fixed top-0 bottom-0 left-0 z-10 shadow-lg">
        <div>
            <div class="mb-8 px-2">
                <h2 class="text-xl font-black tracking-wider text-white">ROSE <span class="text-pink-500">TECK</span></h2>
                <p class="text-[10px] text-pink-400 mt-1 uppercase tracking-widest font-bold">Gestion Admin 👩‍💼</p>
            </div>

            <nav class="space-y-1.5">
                <a href="?page=home" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'home' ? 'bg-pink-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>📊</span> Vue d'ensemble
                </a>
                <a href="?page=products" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'products' ? 'bg-pink-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>🛍️</span> Boutique & Stock
                </a>
                <a href="?page=repairs" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'repairs' ? 'bg-pink-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>🛠️</span> Réparations
                    <?php if($pendingRepairs > 0) { ?>
                        <span class="ml-auto bg-pink-500 text-white text-[10px] px-2 py-0.5 rounded-full font-bold"><?= $pendingRepairs ?></span>
                    <?php } ?>
                </a>
                <a href="?page=compta" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all <?= $page == 'compta' ? 'bg-emerald-600 text-white shadow-sm' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                    <span>💰</span> المدخول اليومي
                </a>
            </nav>
        </div>
        <div>
            <a href="logout.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 transition-all">
                <span>🚪</span> Déconnexion
            </a>
        </div>
    </div>

    <div class="flex-1 ml-64 p-8 print-area">

        <?php if($page == 'home'){ ?>
            <div class="max-w-5xl">
                <h2 class="text-2xl font-bold text-slate-900 mb-6">Tableau de bord 📊</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Produits</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-2"><?= $totalProducts ?></h3>
                    </div>
                    <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Demandes Réparation</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-2"><?= $totalRepairs ?></h3>
                    </div>
                    <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm border-l-4 border-l-pink-500">
                        <p class="text-xs font-bold text-pink-500 uppercase tracking-wider">En Attente</p>
                        <h3 class="text-3xl font-black text-slate-900 mt-2"><?= $pendingRepairs ?></h3>
                    </div>
                </div>
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                    <h3 class="text-base font-bold text-slate-900 mb-2">Bienvenue dans votre gestionnaire, Rose Teck 🌸</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Gérez vos produits, suivez les demandes d'ici facilement.</p>
                </div>
            </div>
        <?php } ?>

        <?php if($page == 'products'){ ?>
            <div class="max-w-6xl grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm h-fit">
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'edit') { 
                        $id_edit = $_GET['id'];
                        $item = $pdo->prepare("SELECT * FROM products WHERE id=?");
                        $item->execute([$id_edit]);
                        $product_to_edit = $item->fetch();
                    ?>
                        <h3 class="text-base font-bold text-slate-900 mb-1">📝 Modifier le Produit</h3>
                        <form method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                            <input type="hidden" name="id" value="<?= $product_to_edit['id'] ?>">
                            <input type="text" name="name" value="<?= htmlspecialchars($product_to_edit['name']) ?>" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm">
                            <textarea name="description" required rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm resize-none"><?= htmlspecialchars($product_to_edit['description']) ?></textarea>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="number" name="price" value="<?= $product_to_edit['price'] ?>" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm">
                                <input type="number" name="stock" value="<?= $product_to_edit['stock'] ?>" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm">
                            </div>
                            <input type="file" name="image" class="w-full text-xs text-slate-500">
                            <div class="flex gap-2">
                                <button type="submit" name="edit_product" class="w-full bg-slate-900 text-white font-medium py-2 rounded-xl text-sm">Enregistrer</button>
                                <a href="admin.php?page=products" class="w-full bg-slate-100 text-center text-slate-600 font-medium py-2 rounded-xl text-sm">Annuler</a>
                            </div>
                        </form>
                    <?php } else { ?>
                        <h3 class="text-base font-bold text-slate-900 mb-1">➕ Ajouter un Produit</h3>
                        <form method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
                            <input type="text" name="name" required placeholder="Nom du produit" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm">
                            <textarea name="description" required rows="3" placeholder="Description..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm resize-none"></textarea>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="number" name="price" required placeholder="Prix" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm">
                                <input type="number" name="stock" required placeholder="Stock" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-sm">
                            </div>
                            <input type="file" name="image" required class="w-full text-xs text-slate-500">
                            <button type="submit" name="add_product" class="w-full bg-slate-900 text-white font-medium py-2 rounded-xl text-sm">Ajouter</button>
                        </form>
                    <?php } ?>
                </div>

                <div class="lg:col-span-2">
                    <h3 class="text-lg font-bold text-slate-900 mb-5">🛍️ Articles en Vitrine</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach($products as $p){ ?>
                            <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm flex flex-col justify-between">
                                <div class="flex p-4 gap-4">
                                    <div class="w-20 h-20 bg-slate-100 rounded-xl overflow-hidden border flex-shrink-0">
                                        <img src="../uploads/<?= htmlspecialchars($p['image']) ?>" class="w-full h-full object-cover">
                                    </div>
                                    <div class="overflow-hidden flex-1">
                                        <div class="flex justify-between items-start">
                                            <h4 class="text-sm font-bold text-slate-900 truncate"><?= htmlspecialchars($p['name']) ?></h4>
                                            <div class="flex gap-1.5 ml-2">
                                                <a href="admin.php?page=products&action=edit&id=<?= $p['id'] ?>" class="text-xs hover:bg-slate-100 p-1 rounded">✏️</a>
                                                <form method="POST" onsubmit="return confirm('Supprimer ?');" class="inline">
                                                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                                    <button name="delete_product" class="text-xs hover:bg-red-50 p-1 rounded text-red-500">🗑️</button>
                                                </form>
                                            </div>
                                        </div>
                                        <p class="text-sm font-black text-slate-900 mt-2">💰 <?= number_format($p['price'], 2) ?> DH</p>
                                    </div>
                                </div>
                                <div class="bg-slate-50 px-4 py-2.5 border-t flex items-center justify-between">
                                    <span class="text-xs text-slate-500">Stock: <b><?= $p['stock'] ?></b></span>
                                    <form method="POST" class="flex gap-1">
                                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                        <button name="stock_action" value="remove" class="w-6 h-6 bg-white border rounded text-xs">➖</button>
                                        <button name="stock_action" value="add" class="w-6 h-6 bg-white border rounded text-xs">➕</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if($page == 'repairs'){ ?>
            <div class="max-w-4xl">
                <h3 class="text-lg font-bold text-slate-900 mb-4">🛠️ Demandes de réparations</h3>
                <div class="space-y-3">
                    <?php foreach($repairs as $r){ 
                        $statusClass = "bg-slate-100 text-slate-700";
                        if($r['status'] == "En cours") $statusClass = "bg-blue-50 text-blue-600 border-blue-200";
                        if($r['status'] == "Refusé") $statusClass = "bg-red-50 text-red-600 border-red-200";
                        if($r['status'] == "Terminé") $statusClass = "bg-emerald-50 text-emerald-600 border-emerald-200";
                    ?>
                        <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div>
                                <span class="text-xs font-bold bg-slate-900 text-white px-2 py-0.5 rounded">👤 <?= htmlspecialchars($r['prenom']) ?> <?= htmlspecialchars($r['nom']) ?></span>
                                <h4 class="text-sm font-bold text-slate-900 mt-2">📱 <?= htmlspecialchars($r['device']) ?></h4>
                                <p class="text-xs text-slate-500"><b>Problème:</b> <?= htmlspecialchars($r['problem']) ?></p>
                                <?php if($r['status'] == 'Terminé') { ?>
                                    <p class="text-xs text-emerald-600 font-bold mt-1"> Prix payé : <?= number_format($r['price'] ?? 0, 2) ?> DH</p>
                                <?php } ?>
                            </div>

                            <div class="flex items-center gap-2 justify-end">
                                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full border <?= $statusClass ?>"><?= $r['status'] ?></span>
                                
                                <form method="POST" class="flex items-center gap-1.5">
                                    <input type="hidden" name="id" value="<?= $r['id'] ?>">
                                    <?php if($r['status'] == 'En attente'){ ?>
                                        <button name="reject_repair" class="px-2.5 py-1 bg-red-50 text-red-600 text-xs rounded-lg">❌ Refuser</button>
                                        <button name="accept_repair" class="px-2.5 py-1 bg-slate-900 text-white text-xs rounded-lg">✔ Accepter</button>
                                    <?php } ?>

                                    <?php if($r['status'] == 'En cours'){ ?>
                                        <input type="number" name="repair_price" placeholder="Prix DH" required class="w-20 bg-slate-50 border rounded-lg px-2 py-1 text-xs focus:outline-none">
                                        <button name="complete_repair" class="px-3 py-1 bg-emerald-500 text-white text-xs font-bold rounded-lg">🎉 Terminer</button>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if($page == 'compta'){ ?>
            <div class="max-w-4xl bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
                <div class="flex justify-between items-center border-b pb-4 mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">💰 Rapport de Recettes Journalières</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Date : <?= date('d/m/Y') ?></p>
                    </div>
                    <button onclick="window.print();" class="no-print bg-slate-900 text-white px-4 py-2 rounded-xl text-xs font-medium hover:bg-pink-600 transition-all">
                        🖨️ Imprimer
                    </button>
                </div>

                <div class="bg-emerald-50 border border-emerald-200 rounded-xl p-5 mb-6 flex justify-between items-center">
                    <div>
                        <p class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Total aujourd'hui</p>
                    </div>
                    <div class="text-2xl font-black text-emerald-700"><?= number_format($revenue_today, 2) ?> DH</div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead>
                            <tr class="bg-slate-100 text-slate-600">
                                <th class="p-3 border-b">Client</th>
                                <th class="p-3 border-b">Appareil</th>
                                <th class="p-3 border-b text-right">Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($repairs_today ) == 0) { ?>
                                <tr><td colspan="3" class="p-4 text-center text-slate-400">Aucune recette aujourd'hui.</td></tr>
                            <?php } ?>
                            <?php foreach($repairs_today as $op) { ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-3 border-b font-medium text-slate-800"><?= htmlspecialchars($op['prenom']) ?> <?= htmlspecialchars($op['nom']) ?></td>
                                    <td class="p-3 border-b text-slate-500">📱 <?= htmlspecialchars($op['device']) ?></td>
                                    <td class="p-3 border-b text-right font-bold text-emerald-600"><?= number_format($op['price'], 2) ?> DH</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>

    </div>

</body>
</html>