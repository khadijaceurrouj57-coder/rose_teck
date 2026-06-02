<?php
session_start();
include "database.php";

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if(!empty($email) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                
                if($user['role'] == "admin") {
                    header("Location: admin.php");
                    exit();
                } else {
                    header("Location: client_home.php");
                    exit();
                }
            } else {
                $message = "❌ Mot de passe incorrect";
            }
        } else {
            $message = "❌ Email introuvable";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Rose Teck</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white border border-slate-100 rounded-2xl p-8 shadow-sm">
        
        <div class="text-center mb-8">
            <h1 class="text-2xl font-black text-slate-900 tracking-wider">ROSE <span class="text-pink-600">TECK</span></h1>
            <p class="text-slate-500 text-xs mt-1.5">Entrez vos identifiants pour vous connecter</p>
        </div>

        <?php if($message != ""){ ?>
            <div class="bg-red-50 border border-red-200 text-red-600 text-xs p-3 rounded-xl mb-4 text-center font-medium"><?= $message ?></div>
        <?php } ?>

        <form method="POST" class="space-y-5" autocomplete="off">
            
            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Adresse Email</label>
                <input type="email" name="email" required placeholder="exemple@email.com" autocomplete="new-password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
            </div>

            <div>
                <label class="block text-[11px] font-bold text-slate-700 uppercase tracking-wide mb-1.5">Mot de passe</label>
                <input type="password" name="password" required placeholder="••••••••" autocomplete="new-password"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:border-pink-500 focus:bg-white transition-all text-sm">
            </div>

            <button type="submit" class="w-full bg-slate-900 hover:bg-pink-600 text-white font-medium py-2.5 rounded-xl transition-all text-sm mt-2 shadow-sm">Se connecter</button>
        </form>

        <div class="mt-6 text-center text-xs text-slate-500">
            Nouveau membre ? <a href="register.php" class="text-pink-600 hover:underline font-semibold">Créer un compte</a>
        </div>
    </div>

</body>
</html>