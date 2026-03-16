<?php
session_start();
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    die("Aksesi i ndaluar!");
}

require_once "../config/database.php";
require_once "../classes/Product.php";

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->lidhja();
    $productObj = new Product($db);

    if ($productObj->fshijProduktin($_GET['id'])) {
        header("Location: admin_dashboard.php?success=1");
    } else {
        header("Location: admin_dashboard.php?error=1");
    }
}
exit();