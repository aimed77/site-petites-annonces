<?php
session_start();

// On inclut la connexion à la base
require_once('connexiondb.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
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

    if (!$produit) {
        header('Location: index.php');
    }
} else {
    header('Location: test.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>detail
        <?= $produit['nom'] ?>
    </title>

</head>

<body>
    <div class="container text-center ">

        <h1>Nom du Joueur :
            <?= $produit['nom'] ?>
        </h1>
        <p>ID :
            <?= $produit['id'] ?>
        </p>
        <p>poste :
            <?= $produit['poste'] ?>
        </p>
        <p>nationalite :
            <?= $produit['nationalite'] ?>
        </p>
        <p>age :
            <?= $produit['age'] ?>
        </p>
        <p>email :
            <?= $produit['email'] ?>
        </p>
        <p>photo : <br> <br> <img src="<?= $produit['photo'] ?>" width="50%"></p>
        <p> <a type="button" class="btn btn-primary me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 20px" href="test.php">Retour</a>
        </p>
        <p><a type="button" class="btn btn-success me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 20px" href="modifier.php?id=<?= $produit['id'] ?>">Modifier</a></p>
        <p><a type="button" class="btn btn-danger me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 20px" href="supprimer.php?id=<?= $produit['id'] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cette star')">Supprimer</a></p>
    </div>
</body>

</html>