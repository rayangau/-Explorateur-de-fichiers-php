





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

<?php
$dir    = "C:/wamp64/www";
$files = scandir($dir);

echo '<pre>';
print_r($files);
echo '<pre>';

$wamp = "C:/wamp64/www/";



$myfile = fopen($wamp."tuto_balises/h1h6.php", "r");

if( !$myfile)
exit ("ouverture du fichier impossible");


while($str = fgets($myfile)){
echo $str."<br>";
};




?>

</body>
</html>

