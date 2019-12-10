<?php

class Category
{

    // public static function getNewsItemById($id)
    // {

    //     $id = intval($id);

    //     if ($id) {

    //         $db = Db::getConnection();

    //         $result = $db->query('SELECT * FROM news WHERE id=' . $id);

    //         $result->setFetchMode(PDO::FETCH_ASSOC);
    //         $newsList = $result->fetch();

    //         return $newsList;
    //     }

    // }

    public static function getCategoryList()
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM category ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $categoryList[$i]['name'] = $row['name'];

            $i++;
        }

        return $categoryList;
    }

    public static function getCategoryById($id)
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM category WHERE id=' . $id);
        $row = $result->fetch();
        $category['id'] = $row['id'];
        $category['sort_order'] = $row['sort_order'];
        $category['status'] = $row['status'];
        $category['name'] = $row['name'];

        return $category;
    }

    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    public static function deleteCategoryByIds($id)
    {

        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function addCategory($category)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO category (name, sort_order, status) '
            . 'VALUES (:name, :sort_order, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $category['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $category['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $category['status'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateCategory($id, $category)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE category
        SET
        name = :name,
        sort_order = :sort_order,
        status = :status
        WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $category['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $category['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $category['status'], PDO::PARAM_INT);

        return $result->execute();
    }
}
