<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    
    $sql = "SELECT username, password, is_admin, id_user FROM users WHERE username='$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            if($user['is_admin']){
                session_start();
                $_SESSION['admin_logged_in']=true;
                $_SESSION['user_id']= $user['id_user'];
                $_SESSION['admin_username'] = $username;

                
            header('Location: addproducts.php');


            }else{
                session_start();
                $_SESSION['user_logged_in']=true;
                $_SESSION['user_id']= $user['id_user'];
                $_SESSION['user_username'] = $username;
            header('Location: products.php');

            }
            
            
            
            exit();
        } else {
            echo "<p>Login failed:<a href='index.php'>Powrót do logowania</a></p>";
        }
    } else {
        echo "<p>Login failed: User not found.<a href='index.php'>Powrót do logowania</a></p>";
    }
}
?>

