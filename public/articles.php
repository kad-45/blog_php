<?php
require_once dirname(__DIR__) . "/public/includes/_header.php";
require_once dirname(__DIR__) . "/public/includes/_navbar.php";
require_once dirname(__DIR__) . "/public/includes/_footer.php";
require_once dirname(__DIR__) . "/public/includes/connect.php";



//On écrit la requête.
$sql = "SELECT * FROM  `article`  ORDER BY `date_published` DESC";
//On exécute la requête.
$stm = $db->query($sql);

//On récupère les données.
$article = $stm->fetchAll();

//On définie le titre .
//$title = "Liste des articles";
?>
<h1>Liste des Articles</h1>
<section>

  <?php foreach($article as $article):?>
  <article>
    <h1><a href="/article.php?id=<?= $article["id"]; ?>">
        <?= strip_tags($article["title"]); ?></a> </h1>
    <p>Publié le
      <?= $article["date_published"]; ?> </p>
    <div>
      <?= strip_tags($article["content"]); ?></div>
  </article>
  <?php endforeach; ?>
</section>