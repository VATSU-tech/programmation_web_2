<?php include '../connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aficher</title>
</head>
<body>
    <?php 
    $ligne = $connection->query('select * from produit where');
    while ($row = $ligne->fetch()) {
        echo''. $row['nom'] .''. $row['categorie'].''.$row['pu'].'<br/> <br/>';
    }
     ?>

     <form action="" method=""></form>
</body>
</html>