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

    <style>
        #scrollUp {
            position: fixed;
            bottom: 10px;
            right: -100px;
            opacity: 0.5;
        }
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

    <script>
        jQuery(function() {
            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 200) {
                        $('#scrollUp').css('right', '91%');
                    } else {
                        $('#scrollUp').removeAttr('style');
                    }

                });
            });
        });
    </script>
</head>

<body>


    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Liste des joueurs</h1>

                <div class="container">
                    <div class="text-center">
                        <a type="button" class="btn btn-outline-success me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 20px" href="creer.php">Mettez votre star en avant ! </a>
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
                                <td><a type="button" class="btn btn-primary me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 10px" href="details.php?id=<?= $cle['id'] ?>">details</a></td>
                                <td><a type="button" class="btn btn-success me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 10px" href="modifier.php?id=<?= $cle['id'] ?>">Modifier</a></td>
                                <td><a type="button" class="btn btn-danger me-md-2" data-toggle="button" aria-pressed="false" autocomplete="off" style="font-size: 10px" href="supprimer.php?id=<?= $cle['id'] ?>" onclick="return confirm('Etes vous sur de vouloir supprimer cette star')">Supprimer</a></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>


    <div id="scrollUp">
        <a href="#top"><img src="2top.png" /></a>
    </div>
</body>

</html>


<!-- 
    if (file_exists($cle['photo'])) {
        echo '<img src="'.$cle['photo'].'" alt="ok" />';
    } else {
        echo '<img src="'.$image.'" alt="non" />';
    }
            ?> -->