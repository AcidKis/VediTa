<?php
class CProducts {

    //решил через класс подключить бд
    private $db;

    //в конструкт запихиваем данные для дб
    public function __construct($host, $user, $password, $database) {
        $this->db = new mysqli($host, $user, $password, $database);

        //отработка ошибок
        if ($this->db->connect_error) {
            die("Ошибка подлючения:" . $this->db->connect_error);
        }
    }

    // получаем лист товаров
    // базовый лимит 10 поставил
    public function getList($limit = 10) {
        $query = "SELECT * FROM Products WHERE HIDDEN_PRODUCT = 0 ORDER BY DATE_CREATE DESC LIMIT ?";
        $prepared = $this->db->prepare($query);
        // теперь у нас подготовленый запрос класса mysqli_stmt
        // заменяем ? на инт лимита и делаем запрос
        $prepared->bind_param("i", $limit);
        $prepared->execute();
        $result = $prepared->get_result();
        // суем в ассоциативный массив
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    // прячем продукт
    public function hideProduct($id) {
        $query = "UPDATE Products SET HIDDEN_PRODUCT = 1 WHERE ID = ?";
        $prepared = $this->db->prepare($query);
        // То же самое что и выше просто апдейтим в базе
        $prepared->bind_param("i", $id);
        $prepared->execute();
    }

    public function updateQuantity($id, $quantity) {
        $query = "UPDATE Products SET PRODUCT_QUANTITY = ? WHERE ID = ?";
        $prepared = $this->db->prepare($query);
        // апдейтим количество продукта
        $prepared->bind_param("ii", $quantity, $id);
        $prepared->execute();
    }
}
