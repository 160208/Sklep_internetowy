<?php

session_start();
require_once('config.php');


if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: index.php');
    exit();
}


$sql = "SELECT nazwa, cena, opis, numer,id_produktu FROM products";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    
    $sql = "INSERT INTO shoppingcart (id_produktu, id_user) VALUES ('$product_id', '$user_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Produkt dodany do koszyka!";
    } else {
        echo "Błąd: " ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep produkty</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Dostępne produkty</h1>
        <h2 class="header__subtitle">Kupuj odpowiedzialnie</h2>
        <h3 class="header__text">Artykuły spożywcze - brak możliwości zwrotu</h3>
    </header>
    <section class="products">
        <table class="table" border="1">
            <tr>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Opis</th>
                <th>Numer</th>
                <th>Akcja</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['nazwa']}</td><td>{$row['cena']}</td><td>{$row['opis']}</td><td>{$row['numer']}</td><td>
                          <form method=\"post\">
                            <input type=\"hidden\" name=\"product_id\" value=\"{$row['id_produktu']}\">
                            <button type=\"submit\">Dodaj do koszyka</button>
                          </form>
                          </td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Brak dostępnych produktów</td></tr>";
            }
            ?>
        </table>    
        
    </section>
    <section class="logout">
        <button class="logout__button"><a href="shoppingcart.php">Koszyk</a></button>
    </section>
    <section class="logout">
        <button class="logout__button"><a href="logout.php">Wyloguj</a></button>
    </section>
    
</body>
</html>