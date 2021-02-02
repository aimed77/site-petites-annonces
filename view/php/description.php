<?php
session_start();
require_once('connexiondb.php');

$utilisateur_id = (int) trim($_GET['id']);

// echo $utilisateur_id;

if (empty($utilisateur_id)) {
    header('location: view\php\index.php');
    exit;
}

$req = $BDD->prepare("SELECT * FROM test WHERE id = ?");


$req->execute(array($utilisateur_id));

$voir_utilisateur = $req->fetch();

if (!isset($voir_utilisateur['id'])) {
    header('location: view\php\index.php');
    exit;
}

// pour une autre table
// $repDep= $BDD->prepare("SELECT * FROM departement WHERE departement_id = ?");

// $repDep->execute(array($voir_utilisateur['departement']));
// $voir_departement = $repDep->fetch();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- mon css -->
    <link href="../css/css.css" rel="stylesheet">
    <!-- titre -->
    <title> Profil de
        <?= $voir_utilisateur['nom'] ?>
    </title>

    <!-- DEBUT -->

</head>

<body>

    <!--  logo -->

    <br><br>
    <div class="container ">
        <div>
            <img class="img-fluid mx-auto d-block" src="AimsMercato.jpg" alt="logo" width="25%">
        </div>
    </div>
    <hr> <br>

    <!-- Description -->


    <div class="container ">
        <div class="card border-0 shadow my-5 ">
            <div class="card-body p-5 ">
                <hr>
                <h1 class="my-3 text-center text-success">
                    <?= $voir_utilisateur['nom'] ?>
                </h1>
                <hr>
                <!-- debut page -->
                <div class="container">

                    <!-- plus -->
                    <div class="row">

                        <div class="col-md-8">
                            <img class="img-fluid rounded mx-auto d-block" src="<?= $voir_utilisateur['photo'] ?>" alt="mercato">
                        </div>

                        <div class="col-md-4">
                            <h2 class="my-3 text-success">Description Joueur</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio,
                                gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et,
                                interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                            <hr>
                            <h3 class="my-3 text-success">Caractéristique</h3>
                            <ul class="w3-ul">
                                <li class="w3-xlarge"><i class="fa fa-futbol-o"></i> <?= $voir_utilisateur['age'] ?>  ans </li>
                                <li class="w3-xlarge"><i class="fa fa-futbol-o"></i> <?= $voir_utilisateur['nationalite'] ?> </li>
                                <li class="w3-xlarge"><i class="fa fa-futbol-o"></i> <?= $voir_utilisateur['poste'] ?> </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <!-- album -->



    <div class="container ">
        <div class="card border-0 shadow my-5 ">
            <div class="card-body p-5 ">
                <hr>

                <h2 class="my-4 text-success">Photo</h2>

                <div class="row">


                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="<?= $voir_utilisateur['photo'] ?>">
                            <img class="img-fluid rounded mx-auto d-block " src="<?= $voir_utilisateur['photo'] ?>" alt="mercato">
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="<?= $voir_utilisateur['photo'] ?>">
                            <img class="img-fluid rounded mx-auto d-block" src="<?= $voir_utilisateur['photo'] ?>" alt="mercato">
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="<?= $voir_utilisateur['photo'] ?>">
                            <img class="img-fluid rounded mx-auto d-block " src="<?= $voir_utilisateur['photo'] ?>" alt="mercato">
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="<?= $voir_utilisateur['photo'] ?>">
                            <img class="img-fluid rounded mx-auto d-block" src="<?= $voir_utilisateur['photo'] ?>" alt="mercato">
                        </a>
                    </div>
                    <hr>


                </div>
            </div>
        </div>
    </div>

    <!-- contact -->


    <div class="container ">
        <div class="card border-0 shadow my-5 ">
            <div class="card-body p-5 ">
                <hr>

                <h2 class="my-4 text-success ">Contact</h2>
                <br>

                <table class="table ok">
                    <tbody class="text-center ">
                        <tr>
                            <th class="text-success" scope="row">Numero</th>
                            <td><?= $voir_utilisateur['id'] ?></td>

                        </tr>
                        <tr>
                            <th class="text-success" scope="row">Email</th>
                            <td><?= $voir_utilisateur['email'] ?></td>

                        </tr>
                        <tr>
                            <th class="text-success" scope="row">Réseaux sociaux</th>
                            <td><?= $voir_utilisateur['nom'] ?></td>

                        </tr>
                    </tbody>
                </table>
                <br>
                <br>
                <br>

                <hr>

            </div>
        </div>
    </div>

    <!-- bouton -->

    <div class="container">
        <div class=" text-center ">
            <a type="button" class="btn btn-primary me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 30px;" href="index.php">Retourner au site</a>
        </div>
    </div>



</body>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>