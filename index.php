<?php
session_start();
require_once "config/database.php";
require_once "classes/Product.php";

// Lidhja me DB dhe marrja e produkteve
$database = new Database();
$db = $database->lidhja();
$productObj = new Product($db);
$produktet = $productObj->lexoProduktet();
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyqani Teknologjik - Ballina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>Dyqani Teknologjik</h1>
    <nav>
        <a href="index.php">Ballina</a>
        
        <a href="about.php">Rreth Nesh</a><?php if(isset($_SESSION['roli']) && $_SESSION['roli'] == 'admin'): ?>
            <a href="dashboard/admin_dashboard.php" style="color: #ff9f43; font-weight: bold;">Admin Dashboard</a>
        <?php endif; ?>

        <?php if(isset($_SESSION['user_id'])): ?>
         <a href="logout.php">Dil (<?php echo $_SESSION['emri']; ?>)</a>
        <?php else: ?>
            <a href="login.php">Kyçu</a>
            <a href="register.php">Regjistrohu</a>
        <?php endif; ?>
    </nav>
</header>

<section class="slider">
    <div class="slider-content">
        <h2>Mirësevini në Dyqanin Tonë Teknologjik</h2>
        <p>Gjeni pajisjet më të fundit me çmimet më të mira në treg.</p>
        <a href="#produktet" class="butoni">Eksploro Produktet</a>
    </div>
</section>

<main class="container" id="produktet">
    <h2 class="section-title">Produktet tona</h2>

    <div class="produktet">
        <?php if(count($produktet) > 0): ?>
            <?php foreach ($produktet as $p): ?>
                 <div class="karta">
                   <img src="images/<?php echo $p['foto']; ?>" alt="Product">
                      <div class="karta-body">
                             <h3><?php echo $p['emri']; ?></h3>
                             <span class="cmimi"><?php echo $p['cmimi']; ?> €</span>
<a href="product-details.php?id=<?php echo $p['id']; ?>" class="butoni">Shiko Detajet</a>                               </div>
                               </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; grid-column: 1 / -1;">Nuk ka produkte për të shfaqur aktualisht.</p>
        <?php endif; ?>
    </div>
</main>

<footer class="footer-modern">
    <div class="footer-container">
        <div class="footer-box">
            <h3>Dyqani Teknologjik</h3>
            <p>Destinacioni juaj i parë për pajisjet më moderne elektronike. Cilësi dhe garanci në çdo blerje.</p>
            <div class="social-icons">
                <a href="#">FB</a>
                <a href="#">IG</a>
                <a href="#">LN</a>
            </div>
        </div>

        <div class="footer-box">
            <h3>Linke të Shpejta</h3>
            <ul>
                <li><a href="index.php">Ballina</a></li>
                <li><a href="about.php">Rreth Nesh</a></li>
                <li><a href="index.php#produktet">Produktet</a></li>
                <li><a href="login.php">Kyçu</a></li>
            </ul>
        </div>

        <div class="footer-box">
            <h3>Na Kontaktoni</h3>
            <p>📍 Rruga: "Teknologjia", Prishtinë</p>
            <p>📞 Tel: +383 44 123 456</p>
            <p>✉️ Email: info@dyqani.com</p>
            <p>⏰ Hapur: Mon - Sat (09:00 - 18:00)</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Dyqani Teknologjik. Të gjitha të drejtat e rezervuara.</p>
    </div>
</footer>

<script src="js/validation.js"></script>

</body>
</html>