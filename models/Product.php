<?php

class Product
{

    const SHOW_BY_DEFAULT = 3;

    public static function getProductsListByCategory($category_id = false, $page = 1)
    {

        $id = intval($category_id);
        $id = intval($page);

        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        if ($category_id) {

            $db = Db::getConnection();

            // $result = $db->query('SELECT id, is_new, price, description, name FROM product WHERE category_id=' . $category_id);

            $result = $db->query('SELECT id, is_new, price, description, name FROM product WHERE category_id=' . $category_id . ' LIMIT ' . self::SHOW_BY_DEFAULT . ' OFFSET ' . $offset);

            // .' OFFSET ' . $offset
            $i = 0;
            while ($row = $result->fetch()) {

                $productCategory[$i]['id'] = $row['id'];
                $productCategory[$i]['price'] = $row['price'];
                $productCategory[$i]['description'] = $row['description'];
                $productCategory[$i]['name'] = $row['name'];
                $productCategory[$i]['is_new'] = $row['is_new'];

                $i++;
            }

            return $productCategory;

        }

    }

    public static function getProductList()
    {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, is_new, price, code, description, name FROM product');

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['code'] = $row['code'];

            $i++;
        }

        return $productList;
    }

    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }

    public static function getProductsByIds($idsArray)
    {

        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

        $result = $db->query($sql);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];

            $i++;
        }

        return $products;
    }

    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1" AND category_id ="' . $categoryId . '"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getRecommendProducts()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, is_new, price, description, name FROM product WHERE is_recommended=1 LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['is_new'] = $row['is_new'];

            $i++;
        }

        return $productList;
    }

    public static function deleteProductsByIds($id)
    {

        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function addProduct($product)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product (name, code, price, category_id, brand, description, availability, is_new, is_recommended, status) '
            . 'VALUES (:name, :code, :price, :category_id, :brand, :description, :availability, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $product['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $product['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $product['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $product['brand'], PDO::PARAM_STR);
        // $result->bindParam(':email', email, PDO::PARAM_STR);
        $result->bindParam(':description', $product['description'], PDO::PARAM_STR);
        $result->bindParam(':availability', $product['availability'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $product['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $product['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $product['status'], PDO::PARAM_INT);

        return $result->execute();

    }

    public static function updateProduct($id, $product)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE product
         SET
         name = :name,
         code = :code,
         price = :price,
         category_id = :category_id,
         brand = :brand,
         description = :description,
         availability = :availability,
         is_new = :is_new,
         is_recommended = :is_recommended,
         status = :status
         WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $product['code'], PDO::PARAM_INT);
        $result->bindParam(':price', $product['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $product['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $product['brand'], PDO::PARAM_STR);
        // $result->bindParam(':email', email, PDO::PARAM_STR);
        $result->bindParam(':description', $product['description'], PDO::PARAM_STR);
        $result->bindParam(':availability', $product['availability'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $product['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $product['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $product['status'], PDO::PARAM_INT);

        return $result->execute();

    }
}
