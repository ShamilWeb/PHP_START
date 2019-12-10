<?php

// include_once ROOT . '/models/Product.php';
// include_once ROOT . '/models/Category.php';

class SiteController
{

    public function actionIndex()
    {
        $productList = array();
        $productList = Product::getProductList();

        $recommendProducts = array();
        $recommendProducts = Product::getRecommendProducts();

        $categoryList = array();
        $categoryList = Category::getCategoryList();

        require_once ROOT . '/views/site/index.php';

        return true;

    }

}
