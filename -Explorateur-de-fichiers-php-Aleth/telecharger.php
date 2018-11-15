<?php

if (isset($_GET['fichier'])){

$telecharge =$_GET['fichier'];

}
<!--
$file = $_GET['telecharge'];

if (file_exists($telecharge)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($telecharge).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($telecharge));
    readfile($telecharge);
    exit;
    echo $telecharge;
}
$chemin_reel=realpath("index.php")
echo $chemin_reel;
?>
