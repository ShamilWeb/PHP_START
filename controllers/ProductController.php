<?php

// include_once ROOT . '/models/Product.php';
// include_once ROOT . '/models/Category.php';

class ProductController {
    
    public function actionView($id) {
        $productItem = array();
        $productItem = Product::getProductById($id);

        $categoryList = array();
        $categoryList = Category::getCategoryList();

        require_once ROOT . '/views/product/view.php';

        return true;
    }
}