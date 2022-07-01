<?php
//var_dump($_FILES);
//On verifie si un fichier été envoyé.
if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0)
{
    //On a reçu l'image.
      //On procède aux vérifications.
      //On vérifie tjs l'extension et le type MIME
      $allowed = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png" => "image/png"
      ];
      $filename = $_FILES["image"]["name"];  
      $filetype = $_FILES["image"]["type"];
      $filesize = $_FILES["image"]["size"];

      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      //On vérifie l'absence de l'extension dans les clés de $allowed ou l'absence du type MIME dans les valeurs .
      if(!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed))
      {;
      //Ici soit l'extension de fichier soit le type est incorrect,
      die("Erreur : format de fichier incorrect"); 

      }

//Ici le type est correct.
//On limite à 1M.
      if($filesize > 1024 * 1024)
      {
      die("Fichier trop volumineux");
      } 
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/main.css">

</head>

<body>
  <h1>Ajout de fichier</h1>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="file">Fichier</label>
      <input type="file" class="form-control-file" name="image" id="file">
    </div>
    <button type="submit" class="btn btn-primary">Envoyez</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>

  <footer>
    <p>CRUD @ 2022</p>
  </footer>
</body>

</html>