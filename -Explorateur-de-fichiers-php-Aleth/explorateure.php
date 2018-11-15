<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Manipulation</title>
</head>
<body>
	<ul>
		<?php

		

			$base = $_SERVER['DOCUMENT_ROOT'];
			if (isset($_GET['dossier'])) {
				$dossier = trim(strip_tags($_GET['dossier']));

			} else $dossier = '.';

			if (($dossier == '.') || ($dossier == '/') || ($dossier == '')) {
				echo '';
			} else echo $dossier; 



		if ($dossier = opendir('/var/www/html/-Explorateur-de-fichiers-php/')){
			while(false!==$fichier = readdir($dossier)){if($fichier !='.'&& $fichier != '..'){

			}
		}
		closedir($dossier);
	}


	function list_dir($name, $level=1) {
		if ($dir = opendir($name)) {
			while(false !== $file = readdir($dir)) {
				if($file !='.'&& $file != '..') {
					for($i=1; $i<=($level); $i++) {
					if ($level == 1){
						echo'<li><a href="http://localhost/-Explorateur-de-fichiers-php/'.$file.'">'.$file.'</a></li>';
						$level == 2;
					} else if ($level == 2) {
						echo '<span style="margin-left: 20px">';
						echo'<li><a href="http://localhost/-Explorateur-de-fichiers-php/'.$file.'">'.$file.'</a></li>';
						echo '</span>'
						$level == 3;
					} else if ($level ==3) {
						echo "&nbsp;";
						echo'<li><a href="http://localhost/-Explorateur-de-fichiers-php/'.$file.'">'.$file.'</a></li>';
						$level == 4;
					} else if ($level == 4) {
						$level == 1;
					} else {

					}
				}
  					//echo'<li><a href="http://localhost/-Explorateur-de-fichiers-php/'.$file.'">'.$file.'</a></li>';
						//echo "$file<br>\n";

				if(is_dir($file) && !in_array($file, array(".",".."))) {
					list_dir($file,$level+1);
				}
			}
		}
		closedir($dir);
	}
}
list_dir(".");

// function indentation() {
// 	if ($level == 0) {
// 		echo "";
// 	}
// }
//ajouter class selon le level 20 px x level pour décaler

?>
<!-- Un sélecteur de dossiers avec un formulaire : effectivement, ce code ne permet que de lister le contenu du dossier que vous avez indiqué en paramètre à opendir() ; avec une variable $_GET dans l'adresse, vous pourriez faire varier le paramètre de opendir() (sécuriser votre variable, on ne sait jamais ;) ). -->

</ul>
</body>
</html> 