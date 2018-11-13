<? php 

$path = realpath('/xampp/htdocs');
 
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
foreach($objects as $name => $object){
   var_dump($name);

?>
..