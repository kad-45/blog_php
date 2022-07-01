<?php
//Comment se connecter à la BDD.
  //Constantes d'environnement.
    define("DBHOST", "tuto.local");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "blog_php");

//DSN de connexion (data source name).
    $dsn = "mysql:host=localhost;port=3306; dbname=blog_php";
//On vas se connecter à la base.
try{
//On va instancier un PDO.
   $db = new PDO($dsn, DBUSER, DBPASS);
//On s'assure d'envoyer les données en UTF8.
$db->exec("SET NAMES utf8");

//On définit le mode de "fetch()" par défault.
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}catch(PDOException $e){
	    die($e->getMessage());	
}
//Ici on est connecté à la base de donnée.
//On peut récupérer la liste des utilisateurs (users).(read)
$sql = "SELECT * FROM `users`"; 

//On exécute directement la requête.
$stm = $db->query($sql);

//On récupère les données pour cela on utilise la méthode(ftch() ou fetchAll()).
$user = $stm->fetchAll();
//Ajouter un utilisateur.
$sql = "INSERT INTO `users`(`lastname`,`firstname`, `username`, `password`) 
VALUES('BARAMITA', 'Sevrine', 'Sivrien45', 'AZIRATY12345');";
$stm = $db->query($sql);
//Modifier un utilisateur.
$sql = "UPDATE users SET password ='123456' WHERE id = 31;";
$stm = $db->query($sql);
//suprimer des utilisateurs.
$sql = "DELETE FROM users WHERE id = 33";
$stm = $db->query($sql);
?>