<?php
session_start();
// Kontrolli i aksesit për admin
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../login.php"); 
    exit();
}

// Lidhja me databazën dhe klasat
require_once "../config/database.php"; 
require_once "../classes/Product.php";  

$database = new Database();
$db = $database->lidhja();
$productObj = new Product($db);

// Logjika e ruajtjes së produktit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $cmimi = $_POST['cmimi'];
    
    $foto = $_FILES['foto']['name'];
    $target = "../images/" . basename($foto); 

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
        if ($productObj->shtoProdukt($emri, $pershkrimi, $cmimi, $foto)) {
            header("Location: ../index.php"); 
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
    <!-- Rregullimi i rrugës së CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .register-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            border-bottom: 3px solid #ff7f00; /* Ngjyra portokalli e brendit tënd */
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #dcdde1;
            border-radius: 6px;
            box-sizing: border-box; 
            font-size: 16px;
        }

        .butoni {
            width: 100%;
            padding: 14px;
            background-color: #2c3e50; /* Bluja e errët e faqes suaj */
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .butoni:hover {
            background-color: #ff7f00; /* Ngjyra portokalli në hover */
        }

        .btn-anulo {
            display: block;
            text-align: center;
            margin-top: 15px;
            padding: 12px;
            background-color: #bdc3c7;
            color: #2c3e50;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-anulo:hover {
            background-color: #95a5a6;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h2>Shto Produkt të Ri</h2>
        <!-- Forma me metodën POST dhe enctype për ngarkimin e fotos -->
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Emri i Produktit:</label>
                <input type="text" name="emri" placeholder="Psh. iPhone 15 Pro" required>
            </div>

            <div class="form-group">
                <label>Çmimi (€):</label>
                <input type="number" step="0.01" name="cmimi" placeholder="0.00" required>
            </div>

            <div class="form-group">
                <label>Përshkrimi:</label>
                <textarea name="pershkrimi" rows="4" placeholder="Shkruani detajet e produktit..."></textarea>
            </div>

            <div class="form-group">
                <label>Foto e Produktit:</label>
                <input type="file" name="foto" required>
            </div>

            <button type="submit" class="butoni">Ruaj Produktin</button>
            
            <a href="admin_dashboard.php" class="btn-anulo">⬅ Anulo dhe Kthehu</a>
        </form>
    </div>

</body>
</html>