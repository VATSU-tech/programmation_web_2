<?php
session_start();
if(isset($_POST["nom"]) && isset($_POST["password"])){
    $username = $_POST["nom"];
    $password = $_POST["password"];

    if($username == "admin" && $password == "1234"){
        $_SESSION["username"] = $username;
        
        header('Location: ./dashboard.php');
    }else echo'Mot de passe ou nom d\'utilisateur incorect';

} else echo"Compteler touts les champs";