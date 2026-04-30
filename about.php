<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Rreth Nesh - Dyqani Teknologjik</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* STILIMI I SLIDER-IT SPECIFIK PËR ABOUT */
        .about-slider {
            background: linear-gradient(rgba(44, 62, 80, 0.7), rgba(44, 62, 80, 0.7)), 
                        url('https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 20px;
            text-align: center;
        }

        .about-slider h1 {
            font-size: 45px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
            margin-bottom: 10px;
        }

        .about-slider .butoni {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background-color: #ff7000;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            transition: 0.3s;
        }

        .about-slider .butoni:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 112, 0, 0.4);
        }

        /* PJESA TJETËR E PËRMBAJTJES */
        .about-content {
            max-width: 900px;
            margin: -50px auto 40px; /* E ngrejmë pak lart mbi slider */
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            line-height: 1.8;
            position: relative; /* Që të dalë mbi slider */
        }
        
        .about-content h2 {
            color: #ff7000;
            border-bottom: 2px solid #ff7000;
            display: inline-block;
            margin-bottom: 20px;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            text-align: center;
        }

        .stat-box h3 { color: #ff7000; font-size: 35px; margin-bottom: 5px; }
    </style>
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

    <section class="about-slider">
        <div class="slider-content">
            <h1>NJIHUNI ME EKIPIN TONË</h1>
            <p>Teknologjia në shërbimin tuaj që nga viti 2024.</p>
            <a href="#kush-jemi" class="butoni">Eksploro më shumë</a>
        </div>
    </section>

    <div class="about-content" id="kush-jemi">
        <h2>Kush jemi ne?</h2>
        <p>
            Dyqani Teknologjik është lider në tregun online për shitjen e pajisjeve elektronike. 
            Misioni ynë është të sjellim teknologjinë më të fundit në duart tuaja me çmimet më konkurruese në treg. 
            Ne besojmë se çdo person meriton akses në mjetet që lehtësojnë jetën dhe punën e përditshme.
        </p>

        <div class="stats-container">
            <div class="stat-box">
                <h3>500+</h3>
                <p>Produkte</p>
            </div>
            <div class="stat-box">
                <h3>1000+</h3>
                <p>Klientë</p>
            </div>
            <div class="stat-box">
                <h3>24/7</h3>
                <p>Mbështetje</p>
            </div>
        </div>
    </div>
<div class="container" style="margin-bottom: 50px;">
    <h2 style="text-align:center; color:#2c3e50; margin-top:50px;">Eksploro Produktet Tona</h2>
    <div id="dynamic-slider" class="dynamic-mini-slider">
        <div class="slider-overlay">
            <h3 id="slider-title">Duke u ngarkuar...</h3>
            <p id="slider-text">Ju lutem prisni.</p>
        </div>
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

<script src="js/validation.js"></script>
</body>
</html>