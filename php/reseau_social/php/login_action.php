<?php
include("./connexion.php");
if(isset($_POST["email"]) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try{
        $login = $connection->prepare('SELECT * FROM user WHERE email = ?');
        $login->execute(array($email));
        $user = $login->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nationalite'] = $user['nationalite'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];

            header('location: ../pages/dashboard.php');
        }else{
            echo'Nom d\'utilisateur ou mot de passe incorrect.';
        }
    } catch(Exception $e){
        echo 'erreur : '. $e->getMessage().' | lors de la recuperation des donnee ';
    }
}
?>