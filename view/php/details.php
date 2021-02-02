<?php
session_start();

// On inclut la connexion à la base
require_once('connexiondb.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `test` WHERE `id`=:id';

    // On prépare la requête
    $query = $BDD->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    if(!$produit){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail <?= $produit['nom'] ?> </title>

</head>
<body>
    <h1>Nom du Joueur : <?= $produit['nom'] ?></h1>
    <p>ID : <?= $produit['id'] ?></p>
    <p>poste : <?= $produit['poste'] ?></p>
    <p>nationalite : <?= $produit['nationalite'] ?></p>
    <p>age : <?= $produit['age'] ?></p>
    <p>email : <?= $produit['email'] ?></p>
    <p>photo : <br> <br> <img src="<?= $produit['photo'] ?>" width="30%"></p>
    <p> <a href="test.php">retour</a></p>
    <p><a href="modifier.php?id=<?= $produit['id'] ?>">Modifier</a></p> 
    <p><a href="supprimer.php?id=<?= $produit['id'] ?>">Supprimer</a></p>
</body>
</html>