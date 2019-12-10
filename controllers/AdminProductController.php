<?php

class AdminProductController extends AdminBase
{

    public function actionIndex()
    {

        self::checkAdmin();

        $productsList = Product::getProductList();

        require_once ROOT . '/views/admin_product/index.php';
        return true;

    }

    public function actionDelete($id)
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Product::deleteProductsByIds($id);

            header("Location: /admin/product");
        }

        require_once ROOT . '/views/admin_product/delete.php';
        return true;

    }

    public function actionCreate()
    {

        self::checkAdmin();

        $categoriesList = Category::getCategoryList();

        if (isset($_POST['submit'])) {
            $newProduct = array();
            $newProduct['name'] = $_POST['name'];
            $newProduct['code'] = $_POST['code'];
            $newProduct['price'] = $_POST['price'];
            $newProduct['category_id'] = $_POST['category_id'];
            $newProduct['brand'] = $_POST['brand'];
            // $newProduct[''] = $_POST[''];
            $newProduct['description'] = $_POST['description'];
            $newProduct['availability'] = $_POST['availability'];
            $newProduct['is_new'] = $_POST['is_new'];
            $newProduct['is_recommended'] = $_POST['is_recommended'];
            $newProduct['status'] = $_POST['status'];

            Product::addProduct($newProduct);
            header("Location: /admin/product");
        }

        require_once ROOT . '/views/admin_product/create.php';
        return true;

    }

    public function actionUpdate($id)
    {

        self::checkAdmin();

        $product = Product::getProductById($id);

        $categoriesList = Category::getCategoryList();

        if (isset($_POST['submit'])) {
            $newProduct = array();
            $newProduct['name'] = $_POST['name'];
            $newProduct['code'] = $_POST['code'];
            $newProduct['price'] = $_POST['price'];
            $newProduct['category_id'] = $_POST['category_id'];
            $newProduct['brand'] = $_POST['brand'];
            // $newProduct[''] = $_POST[''];
            $newProduct['description'] = $_POST['description'];
            $newProduct['availability'] = $_POST['availability'];
            $newProduct['is_new'] = $_POST['is_new'];
            $newProduct['is_recommended'] = $_POST['is_recommended'];
            $newProduct['status'] = $_POST['status'];

            Product::updateProduct($id, $newProduct);
            header("Location: /admin/product");
        }

        require_once ROOT . '/views/admin_product/update.php';
        return true;

    }

}
