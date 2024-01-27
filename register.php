<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    




    
    if (empty($username) || empty($password) ) {
        echo "<p>Wszystkie pola muszą być uzupełnione.</p>";
    }  else {
        
        $check_user_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $check_user_result = $conn->query($check_user_query);

        if ($check_user_result->num_rows > 0) {
            echo "User exist";
        } else {
            
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            
            $insert_user_query = "INSERT INTO users (username, password) 
            VALUES ('$username', '$hashed_password')";
            
            if ($conn->query($insert_user_query) === TRUE) {
                header('Location: index.php');
                
            } else {
                echo "Błąd: " . $insert_user_query . "<br>" . $conn->error;
            }
        }
    }
}
?>
