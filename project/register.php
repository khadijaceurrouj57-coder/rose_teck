<?php
include "database.php";

$message = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'] ?? '';
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $password = $_POST['password'] ?? '';

    if(!empty($email) && !empty($password)) {
        // check email
        $check = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            $message = "❌ Cet email est déjà utilisé";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (prenom, nom, email, telephone, password, role) VALUES (?, ?, ?, ?, ?, 'client')");

            if ($stmt->execute([$prenom, $nom, $email, $telephone, $hashed_password])) {
                $success = true;
            } else {
                $message = "❌ Erreur lors de l'inscription";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Rose Teck</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white border border-slate-100 rounded-2xl p-8 shadow-sm my-6">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-black text-slate-900 tracking-wider">ROSE <span class="text-pink-600">TECK</span></h1>
            <p class="text-slate-500 text-xs mt-1.5">Entrez vos informations pour créer un compte</p>
        </div>

        <?php if ($message != "") { ?>
            <div class="bg-red-50 border border-red-200 text-red-600 text-xs p-3 rounded-xl mb-4 text-center font-medium"><?= $message ?></div>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 text-xs p-3 rounded-xl mb-4 text-center font-medium">
                ✔ Inscription réussie ! <a href="login.php" class="text-pink-600 underline ml-1 font-semibold hover:text-pink-700">Se connecter</a>
            </div>
        <?php } ?>

        <form method="POST" class="space-y-4" autocomplete="off">
            
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Prénom</label>
                    <input type="text" name="prenom" required placeholder="Entrez votre prénom" autocomplete="new-password"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Nom</label>
                    <input type="text" name="nom" required placeholder="Entrez votre nom" autocomplete="new-password"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Adresse Email</label>
                <input type="email" name="email" required placeholder="exemple@email.com" autocomplete="new-password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Téléphone</label>
                <input type="text" name="telephone" placeholder="Votre numéro" autocomplete="new-password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Mot de passe</label>
                <input type="password" name="password" required placeholder="••••••••" autocomplete="new-password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
            </div>

            <button type="submit" 
                class="w-full bg-slate-900 hover:bg-pink-600 text-white font-medium py-2.5 rounded-xl transition-all text-sm mt-2 shadow-sm">
                S'inscrire
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-slate-500">
            Déjà inscrit ? <a href="login.php" class="text-pink-600 hover:underline font-semibold">Se connecter</a>
        </div>
    </div>

</body>
</html>