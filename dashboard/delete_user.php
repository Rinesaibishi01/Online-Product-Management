<?php
session_start();

// kontrollojme nese eshte admin
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    die("Aksesi i ndaluar!");
}

// 2. Lidhja me DB ../ per me dal jasha dashboard 
require_once "../config/database.php"; 

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->lidhja();
    
    $id = $_GET['id'];

    // nuk lejon adminin me bo delete llogarine e vet
    if ($id == $_SESSION['user_id']) {
        header("Location: admin_dashboard.php?error=vetja");
        exit();
    }

    // fshierja
    $query = "DELETE FROM perdoruesit WHERE id = ?";
    $stmt = $db->prepare($query);
    
    if ($stmt->execute([$id])) {
        // u fshi me sukses
        header("Location: admin_dashboard.php?msg=u_fshi");
    } else {
        // gabim gjat fshirjes
        header("Location: admin_dashboard.php?msg=gabim");
    }
} else {
    header("Location: admin_dashboard.php");
}
exit();
?>