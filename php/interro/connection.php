<?php
try{
    $connection = new PDO('mysql:host=localhost;dbname=DB_crud_php', 'root', '');
}
catch(PDOException $e){
    echo "Erreur de connexion : " . $e->getMessage();
}
