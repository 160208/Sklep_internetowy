<?php
session_start();
require_once('config.php');

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT products.nazwa, products.cena, products.opis, products.numer, shoppingcart.id_produktu
        FROM shoppingcart
        JOIN products ON shoppingcart.id_produktu = products.id_produktu
        WHERE shoppingcart.id_user = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Twój koszyk</h1>
    </header>
    <section class="products">
        <table class="table" border="1">
            <tr>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Opis</th>
                <th>Numer</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nazwa']}</td>
                            <td>{$row['cena']}</td>
                            <td>{$row['opis']}</td>
                            <td>{$row['numer']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Twój koszyk jest pusty</td></tr>";
            }
            ?>
        </table>
    </section>
    <section class="logout">
        <button class="logout__button"><a href="products.php">Powrót do sklepu</a></button>
    </section>
</body>