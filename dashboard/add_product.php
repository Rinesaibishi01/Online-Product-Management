<?php
session_start();
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../login.php"); 
    exit();
}

require_once "../config/database.php"; // Shto ../
require_once "../classes/Product.php";  // Shto ../

$database = new Database();
$db = $database->lidhja();
$productObj = new Product($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $cmimi = $_POST['cmimi'];
    
    $foto = $_FILES['foto']['name'];
    $target = "../images/" . basename($foto); 

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
        if ($productObj->shtoProdukt($emri, $pershkrimi, $cmimi, $foto)) {
            header("Location: ../index.php"); // Shto ../
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shto Produkt - Admin</title>
<link rel="stylesheet" href=".../css/style.css">
</head>
<body>
    <div class="register-container">
        <h2>Shto Produkt të Ri</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Emri i Produktit:</label>
                <input type="text" name="emri" required>
            </div>
            <div class="form-group">
                <label>Çmimi (€):</label>
                <input type="number" step="0.01" name="cmimi" required>
            </div>
            <div class="form-group">
                <label>Përshkrimi:</label>
                <textarea name="pershkrimi" rows="4" style="width: 100%; border-radius: 5px; border: 1px solid #ccc;"></textarea>
            </div>
            <div class="form-group">
                <label>Foto e Produktit:</label>
                <input type="file" name="foto" required>
            </div>
            <button type="submit" class="butoni">Ruaj Produktin</button>
            <div style="margin-top: 15px; text-align: center;">
    <a href="admin_dashboard.php" style="
        display: inline-block;
        padding: 10px 20px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        width: 100%;
        box-sizing: border-box;
    ">
        ⬅ Anulo dhe Kthehu
    </a>
</div>
        </form>
    </div>
</body>
</html>