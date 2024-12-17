<?php
require_once '../CProducts.php';
$productsClass = new CProducts('127.0.0.1', 'root', 'root', 'vedita');
// если постом прилетело айди и кол-во, через класс делаем апдейт
if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $productsClass->updateQuantity((int)$_POST['id'], (int)$_POST['quantity']);
}
?>
