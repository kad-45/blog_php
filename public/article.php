<?php
require_once dirname(__DIR__) . "/public/includes/_header.php";
require_once dirname(__DIR__) . "/public/includes/_navbar.php";
require_once dirname(__DIR__) . "/public/includes/_footer.php";
require_once dirname(__DIR__) . "/public/includes/connect.php";

//On vérifie si on a un id .
if(!isset($_GET["id"]) && empty($_GET["id"])){
  //l'id n'exist pas.
  header("Location : /articles.php");
  exit;
}
//Je récupère l'id.
$id = $_GET["id"];

//On va chercher l'article dans la BDD.
$sql = "SELECT * FROM `article` WHERE `id`= :id";

//On prépare la requête.
$stm = $db->prepare($sql);

//On inject les paramètres.
$stm->bindValue(":id", $id, PDO::PARAM_INT);

//On exécute la requête.
$stm->execute();

//On récupère l'article.
$article = $stm->fetch();

//On vérifie si l'article est vide.
if(!$article){
  //Article n'existe pas.
  http_response_code(404);
  echo " Article inexistant!";
  exit;
}

//Ici on a un article.


?>

<article>
  <h1> <?= strip_tags($article["title"]); ?> </h1>
  <p>Publié le
    <?= $article["date_published"]; ?> </p>
  <div>
    <?= strip_tags($article["content"]); ?></div>
</article>