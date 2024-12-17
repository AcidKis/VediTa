<?php
require_once '../CProducts.php';
$productsClass = new CProducts('127.0.0.1', 'root', 'root', 'vedita');
// если постом прилетело айди то через класс обновляем
if (isset($_POST['id'])) {
    $productsClass->hideProduct((int)$_POST['id']);
}
