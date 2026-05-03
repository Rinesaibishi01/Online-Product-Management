<?php
session_start();
require_once "config/database.php";
require_once "classes/Product.php";

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- FIX CSS -->
    <link rel="stylesheet" href="css/style.css?v=10">

    <title>Dyqani Teknologjik - Ballina</title>
</head>

<body>

<!-- HEADER -->
<?php include "header.php"; ?>

<!-- HERO -->
<section class="slider">
    <div class="slider-content">
        <h2>Mirësevini në Dyqanin Tonë Teknologjik</h2>
        <p>Gjeni pajisjet më të fundit me çmimet më të mira në treg.</p>
        <a href="#produktet" class="butoni">Eksploro Produktet</a>
    </div>
</section>

<!-- PRODUKTET -->
<main class="container" id="produktet">

    <h2 class="section-title">Produktet tona</h2>

    <div class="produktet">

        <?php if(!empty($produktet)): ?>
            <?php foreach ($produktet as $p): ?>

                <div class="karta">

                    <img src="images/<?php echo htmlspecialchars($p['foto']); ?>" alt="Produkt">

                    <div class="karta-body">

                        <h3><?php echo htmlspecialchars($p['emri']); ?></h3>

                        <span class="cmimi">
                            <?php echo htmlspecialchars($p['cmimi']); ?> €
                        </span>

                        <a href="product-details.php?id=<?php echo $p['id']; ?>" class="butoni">
                            Shiko Detajet
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>
        <?php else: ?>

            <p style="text-align:center; grid-column:1/-1;">
                Nuk ka produkte për momentin.
            </p>

        <?php endif; ?>

    </div>

</main>

<!-- FOOTER -->
<?php include "footer.php"; ?>

<script src="js/validation.js"></script>

</body>
</html>