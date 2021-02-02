<?php
// On se connecte à là base de données
require_once('database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>


    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des joueurs</h1>

                <div class="container">
                    <div class="text-center">
                        <a type="button" class="btn btn-outline-success me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 20px" href="creer.php">Créer un nouveau joueur</a>
                    </div>
                </div>
                <br>

                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Nationalite</th>
                        <th>Poste</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Details</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>


                    </thead>
                    <tbody>
                        <?php
                        $annonces = readUsers();
                        foreach ($annonces as $cle) {
                        ?>
                            <tr>
                                <td><?= $cle['id'] ?></td>
                                <td><?= $cle['nom'] ?></td>
                                <td><?= $cle['age'] ?></td>
                                <td><?= $cle['nationalite'] ?></td>
                                <td><?= $cle['poste'] ?></td>
                                <td><?= $cle['email'] ?></td>
                                <td><img src="<?= $cle['photo'] ?>" width="80%"></td>
                                <td><a href="details.php?id=<?= $cle['id'] ?>">details</td>
                                <td><a href="modifier.php?id=<?= $cle['id'] ?>">modifier</td>
                                <td><a href="supprimer.php?id=<?= $cle['id'] ?>">supprimer</td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>

</html>


<!-- 
    if (file_exists($cle['photo'])) {
        echo '<img src="'.$cle['photo'].'" alt="ok" />';
    } else {
        echo '<img src="'.$image.'" alt="non" />';
    }
            ?> -->