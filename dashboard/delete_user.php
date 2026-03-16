<?php
session_start();

// 1. Mbrojtja: Kontrollojmë nëse është admin
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    die("Aksesi i ndaluar!");
}

// 2. Lidhja me DB (Shtojmë ../ sepse config është jashtë folderit dashboard)
require_once "../config/database.php"; 

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->lidhja();
    
    $id = $_GET['id'];

    // 3. Siguria: Mos lejo adminin të fshijë veten e vet
    if ($id == $_SESSION['user_id']) {
        header("Location: admin_dashboard.php?error=vetja");
        exit();
    }

    // 4. Ekzekutimi i fshirjes
    $query = "DELETE FROM perdoruesit WHERE id = ?";
    $stmt = $db->prepare($query);
    
    if ($stmt->execute([$id])) {
        // U fshi me sukses
        header("Location: admin_dashboard.php?msg=u_fshi");
    } else {
        // Gabim gjatë fshirjes
        header("Location: admin_dashboard.php?msg=gabim");
    }
} else {
    header("Location: admin_dashboard.php");
}
exit();
?>