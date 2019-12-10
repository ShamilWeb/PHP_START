<?php

class Order
{

    /**
     * Сохранение заказа
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $products = json_encode($products);

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_INT);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getOrderList()
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM product_order ORDER BY date ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['user_name'] = $row['user_name'];
            $orderList[$i]['user_phone'] = $row['user_phone'];
            $orderList[$i]['date'] = $row['date'];
            $orderList[$i]['status'] = $row['status'];

            $i++;
        }

        return $orderList;
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    public static function getOrderById($id)
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM product_order WHERE id = ' . $id);

        return $result->fetch();
    }

    public static function updateOrder($id, $order)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE product_order
        SET
        user_name = :user_name,
        user_phone = :user_phone,
        date = :date,
        status = :status,
        user_comment = :user_comment
        WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $order['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $order['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':date', $order['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $order['status'], PDO::PARAM_INT);
        $result->bindParam(':user_comment', $order['user_comment'], PDO::PARAM_STR);

        return $result->execute();
    }

    public static function deleteOrderByIds($id)
    {

        $db = Db::getConnection();

        $sql = 'DELETE FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

}
