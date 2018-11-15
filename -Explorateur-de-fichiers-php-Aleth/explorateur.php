<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manipulation</title>
</head>
<body>
<ul>
<?php






if ($dossier = opendir('/var/www/html/-Explorateur-de-fichiers-php/')){
while(false!==$fichier = readdir($dossier)){if($fichier !='.'&& $fichier != '..'){
echo'<li><a href="http://http://localhost/-Explorateur-de-fichiers-php/explorateur.php/'.$fichier.'">'.$fichier.'</a></li>';
}
}
closedir($dossier);
}





?>
</ul>
</body>
</html> 