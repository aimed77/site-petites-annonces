<?php
require_once('controller/database.php');

// if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
//     echo "File ". $_FILES['photo']['name'] ." uploaded successfully.\n";
//     echo "Displaying contents\n";
//     // readfile($_FILES['photo']['tmp_name']);
//  } else {
//     echo "Possible file upload attack: ";
//     echo "filename '". $_FILES['photo']['tmp_name'] . "'.";
//  }
$uploaddir = "photo/";
$filename = $uploaddir . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $filename);
echo "<br>".$uploaddir." <br>".$filename;
$nom = $_POST['nom'];
$nationalite = $_POST['nationalite'];
$age = $_POST['age'];
$taille = $_POST['taille'];
$poste = $_POST['poste'];
$photo = $filename;

// $pdo = getPdo();
createUser($nom, $nationalite, $age, $taille, $poste, $photo);
header('Location:index.php');
// $lastUser = readLastUser();
// print_r($lastUser);