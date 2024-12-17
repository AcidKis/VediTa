<?php
// подключаем бд и список запрашиваем
require_once 'CProducts.php';
$productsClass = new CProducts('127.0.0.1:3306', 'root', 'root', 'vedita');
$products = $productsClass->getList();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Продукты компании</title>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <table border="1" id="productsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название товара</th>
                <th>Цена</th>
                <th>Артикул</th>
                <th>Кол-во</th>
                <th>Дата добавления</th>
                <th>Видимость</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr data-id="<?= $product['ID'] ?>">
                <td><?= $product['PRODUCT_ID'] ?></td>
                <td><?= $product['PRODUCT_NAME'] ?></td>
                <td><?= $product['PRODUCT_PRICE'] ?></td>
                <td><?= $product['PRODUCT_ARTICLE'] ?></td>
                <td>
                    <button class="decrease">-</button>
                    <span class="quantity"><?= $product['PRODUCT_QUANTITY'] ?></span>
                    <button class="increase">+</button>
                </td>
                <td><?= $product['DATE_CREATE'] ?></td>
                <td><button class="hideButton">Скрыть</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- js моя слабая сторона учил в основном бек чистый, так что тут комменты в основном для лучшего запоминания -->
    <script>
        <!-- $ - сокр jq обращаемся к документу, on(событие, класс к которому обращаемся, функция()) -->
        $(document).on('click', '.hideButton', function() {
            // переменная столбца первый элемент соответствующий условию
            let row = $(this).closest('tr');
            // получаем айдишник чтобы передать
            let productId = row.data('id');
            // аджакс
            $.post('./ajax/hide_product.php', { id: productId }, function() {
                row.hide();
            });
        });

        // при клике на инкрис дикрис чтобы не писать два разных
        $(document).on('click', '.increase, .decrease', function() {
            //строку получаем
            let row = $(this).closest('tr');
            //получаем количество
            let quantity = parseInt(row.find('.quantity').text());
            // id
            let productId = row.data('id');
            // добавляем если класс инкрис добавляем иначе отнимаем, блокируем отрицательные значения
            quantity += $(this).hasClass('increase') ? 1 : -1;
            if (quantity < 0) quantity = 0;

            //Обновляем строку
            row.find('.quantity').text(quantity);
            // отправляем аджакс
            $.post('ajax/update_quantity.php', { id: productId, quantity: quantity });
        });
    </script>
</body>
</html>
