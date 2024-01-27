<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.php');
    exit();
}

require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nazwa = htmlspecialchars($_POST['nazwa']);

    if (empty($nazwa)) {
        echo "<p>Nazwa produktu nie może być pusta.</p>";
    } else {
        
        $id_user = $_SESSION['user_id']; 

        
        $selectsql = "SELECT * FROM products WHERE nazwa='$nazwa'";
        $result = $conn->query($selectsql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            
            $insertsql = "INSERT INTO removed (id_user, id_product, nazwa, cena, opis, numer) 
                           VALUES ('$id_user', '{$row['id_produktu']}', '{$row['nazwa']}', '{$row['cena']}', '{$row['opis']}', '{$row['numer']}')";

            if ($conn->query($insertsql) === TRUE) {
                
                $deletesql = "DELETE FROM products WHERE nazwa='$nazwa'";

                if ($conn->query($deletesql) === TRUE) {
                    echo "<p>Produkt o nazwie $nazwa został usunięty.</p>";
                    header('Location: addproducts.php');
                } else {
                    echo "Błąd: " . $deletesql . "<br>" . $conn->error;
                }
            } else {
                echo "Błąd: " . $insertsql . "<br>" . $conn->error;
            }
        } else {
            echo "<p>Nie znaleziono produktu o nazwie $nazwa.</p>";
        }
    }
}
?>