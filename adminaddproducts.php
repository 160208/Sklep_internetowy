<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit();
}
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $nazwa = htmlspecialchars($_POST['nazwa']);
    $cena = htmlspecialchars($_POST['cena']);
    $opis = htmlspecialchars($_POST['opis']);
    $numer = htmlspecialchars($_POST['numer']);
    
 
    if (empty($nazwa) || empty($cena) || empty($opis) || empty($numer) ) {
        echo "<p>Wszystkie pola muszą być uzupełnione.</p>";
    }  else {
        
        $sql = "SELECT * FROM products WHERE numer='$numer' LIMIT 1";
        $checksql = $conn->query($sql);

        if ($checksql->num_rows > 0) {
            echo "<p>Products exist</p>";
        } else {
                
            $insertsql= "INSERT INTO products (nazwa, cena, opis, numer) 
            VALUES ('$nazwa', '$cena', '$opis', '$numer')";
            
            if ($conn->query($insertsql) === TRUE) {
                echo "<p>Produkt $nazwa został dodany.</p>";
                header('Location: addproducts.php');
            } else {
                echo "Błąd: " . $insertsql . "<br>" . $conn->error;
            }
        }
    }
}
?>
