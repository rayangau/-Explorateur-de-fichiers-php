<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manipulation de fichiers</title>
</head>
<body>
<h1>Manip de fichiers PHP</h1>
<!-- $myfile = fopen($wamp."tuto_balises/footer.php", "r"); -->

<?php

$wamp = "C:/wamp64/www/";


$myfile = fopen($wamp."tuto_balises/footer.php", "r");

if( !$myfile)
exit ("ouverture du fichier impossible");


while($str = fgets($myfile)){
echo $str."<br>";
}

// $infos = file ("infos.txt");
// print_r($infos);



?>



a

if(!(fclose($myfile)))
exit ("fermeture du fichier echoué");












?>


























</body>
</html>
