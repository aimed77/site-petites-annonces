<?php

use phpDocumentor\Reflection\Types\Null_;

function getPdo() : PDO
{
 /** 
 * $options = tableau MODE exceptions et Attribus FETCH MODE par default a ASSOC
 */
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
try {
   $pdo = new PDO('mysql:host=localhost;dbname=mytest;charset=utf8','root','', $options);
     }
 catch (PDOException $e) {
         echo 'Connection failed: ' . $e->getMessage();
     }

    return $pdo;
}

function createUser(string $nom,string $nationalite,string $age,string $poste,string $email, $photo) :bool
{
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO test (nom, nationalite, age, poste, email, photo) VALUES (:nom, :nationalite, :age, :poste, :email, :photo)');
    //$query = $pdo->prepare('INSERT INTO test (nom, nationalite, age, poste, email, photo) VALUES (?, ?, ?, ?, ?, ?)');
  
    $query->bindValue(':nom',$nom, PDO::PARAM_STR);
    $query->bindValue(':nationalite',$nationalite, PDO::PARAM_STR);
    $query->bindValue(':age',$age, PDO::PARAM_STR);
    $query->bindValue(':poste',$poste, PDO::PARAM_STR);
    $query->bindValue(':email',$email, PDO::PARAM_STR);
    $query->bindValue(':photo',$photo, PDO::PARAM_STR);
    if (!$query->execute());
  // if (!$query->execute(['nom' =>$nom,'nationalite'=>$nationalite,'age'=>$age,'poste'=>$poste,'email'=>$email,'photo'=>$photo]));
   // if (!$query->execute([$nom,$nationalite,$age,$poste,$email,$photo]));

  
  {return false;}
}

function readUsers() : array
{
    $pdo = getPdo();
    $query = $pdo->query('SELECT * FROM `test` ORDER BY `id` DESC');
    $users = $query->fetchAll();
    return $users;     
}


function readLastUser() 
{
    $pdo = getPdo();
    $query = $pdo->query('SELECT * FROM test');
    $user = $query->fetchAll();
    $enduser = end($user);
    var_dump($enduser);
    echo "<br> début du dernnier enregistrement <br>";
  foreach ($enduser as $value) {
         echo "<br>Enregistrement->".$value."<br>";
         if (file_exists($value)) {
              echo "<img src=".$value." width=150 height=200><br>"; 
           
         } else  {  echo "----------------";} 
  }
     echo "<br>Fin du dernier enregistrement <br><br><br><a href='index_prive.php'>retour</a>";
}

// Mise a jour de test en fonction de l'ID
function updateUser(string $nom,string $nationalite,string $age,string $poste,string $email, string $photo, int $id) :bool
{
    $pdo = getPdo();
    $query = 'UPDATE test SET nom =?, nationalite =?, age =?, poste =?, email =?, photo =? WHERE id =?';
    $stmt = $pdo->prepare($query);
    if (!$stmt->execute([$nom, $nationalite, $age, $poste, $email, $photo, $id]));
    return false;
}

function deleteUser(int $id)
{
    $pdo = getPdo();
    $query = 'DELETE FROM test WHERE id =?';
    $stmt= $pdo->prepare($query);
    if (!$stmt->execute([$id]));
    header('Location: test.php?message=<h1>test id: '. $id . ' bien supprimé</h1>');
    exit();    
}
