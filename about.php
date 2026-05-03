<?php session_start();
include('header.php'); ?>
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
<?php include('footer.php');?>
<script src="js/validation.js"></script>
</body>
</html>