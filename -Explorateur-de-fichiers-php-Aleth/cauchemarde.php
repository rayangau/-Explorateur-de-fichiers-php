<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>explorateur de fichiers minimaliste</title>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="css/style.css" media="screen"/> 
<style type="text/css">
   img {
      width: 20px;
      max-height: 20px;
   }
</style>
</head>
<body>


   

<div id="fond">
<div id="centre">
<h1>Explorateur de jungle php</h1>
<div id="racine">
<?php
// repertoire du fichier
$base = $_SERVER['DOCUMENT_ROOT'];
//donne le chemin de ce fichier-là
   if (isset($_GET['dossier'])) {
       $dossier = trim(strip_tags($_GET['dossier']));
   } else $dossier = '.';
   
   if (($dossier == '.') || ($dossier == '/') || ($dossier == '')) {
      echo "Vous êtes à la racine de l'explorateur";
   } else echo $dossier;

?>
</div>
<div>
<?php
$chemin = $base.'/'.$dossier;
   unset($fichiers);
   $path = opendir($chemin);

while($fichiers[] = readdir($path));
   closedir($path);
   chdir($chemin);
   foreach($fichiers as $fichier) {
      if(is_dir($chemin.'/'.$fichier) && $fichier != '') {

         if($fichier != '.' && $fichier != '..') {
            echo "<div class=\"dossier\"><img src='reposit.jpg'/><a href=\"?dossier=$dossier/$fichier\" title=\"ouvrir le dossier $fichier\">$fichier</a></div>";

         } else if($dossier!="/" && $dossier!="." && $dossier!="" && $fichier=="..") {
            echo "<div class=\"dossier\"><img src='fleche.png'/><a href=\"?dossier=".substr($dossier,0,strrpos($dossier,"/"))."\" title=\"ouvrir le dossier $fichier\">Retour en arrière</a></div>";
         }
      }
    }
   
//fopen
   //substr($dossier,0,strrpos($dossier,"/") : enlève à partir du dernier /
   //? indique que c'est une variable. Dès qu'il y a du ?dossier, le get peut se mettre en marche et stocker dans la $variable 

$nb=0;
   $taille = 0;
   foreach($fichiers as $fichier)
      if(!is_dir($chemin.'/'.$fichier) && $fichier != ''){
         $nb++;
         $taille += filesize($fichier);
         $info = pathinfo($fichier);
         echo '<div class="fichier"><a href="?file='.$chemin.'/'.$fichier.'"><img src="file.jpg"/>'.$fichier.'</a></div>';

      }

?>
<!-- Lecture des fichiers -->

<div class="affichage">

   <?php


      if (isset($_GET['file'])) {
         
    $filer = fopen($_GET['file'], 'r');
    $file = $dossier.'/'.fread($filer, 9999999);
    print_r($file);

   $extensions = array(".png",".gif",".jpg",".jpeg");
  
 $extension = strrchr($_GET['file'],".");
 echo "extension ".$extension;
echo "extensions ".$extensions[2];
 }
     if (in_array($extension, $extensions)){ 
  echo '<img src="">';
    }
      

?>
</div>
</div>
<div>

<?php
printf("%d fichiers - %.0f ko - %.0f Mo libres",$nb,$taille/1024,(disk_free_space($chemin))/1048576);
// on aurait pu mettre : echo $nb." fichiers - ".$taille. "octets";
?>

<div>Je veux en voir plus!

<?php
echo "<a href='".$base."/".$dossier."/".$fichier."'>clique moi</a>";
?>
   
</div>

<!-- 
$file = $_GET['fichier'];

if (file_exists($fichier)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($fichier).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fichier));
    readfile($fichier);
    exit;
    echo $fichier;
}
 -->
</div>
</div>
</div>
</body>
</html>

