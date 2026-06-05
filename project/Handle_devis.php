<?php
include "database.php";
session_start();
 
if(!isset($_SESSION['user']) || !isset($_SESSION['user']['id'])) {
    header("Location: login.php");
    exit();
}
 
if(isset($_POST['repair_id'])) {
    $repair_id = $_POST['repair_id'];
    $user_id = $_SESSION['user']['id'];
 
    if(isset($_POST['accept_devis'])) {
        $stmt = $pdo->prepare("UPDATE repairs SET status = 'Devis accepté' WHERE id = ? AND user_id = ?");
        $stmt->execute([$repair_id, $user_id]);
        header("Location: client_home.php?page=track&msg=accepted");
        exit();
    } 
    elseif(isset($_POST['refuse_devis'])) {
        $stmt = $pdo->prepare("UPDATE repairs SET status = 'Refusé' WHERE id = ? AND user_id = ?");
        $stmt->execute([$repair_id, $user_id]);
        header("Location: client_home.php?page=track&msg=refused");
        exit();
    }
}
 
header("Location: client_home.php?page=track");
exit();
?>