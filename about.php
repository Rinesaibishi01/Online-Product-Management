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
<link rel="stylesheet" href="about.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    

    <title>Rreth Nesh - Dyqani Teknologjik</title>

    

</head>

<body>

<!-- ================= HEADER ================= -->

<header>

    <h1>Dyqani Teknologjik</h1>

    <nav>

        <a href="index.php">Ballina</a>

        <a href="about.php">Rreth Nesh</a>

        <?php if(isset($_SESSION['roli']) && $_SESSION['roli'] == 'admin'): ?>
            <a href="dashboard/admin_dashboard.php">Dashboard</a>
        <?php endif; ?>

        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="logout.php">
                Dil
            </a>
        <?php else: ?>
            <a href="login.php">Kyçu</a>
            <a href="register.php">Regjistrohu</a>
        <?php endif; ?>

    </nav>

</header>

<!-- ================= HERO ================= -->

<section class="hero">

    <div class="hero-content">

        <h2>
            Future Technology <br>
            All In One Place
        </h2>

        <p>
            Ne sjellim pajisjet më moderne për studentë, zhvillues,
            gamer dhe profesionistë. Kualitet, performancë dhe teknologji
            premium për çdo klient.
        </p>

        <a href="#about" class="hero-btn">
            Eksploro Tani
        </a>

    </div>

</section>

<!-- ================= ABOUT ================= -->

<section class="about-section" id="about">

    <div class="about-top">

        <div class="about-text">

            <h3>Rreth Nesh</h3>

            <h2>
                Teknologjia që transformon eksperiencën tuaj
            </h2>

            <p>
                Dyqani Teknologjik është krijuar për të ofruar produkte
                moderne dhe shërbime profesionale për klientët tanë.
                Ne ofrojmë laptopë, kompjutera gaming, aksesorë,
                komponentë hardware dhe pajisje smart me standardet
                më të larta të cilësisë.
            </p>

        </div>

        <div class="about-image">

            <img src="https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=1200&auto=format&fit=crop" alt="Tech">

        </div>

    </div>

    <!-- ================= CARDS ================= -->

    <div class="cards">

        <div class="card dark">

            <i class="fa-solid fa-computer"></i>

            <h3>Kompjutera Profesional</h3>

            <p>
                Pajisje moderne për programim, gaming dhe dizajn grafik
                me performancë të lartë.
            </p>

        </div>

        <div class="card blue">

            <i class="fa-solid fa-laptop"></i>

            <h3>Laptopë Premium</h3>

            <p>
                Laptopë të fuqishëm dhe elegant për studentë dhe biznese.
            </p>

        </div>

        <div class="card light">

            <i class="fa-solid fa-headset"></i>

            <h3>Mbështetje 24/7</h3>

            <p>
                Ekip profesional gjithmonë i gatshëm për t'ju ndihmuar
                në çdo moment.
            </p>

        </div>

    </div>

    <!-- ================= STATS ================= -->

    <div class="stats">

        <div class="stat-box">
            <h2>500+</h2>
            <p>Produkte Teknologjike</p>
        </div>

        <div class="stat-box">
            <h2>1200+</h2>
            <p>Klientë Aktivë</p>
        </div>

        <div class="stat-box">
            <h2>98%</h2>
            <p>Kënaqësi e Klientëve</p>
        </div>

        <div class="stat-box">
            <h2>24/7</h2>
            <p>Mbështetje Profesionale</p>
        </div>

    </div>

</section>

<!-- ================= SERVICES ================= -->

<section class="services">

    <div class="services-title">

        <h2>Shërbimet Tona</h2>

        <p>
            Eksploro shërbimet dhe produktet më të avancuara teknologjike.
        </p>

    </div>

    <div class="service-grid">

        <div class="service-card">

            <img src="https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?q=80&w=1200&auto=format&fit=crop" alt="Gaming">

            <div class="service-content">

                <h3>Gaming Setup</h3>

                <p>
                    Kompjuterë gaming dhe aksesorë profesionalë për eksperiencën më të mirë.
                </p>

            </div>

        </div>

        <div class="service-card">

            <img src="https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?q=80&w=1200&auto=format&fit=crop" alt="Laptop">

            <div class="service-content">

                <h3>Smart Devices</h3>

                <p>
                    Teknologji moderne për shtëpi inteligjente dhe përdorim të përditshëm.
                </p>

            </div>

        </div>

        <div class="service-card">

            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200&auto=format&fit=crop" alt="Office">

            <div class="service-content">

                <h3>Office Solutions</h3>

                <p>
                    Pajisje profesionale për kompani dhe zyra moderne.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= FOOTER ================= -->

<footer>
    <div class="footer-container">
        <!-- Kolona 1 -->
        <div class="footer-box">
            <h3>Dyqani Teknologjik</h3>
            <div class="line"></div>
            <p>Teknologjia më e fundit në duart tuaja. Cilësi dhe garanci në çdo blerje.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Kolona 2 -->
        <div class="footer-box">
            <h3>Linke të Shpejta</h3>
            <div class="line"></div>
            <ul>
                <li><a href="index.php">Ballina</a></li>
                <li><a href="about.php">Rreth Nesh</a></li>
                <li><a href="#">Produktet</a></li>
                <li><a href="#">Kyçu</a></li>
            </ul>
        </div>

        <!-- Kolona 3 -->
        <div class="footer-box">
            <h3>Na Kontaktoni</h3>
            <div class="line"></div>
            <p><i class="fas fa-map-marker-alt"></i> Prishtinë, Kosovë</p>
            <p><i class="fas fa-phone"></i> +383 44 123 456</p>
            <p><i class="fas fa-envelope"></i> info@dyqani.com</p>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2026 Dyqani Teknologjik. Të gjitha të drejtat e rezervuara.</p>
    </div>
</footer>

<!-- Shto këtë link në <head> për ikonat -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">