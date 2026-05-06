<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome për ikona moderne[cite: 2] -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css?v=3">
    <title>Dyqani Teknologjik</title>
</head>
<body>

<header>
    <h1>Dyqani Teknologjik</h1>
    <nav>
        <a href="index.php">Ballina</a>
        <a href="about.php">Rreth Nesh</a>
        
        <!-- Shfaqja e Dashboard-it vetem per Adminin-->
        <?php if(isset($_SESSION['roli']) && $_SESSION['roli'] == 'admin'): ?>
            <a href="dashboard/admin_dashboard.php" style="color: #ff9f43; font-weight: bold;">Admin Panel</a>
        <?php endif; ?>

        <!-- Kontrolli i sesionit per Kyçje -->
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Dil (<?php echo htmlspecialchars($_SESSION['emri']); ?>)</a>
        <?php else: ?>
            <a href="login.php">Kyçu</a>
            <a href="register.php">Regjistrohu</a>
        <?php endif; ?>
    </nav>
</header>