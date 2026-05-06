<?php
session_start();
require_once "config/database.php";
require_once "classes/Product.php";
include('header.php'); 

// Lidhja me Databaze dhe marrja e produkteve
$database = new Database();
$db = $database->lidhja();
$productObj = new Product($db);
$produktet = $productObj->lexoProduktet();
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <!-- Shtimi i meta viewport për responsive design w pershtat pajisjen per cilindo ekran te pajisjes -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Dyqani Teknologjik - Ballina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>



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


<?php include('footer.php'); ?>
<script src="js/validation.js"></script>

</body>
</html>