<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>explorateur de fichiers minimaliste</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" rev="stylesheet" type="text/css" href="stylesAlethexplo.css" media="screen"/> 
  <style type="text/css">
</style>
</head>
<body>




  <div id="fond">
    <div id="centre">
      <h1>Explorateur de jungle php</h1>
      <div id="racine" class="milieu">
        <?php
// repertoire du fichier
        $base_serv = $_SERVER['DOCUMENT_ROOT'];
//donne le chemin de ce fichier-là
        if (isset($_GET['dossier'])) {
         $dossier = trim(strip_tags($_GET['dossier']));
       } else $dossier = '.';

       if (($dossier == '.') || ($dossier == '/') || ($dossier == '')) {
        echo "<div class='etesracine'>Vous êtes à la racine de l'explorateur</div>";
      } else echo $dossier;


      $base_url = '//'.$_SERVER['HTTP_HOST'].'/';
      $chemin = $base_serv.'/'.$dossier;
      unset($fichiers);
      $path = opendir($chemin);

      while($fichiers[] = readdir($path));
      closedir($path);
      chdir($chemin);
      foreach($fichiers as $fichier) {
        if(is_dir($chemin.'/'.$fichier) && $fichier != '') {

         if($fichier != '.' && $fichier != '..') {
          echo "<div class=\"dossier\"><img src='reposit.png'/><a href=\"$base_url?dossier=$dossier/$fichier\" title=\"ouvrir le dossier $fichier\">   $fichier</a></div>";

        } else if($dossier!="/" && $dossier!="." && $dossier!="" && $fichier =="..") {
          echo "<div class=\"dossierracine\"><a href=\"$base_url?dossier=".substr($dossier,0,strrpos($dossier,"/"))."\" title=\"ouvrir le dossier $fichier\"><img src='fleche.png'/><br>Retour en arrière</a></div>";
        }
      }
    }

//fopen
   //substr($dossier,0,strrpos($dossier,"/") : enlève à partir du dernier /
   //? indique que c'est une variable. Dès qu'il y a du ?dossier, le get peut se mettre en marche et stocker dans la $variable 
//    ./ : dossier courant
//    .. : dossier précédent
    // part depuis la racine

    $nb=0;
    $taille = 0;
    $chemin_url = $base_url.'/'.$dossier;
    foreach($fichiers as $fichier)
      if(!is_dir($chemin.'/'.$fichier) && $fichier != ''){
       $nb++;
       $taille += filesize($fichier);
       $info = pathinfo($fichier);
       echo '<div class="fichier"><a href="?dossier='.$dossier.'&amp;file='.$fichier.'"><img src="file.png"/>    '.$fichier.'</a></div>';
//echo '<div class="fichier"><a href="?file='.$chemin.'/'.$fichier.'"><img src="file.jpg"/>'.$fichier.'</a></div>';


     }

     ?>
     <div class="stats">
     <?php
     printf("%d fichiers - %.0f ko - %.0f Mo libres",$nb,$taille/1024,(disk_free_space($chemin))/1048576);
// on aurait pu mettre : echo $nb." fichiers - ".$taille. "octets";
?>
</div>
<?php
     if(isset($_GET['file'])){

      echo '<br><a href="telecharger.php?fichier='.$_GET['file'].'"><input type="submit" value="Télécharger"/></a>';
      echo '<br><a href="'.$base_url.trim(strip_tags($_GET['dossier'])).'/'.trim(strip_tags($_GET['file'])).'"><input type="submit" value="Ouvrir"/></a>';
    }


    ?>
     <!-- Lecture des fichiers 
passer la variable dossier dans l'url : deux variables en get dans l'url
file = fichier; dossier = dossier
-->

<div class="affichage">

 <?php

 if (isset($_GET['file'])) {
   $extensions = array(".png",".gif",".jpg",".jpeg",".PNG",".JPG",".JPEG",".GIF");
   $extension = strrchr($_GET['file'],".");
   if (in_array($extension, $extensions)){ 
    echo '<img class="preview" src="'.$base_url.trim(strip_tags($_GET['dossier'])).'/'.trim(strip_tags($_GET['file'])).'">';

  } else {
    $filer = fopen($_GET['file'], 'r');
    $file = $dossier.'/'.fread($filer, 9999999);
         // print_r($file);

    echo '<div class="impressionfichier">'.$file.'</div>';
  }
}

         //à faire si temps : ajouter un niveau d'extensions avec une petite animation qui dit que ça va etre difficile d'ouvrir ce fichier


?>
</div>
</div>
<div>


<!-- <form method="post" action="telecharger.php"> 
   <button value="submit">Télécharger</button>
 </form> -->

<!-- 
bouton télécharger pointe vers une page qui sert juste à ça
scanner dossier : base_serv. chemin réel (/var/html...)
afficher image : base url : localhost. parc'afficher une image, c'est une requête http.
css : url
php_self donne le chemin du script courant
il y a aussi la méthode realpath.
$chemin_reel = realpath('index.html');
$hemin_reel = str_replace("ce que je veux chercher", "par quoi je le remplace", où c'est à dire dans la variable machin)

-->
</div>
</div>
</div>
</body>
</html>

