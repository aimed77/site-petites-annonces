<?php
// On détermine sur quelle page on se trouve
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}
// On se connecte à là base de données
require_once('connexiondb.php');

// On détermine le nombre total d'articles
$sql = 'SELECT COUNT(*) AS nb_articles FROM `test`;';

// On prépare la requête
$query = $BDD->prepare($sql);

// On exécute
$query->execute();

// On récupère le nombre d'articles
$result = $query->fetch();

$nbArticles = (int) $result['nb_articles'];

// On détermine le nombre d'articles par page
$parPage = 10;

// On calcule le nombre de pages total
$pages = ceil($nbArticles / $parPage);

// Calcul du 1er article de la page
$premier = ($currentPage * $parPage) - $parPage;

$sql = 'SELECT * FROM `test` ORDER BY `id` DESC LIMIT :premier, :parpage;';

// On prépare la requête
$query = $BDD->prepare($sql);

$query->bindValue(':premier', $premier, PDO::PARAM_INT);
$query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

// On exécute
$query->execute();

// On récupère les valeurs dans un tableau associatif
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- mon css -->
    <link href="../css/css.css" rel="stylesheet">
    <!-- titre -->
    <title>AimsMercato</title>

    <!-- DEBUT -->
    <style>
#scrollUp
{
position: fixed;
bottom : 10px;
right: -100px;
opacity: 0.5;
}
</style>
 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
 
<script>
            jQuery(function(){
                $(function () {
                    $(window).scroll(function () {
                        if ($(this).scrollTop() > 200 ) { 
                            $('#scrollUp').css('right','91%');
                        } else { 
                            $('#scrollUp').removeAttr( 'style' );
                        }
 
                    });
                });
            });
</script>
</head>

<body>

    <!-- Annonce + logo -->
    <br><br>
    <div class="container ">
        <div>
            <img class="img-fluid mx-auto d-block" src="AimsMercato.jpg" alt="logo" width="25%">
        </div>
        <hr> <br>
        <div class=" text-center ">
            <a type="button" class="btn btn-success me-md-2" data-toggle="button" aria-pressed="false"
                autocomplete="off" style="font-size: 40px;" href="deposer.php">Mettez votre star en avant ! </a>
        </div>
    </div>
    <br> <br> <br>


    <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

    <!-- Mini Header 1 -->
    <div class="container ">

        <div class="row">
            <?php
          foreach ($articles as $article){
          ?>
            <div class="col-sm-6 espacement">
                <div class="card h-100">


                    <a href="description.php?id=<?= $article['id'] ?>"><img class="card-img-top" src="<?= $article['photo'] ?>" alt=""
                            width="30%"></a>


                    <div class="card-body">
                        <h2 class="card-title text-center">
                            <?= $article['nom'] ?> <br>
                            <?= $article['poste'] ?>
                        </h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam
                            aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt,
                            dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
                    </div>
                </div>
            </div>
            <?php
          }
          ?>
        </div>
    </div>


    <br> <br>



    <!-- Pagination -->

    <nav>
    <ul class="pagination justify-content-center">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>

<!-- monter en haut de la page -->

<div id="scrollUp">
<a href="#top"><img src="2top.png"/></a>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
    crossorigin="anonymous"></script>

</html>




