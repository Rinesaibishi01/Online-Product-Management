<?php 
session_start();
require_once('config/database.php'); 

$db = new Database(); 
$conn = $db->lidhja(); 

if(isset($_GET['id'])) {
    // Sigurohemi qe id eshte numer intiger
    $id = intval($_GET['id']); 
    
    try {
        $query = "SELECT * FROM produkte WHERE id = :id"; 
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $p = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$p) { 
            die("Produkti nuk u gjet!"); 
        }
    } catch(PDOException $e) { 
        die("Gabim teknik: " . $e->getMessage()); 
    }
} else { 
    header("Location: index.php"); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title><?php echo htmlspecialchars($p['emri']); ?> - Detajet</title>
    <link rel="stylesheet" href="css/style.css?v=2">
</head>
<body>

    <div class="details-wrapper">
        <div class="details-left">
            <a href="index.php#produktet" class="back-link">← Kthehu mbrapa</a>
            
            <!-- Kontrolli nese fotoja ekziston, nese jo shfaqet nje foto default -->
            <?php 
                $foto_path = (!empty($p['foto'])) ? "images/" . $p['foto'] : "images/no-image.jpg";
            ?>
            <img src="<?php echo $foto_path; ?>" alt="<?php echo htmlspecialchars($p['emri']); ?>">
        </div>

        <div class="details-right">
            <div class="category-tag">TEKNOLOGJI > PRODUKTE</div>
            
            <!-- Perdormi i htmlspecialchars per mbrojtje nga sulmet -->
            <h1 class="product-title"><?php echo htmlspecialchars($p['emri']); ?></h1>
            
            <div class="price-card">
                <span class="old-price"><?php echo number_format($p['cmimi'] + 15, 2); ?> €</span>
                <span class="new-price"><?php echo number_format($p['cmimi'], 2); ?> €</span>
            </div>

            <p class="stock-status">✅ Në stok - Gati për dërgim</p>

            <div class="product-desc">
                <h3>Përshkrimi</h3>
                <!-- nl2br mundeson qe rreshtat e rinj nga databaza te shfaqen sakt ne html -->
                <p><?php echo nl2br(htmlspecialchars($p['pershkrimi'])); ?></p>
            </div>

            <button class="add-cart-btn">SHTO NË SHPORTË 🛒</button>
        </div>
    </div>

    <footer class="footer-modern">
        <div class="footer-container">
            <div class="footer-box">
                <h3>Dyqani Teknologjik</h3>
                <p>Destinacioni juaj i parë për pajisjet më moderne elektronike.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
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
                <p><i class="fa-solid fa-location-dot"></i> Prishtinë, Kosovë</p>
                <p><i class="fa-solid fa-phone"></i> +383 44 123 456</p>
                <p><i class="fa-solid fa-envelope"></i> info@dyqani.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Dyqani Teknologjik. Të gjitha të drejtat e rezervuara.</p>
        </div>
    </footer>
<?php include('footer.php'); ?>
</body>
</html>

<?php 
// Mbyllja e lidhjes me databaze.
$stmt = null;
$conn = null;
?>