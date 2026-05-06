<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Rreth Nesh - Dyqani Teknologjik</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
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
        }

        .about-content {
            max-width: 900px;
            margin: -50px auto 40px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            line-height: 1.8;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            text-align: center;
        }

        .stat-box h3 {
            color: #ff7000;
            font-size: 35px;
            margin-bottom: 5px;
        }

        .features-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            padding: 50px 10%;
            background-color: #fff;
        }

        .feature-card {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            flex: 1;
            min-width: 250px;
            border-bottom: 4px solid #ff7f00;
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<?php include('header.php'); ?>

<section class="about-slider">
    <h1>NJIHUNI ME EKIPIN TONË</h1>
    <p>Teknologjia në shërbimin tuaj që nga viti 2024.</p>
    <a href="#kush-jemi" class="butoni">Eksploro më shumë</a>
</section>

<div class="about-content" id="kush-jemi">
    <h2>Kush jemi ne?</h2>

    <p>
        Dyqani Teknologjik është lider në tregun online për shitjen e pajisjeve elektronike.
        Misioni ynë është të sjellim teknologjinë më të fundit në duart tuaja me çmimet më konkurruese.
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

<div class="features-section">
    <div class="feature-card">
        <div class="feature-icon">🚀</div>
        <h3>Transport i Shpejtë</h3>
        <p>Dërgesa brenda 24 orëve në Kosovë.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">🛡️</div>
        <h3>Garancion</h3>
        <p>Produktet vijnë me garancion të plotë.</p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">🎧</div>
        <h3>Suport 24/7</h3>
        <p>Jemi gjithmonë këtu për ndihmë.</p>
    </div>
</div>

<?php include('footer.php'); ?>

</body>
</html>