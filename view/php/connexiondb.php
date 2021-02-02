<?php

class ConnexionDB{
private $host = 'localhost';
private $name = 'mytest';
private $user ='root';
private $pass = '';
private $connexion;

function __construct(){

   try{
      $this->connexion = new PDO('mysql:host='. $this->host.';dbname=' . $this->name . ';', $this->user , $this->pass );
      $this->connexion(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch (Exception $e){
      echo "Erreur : Impossible de se connecter à la BDD !" . $e->getMessage();
      die();
   }
}

   public function connexion(){
      return $this->connexion;
   }
}
$DB = new ConnexionDB;
$BDD = $DB->connexion();

?>