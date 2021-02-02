<?php
require_once('database.php');

// if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
//     echo "File ". $_FILES['photo']['name'] ." uploaded successfully.\n";
//     echo "Displaying contents\n";
//     // readfile($_FILES['photo']['tmp_name']);
//  } else {
//     echo "Possible file upload attack: ";
//     echo "filename '". $_FILES['photo']['tmp_name'] . "'.";
//  }
$uploaddir = "photo/../";
$filename = $uploaddir . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $filename);
echo "<br>".$uploaddir." <br>".$filename;
$nom = $_POST['nom'];
$nationalite = $_POST['nationalite'];
$age = $_POST['age'];
$poste = $_POST['poste'];
$email = $_POST['email'];
$photo = $filename;

// $pdo = getPdo();
createUser($nom, $nationalite, $age, $poste, $email, $photo);
header("Location:validation.php");
// $lastUser = readLastUser();
// print_r($lastUser);