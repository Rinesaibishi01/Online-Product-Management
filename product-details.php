<?php 
session_start();
require_once('config/database.php'); 

$db = new Database(); 
$conn = $db->lidhja(); 

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $query = "SELECT * FROM produkte WHERE id = :id"; 
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $p = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$p) { die("Produkti nuk u gjet!"); }
    } catch(PDOException $e) { die("Gabim: " . $e->getMessage()); }
} else { header("Location: index.php"); exit(); }
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title><?php echo $p['emri']; ?> - Detajet</title>
   <link rel="stylesheet" href="css/style.css?v=1">
</head>
<body>

    <div class="details-wrapper">
        <div class="details-left">
            <a href="index.php#produktet" class="back-link">← Kthehu mbrapa</a>
            <img src="images/<?php echo $p['foto']; ?>" alt="Product">
        </div>

        <div class="details-right">
            <div class="category-tag">TEKNOLOGJI > PRODUKTE</div>
            <h1 class="product-title"><?php echo $p['emri']; ?></h1>
            
            <div class="price-card">
                <span class="old-price"><?php echo number_format($p['cmimi'] + 15, 2); ?> €</span>
                <span class="new-price"><?php echo number_format($p['cmimi'], 2); ?> €</span>
            </div>

            <p class="stock-status">✅ Në stok - Gati për dërgim</p>

            <div class="product-desc">
                <h3>Përshkrimi</h3>
                <p><?php echo nl2br($p['pershkrimi']); ?></p>
            </div>

            <button class="add-cart-btn">SHTO NË SHPORTË 🛒</button>
        </div>
    </div>

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
    <p><i class="fa-solid fa-location-dot"></i> Rruga: "Teknologjia", Prishtinë</p>
    <p><i class="fa-solid fa-phone"></i> Tel: +383 44 123 456</p>
    <p><i class="fa-solid fa-envelope"></i> Email: info@dyqani.com</p>
    <p><i class="fa-solid fa-clock"></i> Hapur: Mon - Sat (09:00 - 18:00)</p>
</div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Dyqani Teknologjik. Të gjitha të drejtat e rezervuara.</p>
    </div>
</footer>
</body>
</html>