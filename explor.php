<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manipulation</title>
</head>
<body>
<ul>
<?php

if (isset($_GET['dir']))
{
liste($_GET['dir']);
}

if (isset($_GET['dir']))
{
liste($_GET['dir']);
}



if ($dossier = opendir('C:/wamp64/www/multgr3')){
  while(false!==$fichier = readdir($dossier)){if($fichier !='.'&& $fichier != '..'){
    echo'<li><a href="http://localhost/multgr3/'.$fichier.'">'.$fichier.'</a></li>';
  }
}
closedir($dossier);
}


<a href="http://localhost/Explorateur_de_fichiers/explore.php?dir=<?php echo $_GET['dir'] . "/" . $fichier?>"><?php echo $fichier?></a><br>


?>
</ul>
</body>
</html>










<?php


 // $dir    = "C:/wamp64/www";
// $files = scandir($dir);

// echo '<pre>';
// print_r($files);
// echo '<pre>';

// $wamp = "C:/wamp64/www/";



// $myfile = fopen($wamp."manip_fichiers/manipulation.php", "r");

// if( !$myfile)
// exit ("ouverture du fichier impossible");


// while($str = fgets($myfile)){
// echo $str."<br>";
// };


// if ($dossier = opendir('C:/wamp64/www/Explorateur de fichiers')){
//   while(false!==$fichier = readdir($dossier)){if($fichier !='.'&& $fichier != '..'){
//     echo'<li><a href="C:\wamp64\www\Explorateur de fichiers/'.$fichier.'">'.$fichier.'</a></li>';
//   }
// }
// closedir($dossier);
// }





