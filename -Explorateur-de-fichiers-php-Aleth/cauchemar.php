<!DOCTYPE html>
<html>
<head>
    <title>Exploration</title>
</head>
<body>

    <?php
//$base : /var/www/html 
        $base = $_SERVER['DOCUMENT_ROOT'];


            if (isset($_GET['dossier'])) {
                $dossier = trim(strip_tags($_GET['dossier']));
                echo $dossier;
            } else $dossier = '.';

            if (($dossier == '.') || ($dossier == '/') || ($dossier == '')) {
                echo '';
            } else echo $dossier; 

echo $base;


$path = $base./.$dossier;

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



</body>
</html>