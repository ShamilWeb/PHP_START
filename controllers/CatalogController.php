<?php

class CatalogController
{

    public function actionIndex()
    {
        $productList = array();
        $productList = Product::getProductList();

        $categoryList = array();
        $categoryList = Category::getCategoryList();

        require_once ROOT . '/views/catalog/index.php';

        return true;

    }

    public function actionCategory($categoryId, $page = 1)
    {
        $productCategory = array();
        $productCategory = Product::getProductsListByCategory($categoryId, $page);

        $categoryList = array();
        $categoryList = Category::getCategoryList();

        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT . '/views/catalog/category.php';

        return true;

    }

}
