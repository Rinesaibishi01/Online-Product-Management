<?php
session_start();
require_once "config/database.php";
require_once "classes/User.php";

$database = new Database();
$db = $database->lidhja();
$userObj = new Perdoruesi($db);

$mesazhi = "";
$tipiMesazhit = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $_POST['emri'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($userObj->regjistro($emri, $email, $password)) {
        // Nëse u regjistrua me sukses, dërgoje te login.php
        header("Location: login.php?success=1");
        exit();
    } else {
        $mesazhi = "Ndodhi një gabim ose ky email ekziston!";
        $tipiMesazhit = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistrimi - Dyqani Teknologjik</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>Dyqani Teknologjik</h1>
    <nav>
        <a href="index.php">Ballina</a>
        <a href="login.php">Kyçu</a>
    </nav>
</header>

<div class="register-container">
    <h2>Krijo Llogari të Re</h2>
    
    <?php if($mesazhi != ""): ?>
        <p class="<?php echo $tipiMesazhit; ?>"><?php echo $mesazhi; ?></p>
    <?php endif; ?>

   <form action="register.php" method="POST" id="registerForm">
    <div class="form-group">
        <label>Emri i Plotë:</label>
        <input type="text" name="emri" id="emri_reg">
        <span id="error-emri" class="error-msg"></span> </div>
    <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" id="email_reg">
        <span id="error-email" class="error-msg"></span> </div>
    <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" id="password_reg">
        <span id="error-pass" class="error-msg"></span> </div>
    <button type="submit" class="butoni">Regjistrohu</button>
</form>
    
    <p>Keni llogari? <a href="login.php">Kyçuni këtu</a></p>
</div>

<script src="js/validation.js"></script>
</body>
</html>