<?php
session_start();

// 1. Siguria: Vetëm admini mund të hyjë
if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// 2. Lidhja me Databazën dhe Klasën
require_once "../config/database.php";
require_once "../classes/Product.php";

$database = new Database();
$db = $database->lidhja();

// 3. Marrja e Përdoruesve
$queryUsers = "SELECT id, emri, email, roli FROM perdoruesit";
$stmtUsers = $db->prepare($queryUsers);
$stmtUsers->execute();
$perdoruesit = $stmtUsers->fetchAll(PDO::FETCH_ASSOC);

// 4. Marrja e Produkteve përmes klasës Product
$productObj = new Product($db);
$produktet = $productObj->lexoProduktet();
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Dyqani Teknologjik</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        /* Pak stilim shtesë që tabela të duket më mirë */
        .admin-table { width: 100%; border-collapse: collapse; margin-top: 10px; background: white; }
        .admin-table th, .admin-table td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        .admin-table th { background-color: #2c3e50; color: white; }
        .btn-delete { background-color: #e74c3c; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 14px; }
        .btn-delete:hover { background-color: #c0392b; }
        .section-header { display: flex; justify-content: space-between; align-items: center; margin-top: 30px; }
    </style>
</head>
<body>
    <header>
        <div class="container" style="display: flex; justify-content: space-between; align-items: center;">
            <h1>Admin Panel</h1>
            <nav>
                <a href="../index.php" style="color: white; margin-right: 15px;">Ballina</a>
                <a href="../logout.php" style="color: #ffaa00; font-weight: bold;">Dil</a>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2 style="margin-top: 20px;">Menaxhimi i Përdoruesve</h2>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Emri</th>
                    <th>Email</th>
                    <th>Roli</th>
                    <th>Veprime</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perdoruesit as $u): ?>
                <tr>
                    <td><?php echo htmlspecialchars($u['emri']); ?></td>
                    <td><?php echo htmlspecialchars($u['email']); ?></td>
                    <td><strong><?php echo htmlspecialchars($u['roli']); ?></strong></td>
                    <td>
                        <a href="delete_user.php?id=<?php echo $u['id']; ?>" class="btn-delete" onclick="return confirm('A jeni të sigurt që doni të fshini këtë përdorues?')">Fshij</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br><hr>

        <div class="section-header">
            <h2>Menaxhimi i Produkteve</h2>
            <a href="add_product.php" class="butoni" style="width: auto; padding: 10px 20px; background-color: #27ae60;">+ Shto Produkt të Ri</a>
        </div>
        
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Emri i Produktit</th>
                    <th>Veprime</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($produktet) > 0): ?>
                    <?php foreach ($produktet as $p): ?>
                    <tr>
                        <td>
                            <img src="../images/<?php echo $p['foto']; ?>" width="60" height="50" style="border-radius: 4px; object-fit: cover;">
                        </td>
                        <td><?php echo htmlspecialchars($p['emri']); ?></td>
                        <td>
                            <a href="delete_product.php?id=<?php echo $p['id']; ?>" class="btn-delete" onclick="return confirm('A dëshiron ta fshish këtë produkt?')">Fshij Produktin</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3" style="text-align:center; padding: 20px;">Nuk ka produkte në databazë.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>