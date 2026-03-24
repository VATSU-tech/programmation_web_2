<?php
try{
    $connection = new PDO(
        "mysql:host=localhost;dbname=DB_reseau_social_php;charset=utf8mb4",
        'root',
        '',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
}catch(PDOException $e){
    echo 'erreur : '. $e->getMessage();
}
?>
