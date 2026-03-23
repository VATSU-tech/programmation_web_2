<?php
try{
    $connection = new PDO("mysql:host=localhost;dbname=DB_reseau_social_php",'root','');
}catch(PDOException $e){
    echo 'erreur : '. $e->getMessage();
}
?>