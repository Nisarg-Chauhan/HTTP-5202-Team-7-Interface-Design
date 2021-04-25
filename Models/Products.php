<?php

class Product
{

    public function getProductById($id, $db)
    {

        $sql = "SELECT * FROM products WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function getAllProducts($db)
    {

        $sql = "SELECT* FROM products";
        $statement = $db->prepare($sql);
        $statement->execute();
        $allProducts = $statement->fetchAll(PDO::FETCH_OBJ);
        return $allProducts;
    }

    public function addProduct($productCode, $productName, $productDesc, $productImg, $quantity, $price, $db)
    {
        $sql = "INSERT INTO products (product_code ,product_name,product_desc, product_img_name, qty, price) 
            VALUES (:productCode, :productName,:productDesc, :productImg, :quantity, :price )";
        $statement = $db->prepare($sql);

        $statement->bindParam(':productCode', $productCode);
        $statement->bindParam(':productName', $productName);
        $statement->bindParam(':productDesc', $productDesc);
        $statement->bindParam(':productDesc', $productDesc);
        $statement->bindParam(':productImg', $productImg);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':price', $price);

        $count = $statement->execute();
        return $count;
    }

    public function deleteProduct($id, $db)
    {

        $sql = "DELETE FROM products WHERE id = :id";

        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $count = $statement->execute();
        return $count;
    }

    public function updateProduct($id, $productCode, $productName, $productDesc, $productImg, $quantity, $price, $db)
    {

        $sql = "UPDATE products
            SET product_code = :productCode,
            product_name = :productName,
            product_desc = :productDesc,
            product_img_name = :productImg ,
            qty = :quantity,
            price =:price ,
            WHERE id = :id";

        $statement =  $db->prepare($sql);

        $statement->bindParam(':productCode', $productCode);
        $statement->bindParam(':productName', $productName);
        $statement->bindParam(':productDesc', $productDesc);
        $statement->bindParam(':productDesc', $productDesc);
        $statement->bindParam(':productImg', $productImg);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':id', $id);

        $count = $statement->execute();

        return $count;
    }

    public function updateQuantity($id,  $quantity,  $db)
    {

        $sql = "UPDATE products
            SET qty = :quantity WHERE id = :id";

        $statement =  $db->prepare($sql);

        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':id', $id);

        $count = $statement->execute();

        return $count;
    }
}
