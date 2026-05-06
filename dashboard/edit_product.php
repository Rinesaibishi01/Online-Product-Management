<?php
session_start();
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once "../config/database.php";
require_once "../classes/Product.php";

$database = new Database();
$db = $database->lidhja();
$productObj = new Product($db);

if (!isset($_GET['id'])) {
    echo "Produkti nuk u gjet!";
    exit();
}

$id = $_GET['id'];
$produkti = $productObj->lexoProduktSipasId($id);

if (!$produkti) {
    echo "Produkti nuk ekziston!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $pershkrimi = $_POST['pershkrimi'];
    $cmimi = $_POST['cmimi'];

    $foto = $produkti['foto'];

    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $target = "../images/" . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target);
    }

    if ($productObj->updateProdukt($id, $emri, $pershkrimi, $cmimi, $foto)) {
        header("Location: admin_dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<title>Edito Produktin</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:0;
}

.container{
    max-width:600px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

h2{
    text-align:center;
    margin-bottom:25px;
    color:#2c3e50;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
    color:#333;
}

input, textarea{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:6px;
    font-size:14px;
}

textarea{
    resize:none;
    height:100px;
}

img{
    border-radius:8px;
    margin-top:5px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.btn{
    width:100%;
    padding:12px;
    background:#3498db;
    color:white;
    border:none;
    border-radius:6px;
    font-size:16px;
    cursor:pointer;
    margin-top:10px;
}

.btn:hover{
    background:#2980b9;
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    color:#666;
    text-decoration:none;
}

.back:hover{
    color:#000;
}
</style>

</head>
<body>

<div class="container">
    <h2>✏️ Edito Produktin</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Emri i Produktit</label>
            <input type="text" name="emri" value="<?php echo htmlspecialchars($produkti['emri']); ?>" required>
        </div>

        <div class="form-group">
            <label>Çmimi (€)</label>
            <input type="number" step="0.01" name="cmimi" value="<?php echo $produkti['cmimi']; ?>" required>
        </div>

        <div class="form-group">
            <label>Përshkrimi</label>
            <textarea name="pershkrimi"><?php echo htmlspecialchars($produkti['pershkrimi']); ?></textarea>
        </div>

        <div class="form-group">
            <label>Foto aktuale</label><br>
            <img src="../images/<?php echo $produkti['foto']; ?>" width="120">
        </div>

        <div class="form-group">
            <label>Ndrysho foton</label>
            <input type="file" name="foto">
        </div>

        <button class="btn" type="submit">💾 Ruaj Ndryshimet</button>

    </form>

    <a class="back" href="admin_dashboard.php">⬅ Kthehu në Dashboard</a>
</div>

</body>
</html>