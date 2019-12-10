<?php

class AdminOrderController extends AdminBase
{

    public function actionIndex()
    {

        self::checkAdmin();

        $ordersList = Order::getOrderList();

        require_once ROOT . '/views/admin_order/index.php';
        return true;

    }

    public function actionDelete($id)
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Order::deleteOrderByIds($id);

            header("Location: /admin/order");
        }

        require_once ROOT . '/views/admin_order/delete.php';
        return true;

    }

    public function actionView($id)
    {

        self::checkAdmin();

        $order = Order::getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);

        // Подключаем вид
        require_once ROOT . '/views/admin_order/view.php';
        return true;

    }

    public function actionUpdate($id)
    {

        self::checkAdmin();

        $order = Order::getOrderById($id);

        if (isset($_POST['submit'])) {
            $updateOrder = array();

            $updateOrder['user_name'] = $_POST['user_name'];
            $updateOrder['user_phone'] = $_POST['user_phone'];
            $updateOrder['date'] = $_POST['date'];
            $updateOrder['status'] = $_POST['status'];
            $updateOrder['user_comment'] = $_POST['user_comment'];

            Order::updateOrder($id, $updateOrder);

            header("Location: /admin/order");
        }

        require_once ROOT . '/views/admin_order/update.php';
        return true;

    }

}
