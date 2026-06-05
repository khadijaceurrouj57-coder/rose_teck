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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .btn-rose { background-color: #d04383; }
        .btn-rose:hover { background-color: #bc3672; }
        .focus-rose:focus { border-color: #d04383; outline: none; background: white; }
    </style>
</head>
<body class="bg-[#f8fafc] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white border border-slate-100 rounded-2xl p-8 shadow-sm my-6">

        <!-- Logo -->
        <div class="text-center mb-6">
            <div class="flex items-center justify-center gap-2 mb-2">
                <span class="w-3 h-3 rounded-full animate-pulse" style="background:#d04383"></span>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">Rose<span style="color:#d04383" class="font-black">Teck</span></span>
            </div>
            <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold">Cooperative</p>
            <p class="text-slate-500 text-xs mt-3">Entrez vos informations pour créer un compte</p>
        </div>

        <?php if ($message != "") { ?>
            <div class="bg-red-50 border border-red-200 text-red-600 text-xs p-3 rounded-xl mb-4 text-center font-medium"><?= $message ?></div>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-600 text-xs p-3 rounded-xl mb-4 text-center font-medium">
                ✔ Inscription réussie ! <a href="login.php" class="underline ml-1 font-semibold hover:opacity-80" style="color:#d04383">Se connecter</a>
            </div>
        <?php } ?>

        <form method="POST" class="space-y-4" autocomplete="off">

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Prénom</label>
                    <input type="text" name="prenom" required placeholder="Votre prénom" autocomplete="new-password"
                        class="focus-rose w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 transition-all text-sm">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Nom</label>
                    <input type="text" name="nom" required placeholder="Votre nom" autocomplete="new-password"
                        class="focus-rose w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 transition-all text-sm">
                </div>
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Adresse Email</label>
                <input type="email" name="email" required placeholder="exemple@email.com" autocomplete="new-password"
                    class="focus-rose w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 transition-all text-sm">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Téléphone</label>
                <input type="text" name="telephone" placeholder="Votre numéro" autocomplete="new-password"
                    class="focus-rose w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 transition-all text-sm">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Mot de passe</label>
                <div class="relative">
                    <input type="password" name="password" id="passwordInput" required placeholder="••••••••" autocomplete="new-password"
                        class="focus-rose w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 transition-all text-sm pr-10">
                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 text-xs">
                        <span id="eyeIcon">👁</span>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-rose w-full text-white font-medium py-2.5 rounded-xl transition-all text-sm mt-2 shadow-sm">
                S'inscrire
            </button>
        </form>

        <div class="mt-6 text-center text-xs text-slate-500">
            Déjà inscrit ? <a href="login.php" class="font-semibold hover:underline" style="color:#d04383">Se connecter</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            if(input.type === 'password') {
                input.type = 'text';
                icon.textContent = '🙈';
            } else {
                input.type = 'password';
                icon.textContent = '👁';
            }
        }
    </script>

</body>
</html>