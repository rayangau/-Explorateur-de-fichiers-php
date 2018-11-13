
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>explorateur de fichiers minimaliste</title>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="css/style.css" media="screen"/> 
</head>
<body>


   

<div id="fond">
<div id="centre">
<h1>Explorateur de jungle php</h1>
<table cellspacing="2" cellpadding="5" style="width:100%;">
<tr>
<td colspan="2" class="infos">
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
</td>
</tr>
<tr>
<td>
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
            echo "<div class=\"dossier\"><a href=\"?dossier=$dossier/$fichier\" title=\"ouvrir le dossier $fichier\">$fichier</a></div>";

         } else if($dossier!="/" && $dossier!="." && $dossier!="" && $fichier=="..") {
            echo "<div class=\"dossier\"><a href=\"?dossier=".substr($dossier,0,strrpos($dossier,"/"))."\" title=\"ouvrir le dossier $fichier\">Retour en arrière</a></div>";
         }
      }

   }

   //substr($dossier,0,strrpos($dossier,"/") : enlève à partir du dernier /
   //? indique que c'est une variable. Dès qu'il y a du ?dossier, le get peut se mettre en marche et stocker dans la $variable 
?>
</td>
<td>
<?php
$nb=0;
   $taille = 0;
   foreach($fichiers as $fichier)
      if(!is_dir($chemin.'/'.$fichier) && $fichier != ''){
         $nb++;
         $taille += filesize($fichier);
         $info = pathinfo($fichier);
         echo '<div class="fichier">'.$fichier.'</div>'.chr(10);

      }
?>
</td>
</tr>
<tr>
<td colspan="2" class="infos">
<?php
printf("%d fichiers - %.0f ko - %.0f Mo libres",$nb,$taille/1024,(disk_free_space($chemin))/1048576);
// on aurait pu mettre : echo $nb." fichiers - ".$taille. "octets";
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>

