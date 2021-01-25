<?php
// $message = $_GET['message'];
$image = "<img src=view\img\AimsMercato.jpg width=200 height=200 alt=image>";
require_once('controller/database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire saisie de data</title>
</head>

<body>
    <!---  Formulaire method post send $var to recept.php 
with simple type en name only no more need today-->
    <form action="creation.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nom"><br>
        <input type="text" name="nationalite"><br>
        <input type="text" name="age"><br>
        <input type="text" name="taille"><br>
        <input type="text" name="poste"><br>
        <input type="file" name="photo"><br>
        <input type="submit" name="submit" value="Créé">
    </form>
    <?php
    // echo $message;
     $users = readUsers();
$users2 = array_reverse($users);
        foreach ($users2 as $key => $value) {

            echo "<br>".$value['nom']."<a href='supprimer.php?id=".$value['id']."'>Supprimer</a>";
            echo "<br>".$value['nationalite'];
            echo "<br>".$value['age'];
            echo "<br>".$value['taille'];
            echo "<br>".$value['poste']."<br>";
            if (file_exists($value['photo'])){
                echo "<br>".$value['nationalite']."<a href='maj.php?id=".$value['id']."&nom=".$value['nom']."&nationalite=".$value['nationalite']."&age=".$value['age']."&taille=".$value['taille']."&poste=".$value['poste']."&photo=".$value['photo']."&id=".$value['id']."' >
               <img src=".$value['photo']." width=400 height=400 alt=image> </a>";
            echo "<br><br>";
            }else {echo "<br>".$value['nationalite']."<a href='maj.php?id=".$value['id']."&nom=".$value['nom']."&nationalite=".$value['nationalite']."&age=".$value['age']."&taille=".$value['taille']."&poste=".$value['poste']."&photo=".$value['photo']."&id=".$value['id']."' >
                ".$image. " </a>";
             echo "<br><br>";}

    }

    ?>
</body>

</html>