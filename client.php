<?php
require "./binaryTree.php";
require "./BinaryTreeElement.php";

use Dinar\NewClass\BinaryTreeExperiments\BinaryTreeElement;
use Dinar\NewClass\BinaryTreeExperiments\BinaryTree;


$object = new BinaryTree();
$object->add(14);
$object->add(6);
$object->add(7);
$object->add(2);
$object->add(3);
$object->add(15);
$object->add(8);
$object->add(23);
$object->add(12);
$object->add(9);
$object->add(10);
$object->add(1);
$object->add(40);
$object->add(24);
$object->add(13);
$object->add(120);
$object->add(13);
//$object->deleteElement(13);



$object->deleteElement(12);
$object->deleteElement(1);

echo "<br>";
if ($object->containsValueTraversing(40)) {
  echo "Значение присутствует в дереве";
} else {
  echo "Значения в дереве нет"; 
}
var_dump($object->containsValueTraversing(9));
echo "<br>";
echo "Минимальное значение в дереве ";
var_dump($object->findMinReal());
$object->deleteElement(2);

var_dump($object->findMinReal());
$object->add(1);

var_dump($object->findMinReal());


echo "<br>";
var_dump($object->countTraversingReal());
?>

<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title>Show folders</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css">
</head>
<body class="page_body">
    
<?php print_r($object->drawTree($object->treeTraversal())); ?>
</body>
</html>