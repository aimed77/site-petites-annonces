<?php
require_once('controller/database.php');
// reception des variables POST du formulaire
$id = trim($_GET['id']);
$nom = $_GET['nom'];
$nationalite = $_GET['nationalite'];
$age = $_GET['age'];
$taille = $_GET['taille'];
$poste = $_GET['poste'];
$photo = $_GET['photo'];
/***************************************************** */
@$uploaddir = 'photo/';
@$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
echo '<pre>';
move_uploaded_file(@$_FILES['photo']['tmp_name'], @$uploadfile);
/****************************************************** */
// si id est define & est un numeric dans _POST
if (isset( $_POST['id'] ) && is_numeric( $_POST['id'] ) )
   {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $nationalite = $_POST['nationalite'];
    $age = $_POST['age'];
    $taille = $_POST['taille'];
    $poste = $_POST['poste'];
    $photo = $uploadfile;
    updateUser($nom, $nationalite, $age, $taille, $poste, $photo, $id);
    header('Location:index.php');
} 
else
    echo "/***********************************************************************************************************/";

 $majUser = readLastUser();
 print_r($majUser.'<br>');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value=<?=$id?>>
        <input type="text" name="nom" value=<?=$nom?>>
        <input type="text" name="nationalite" value=<?=$nationalite?>>
        <input type="text" name="age" value=<?=$age?>>
        <input type="text" name="taille" value=<?=$taille?>>
        <input type="text" name="poste" value=<?=$poste?>>
        <input type="file" name="photo" value=<?=$photo?>><br>
        <input type="submit" value="MAJ">
    </form>
    <?php  echo "/***********************************************************************************************************/";?>
</body>
</html>