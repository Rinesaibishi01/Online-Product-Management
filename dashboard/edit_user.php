<?php
session_start();

if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

require_once "../config/database.php";
require_once "../classes/User.php";

$database = new Database();
$db = $database->lidhja();

$userObj = new Perdoruesi($db);

// kontrollo ID
if (!isset($_GET['id'])) {
    echo "Perdoruesi nuk u gjet!";
    exit();
}

$id = $_GET['id'];

// merr userin sipas ID
$user = $userObj->lexoUserSipasId($id);

if (!$user) {
    echo "Perdoruesi nuk ekziston!";
    exit();
}

// update user
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emri = $_POST['emri'];
    $email = $_POST['email'];
    $roli = $_POST['roli'];

    if ($userObj->updateUser($id, $emri, $email, $roli)) {

        header("Location: admin_dashboard.php");
        exit();

    } else {

        echo "Gabim gjate editimit!";

    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edito Perdoruesin</title>

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

input, select{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:6px;
    font-size:14px;
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

    <h2>✏️ Edito Perdoruesin</h2>

    <form method="POST">

        <div class="form-group">

            <label>Emri</label>

            <input 
                type="text"
                name="emri"
                value="<?php echo htmlspecialchars($user['emri']); ?>"
                required
            >

        </div>

        <div class="form-group">

            <label>Email</label>

            <input 
                type="email"
                name="email"
                value="<?php echo htmlspecialchars($user['email']); ?>"
                required
            >

        </div>

        <div class="form-group">

            <label>Roli</label>

            <select name="roli">

                <option value="perdorues"
                <?php if($user['roli'] == 'perdorues') echo 'selected'; ?>>
                    Perdorues
                </option>

                <option value="admin"
                <?php if($user['roli'] == 'admin') echo 'selected'; ?>>
                    Admin
                </option>

            </select>

        </div>

        <button class="btn" type="submit">
            💾 Ruaj Ndryshimet
        </button>

    </form>

    <a class="back" href="admin_dashboard.php">
        ⬅ Kthehu ne Dashboard
    </a>

</div>

</body>
</html>