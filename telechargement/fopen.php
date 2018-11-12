<?php
// $handle = fopen("/xampp/htdocs/dossier_PHP/lire.txt","r");
// $handle = fopen("/home/rasmus/file.gif", "wb");
// $handle = fopen("http://www.example.com/", "r");
// $handle = fopen("ftp://user:password@example.com/somefile.txt", "w");

// var_dump($handle);
?>

<?php

$xampp = "C:/xampp/htdocs/";


$myfile = fopen($xampp."/dossier_PHP/lire.txt", "r");

if( !$myfile)
exit ("ouverture du fichier impossible");


while($str = fgets($myfile)){
echo $str."<br>";
}
