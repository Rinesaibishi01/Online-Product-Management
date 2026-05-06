<?php
session_start();
require_once "config/database.php";
require_once "classes/User.php";

$database = new Database();
$db = $database->lidhja();
$userObj = new Perdoruesi($db);

$gabim = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $perdoruesi = $userObj->login($email, $password);

    if ($perdoruesi) {
        header("Location: index.php"); // Ridrejtohu te ballina
        exit();
    } else {
        $gabim = "Email ose Password i gabuar!";
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kyçu - Dyqani Teknologjik</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: url('https://images.pexels.com/photos/114907/pexels-photo-114907.jpeg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            position: relative;
            font-family: sans-serif;
        }

        /* Mjegulla mbrapa */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 1;
        }

        .login-card {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 380px;
            position: relative;
            text-align: center;
            z-index: 2;
        }

        
        .back-circle {
            position: absolute;
            top: -15px;
            left: -15px;
            width: 40px;
            height: 40px;
            background: #ff7000;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .back-circle:hover { background: #2c3e50; transform: scale(1.1); }

        h2 { color: #2c3e50; margin-bottom: 25px; }
        
        .form-group { text-align: left; margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; color: #555; }
        .form-group input { 
            width: 100%; padding: 12px; border: 2px solid #eee; 
            border-radius: 10px; outline: none; box-sizing: border-box;
        }
        .form-group input:focus { border-color: #ff7000; }

        .error-msg { color: #e74c3c; background: #fdeaea; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 14px; }

        .login-btn {
            width: 100%; padding: 12px; background: #ff7000; border: none;
            color: white; font-weight: bold; border-radius: 10px; cursor: pointer; transition: 0.3s;
        }
        .login-btn:hover { background: #e66500; }
        
        .signup-link { margin-top: 20px; font-size: 14px; }
        .signup-link a { color: #ff7000; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <div class="login-card">
        <a href="index.php" class="back-circle" title="Kthehu mbrapsht">←</a>

        <h2>Kyçu</h2>

        <?php if($gabim != ""): ?>
            <div class="error-msg"><?php echo $gabim; ?></div>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email juaj..." required>
            </div>

            <div class="form-group">
                <label>Fjalëkalimi</label>
                <input type="password" name="password" placeholder="Fjalëkalimi..." required>
            </div>

            <button type="submit" name="login_btn" class="login-btn">Kyçu Tani</button>
        </form>

        <div class="signup-link">
            Nuk keni llogari? <a href="register.php">Regjistrohu</a>
        </div>
    </div>

</body>
</html>