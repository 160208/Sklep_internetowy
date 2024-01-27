<?php
session_start();
require_once('config.php');
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit();
}
$sql = "SELECT nazwa, cena, opis, numer,id_produktu FROM products";
$result = $conn->query($sql);

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
        <h1 class="header__title">Dodaj nowy produkt</h1>
    </header>
    <section class="products">
     
<form class="form" method="post" action="adminaddproducts.php">
    <label for="nazwa">Nazwa:</label>
    <input  type="text" name="nazwa" required>

    <label for="cena">Cena:</label>
    <input  type="number" name="cena" step="0.01" required>

    <label for="opis">Opis:</label>
    <textarea name="opis" required></textarea>

    <label for="numer">Numer:</label>
    <input type="number" name="numer" required>

    <input class="input" type="submit" value="Dodaj Produkt">
</form>
    </section>
    <section class="logout">
        <form class="form" method="post" action="remove.php">
        <label for="nazwa">Nazwa:</label>
    <input  type="text" name="nazwa" required>
    <input class="input" type="submit" value="Usuń Produkt">
        </form>
    </section>

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
                    echo "<tr><td>{$row['nazwa']}</td><td>{$row['cena']}</td><td>{$row['opis']}</td><td>{$row['numer']}</td>
                          
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Brak dostępnych produktów</td></tr>";
            }
            ?>
        </table>    
        
    </section>
    <section class="logout">
        <button class="logout__button"><a href="logout.php">Wyloguj</a></button>
    </section>
    
    
</body>
</html>