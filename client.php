<?php
require __DIR__ . "/BinaryTree.php";
require __DIR__ . "/BinaryTreeElement.php";

use Dinar\NewClass\BinaryTreeExperiments\BinaryTreeElement;
use Dinar\NewClass\BinaryTreeExperiments\BinaryTree;

$find = 40;
$delete = 2;

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
$object->add(40);
$object->add(24);
$object->add(13);
$object->add(120);
$object->add(13);
//$object->deleteElement(13);
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
 

<pre>
<?php print_r($object->treeTraversal());?>
</pre>
<div>
Поиск значения <?= $find ?> в дереве<br>
<?php 
if ($object->containsValueTraversing($find)) {
  echo "Значение присутствует в дереве";
} else {
  echo "Значения в дереве нет"; 
}?>
<br>
</div>
<div>
Минимальное значение в дереве
<?= var_dump($object->findMinReal());?>
</div>
<div>
Удалил элемент с номером <?= $delete;?>
<?php $object->deleteElement($delete);?>
</div>
<div>Минимальное значение в дереве 


<?= var_dump($object->findMinReal());?>
</div>

<div>Количество элементов в дереве:
<?= var_dump($object->countTraversingReal());?>
</div>
<?=print_r($object->drawTree($object->treeTraversal())); ?>
</body>
</html>