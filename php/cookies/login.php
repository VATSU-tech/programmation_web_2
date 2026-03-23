<?php
// sesssion_start();
if(isset($_POST["nom"]) && isset($_POST["password"])){
    $userName = $_POST["nom"];
    $password = $_POST["password"];
} else echo"Compteler touts les champs";