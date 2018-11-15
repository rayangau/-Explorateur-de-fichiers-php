<?php

require_once("/home/stagiaire/vendor/autoload.php/autoload.php");

$loader = new \Twig_Loader_Filesystem(__DIR__.'/templates');
$twig = new \Twig_Environment($loader);

echo $twig->render('demo.twig', ['name' => 'Neareeves']);
?>