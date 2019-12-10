<?php

class AdminCategoryController extends AdminBase
{

    public function actionIndex()
    {

        self::checkAdmin();

        $categoriesList = Category::getCategoryList();

        require_once ROOT . '/views/admin_category/index.php';
        return true;

    }

    public function actionDelete($id)
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {
            Category::deleteCategoryByIds($id);

            header("Location: /admin/category");
        }

        require_once ROOT . '/views/admin_category/delete.php';
        return true;

    }

    public function actionCreate()
    {

        self::checkAdmin();

        if (isset($_POST['submit'])) {
            $newCategory = array();
            $newCategory['name'] = $_POST['name'];
            $newCategory['sort_order'] = $_POST['sort_order'];
            $newCategory['status'] = $_POST['status'];

            Category::addCategory($newCategory);

            header("Location: /admin/category");
        }

        require_once ROOT . '/views/admin_category/create.php';
        return true;

    }

    public function actionUpdate($id)
    {

        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            $newCategory = array();
            $newCategory['name'] = $_POST['name'];
            $newCategory['sort_order'] = $_POST['sort_order'];
            $newCategory['status'] = $_POST['status'];

            Category::updateCategory($id, $newCategory);

            header("Location: /admin/category");
        }

        require_once ROOT . '/views/admin_category/update.php';
        return true;

    }

}
