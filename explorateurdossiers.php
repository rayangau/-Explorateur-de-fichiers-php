<!DOCTYPE html>
<html>
<head>
	<title>Explorateur de dossier</title>
</head>
<body>
<p>Avec get et post récupérer les noms des dossiers</p>

<?php
// chdir (directory)

// dossier courant
//echo getcwd() . "<br>";

// chdir = change de dossier
// chdir () change le dossier courant de PHP en directory
//chdir('logo');

// dossier courant
//echo getcwd() . "<br>";

?>
<hr>
<?php
if ($handle = opendir('/var/www/html/-Explorateur-de-fichiers-php/')) {
    echo "Gestionnaire du dossier : $handle<br>";
    echo "Entrées :<br>";

    /* Ceci est la façon correcte de traverser un dossier. */
    while (false !== ($en = readdir($handle))) {
        echo "$en<br>";
    }

    /* Ceci est la MAUVAISE façon de traverser un dossier. */
    while ($entry = readdir($handle)) {
        echo "$entry<br>";
    }

    closedir($handle);
}
?>
<hr>

<?php
$dir    = '/var/www/html/-Explorateur-de-fichiers-php/';
$files1 = scandir($dir);
//$files2 = scandir($dir, 1);

print_r($files1);
//print_r($files2);


?>
<hr>
<?php
function list_dir($name, $level=0) {
  if ($dir = opendir($name)) {
    while($file = readdir($dir)) {
      for($i=1; $i<=(4*$level); $i++) {
        echo "&nbsp;";
    }
      echo "$file<br>\n";
      if(is_dir($file) && !in_array($file, array(".",".."))) {
        list_dir($file,$level+1);
      }
    }
    closedir($dir);
  }
}
list_dir(".");
?>
<!-- /pour voir le contenu : 
<?php
//$wamp = "/var/www/html/";


//$myfile = fopen($wamp."-Explorateur-de-fichiers-php/explorateurdossiers.php", "r");

//if( !$myfile)
//exit ("ouverture du fichier impossible");


//while($str = fgets($myfile)){
//echo $str."<br>";
//} 
?>
 -->
</body>
</html>