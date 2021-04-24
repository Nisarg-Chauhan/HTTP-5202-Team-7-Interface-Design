<?php

class Order
{

    public function addOrder($productCode, $productName, $productDesc, $productImg, $quantity, $total, $email, $db)
    {
        $sql = "INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) 
            VALUES (:productCode, :productName,:productDesc, :productImg, :quantity, :total, :email )";
        $statement = $db->prepare($sql);

        $statement->bindParam(':productCode', $productCode);
        $statement->bindParam(':productName', $productName);
        $statement->bindParam(':productDesc', $productDesc);
        $statement->bindParam(':productDesc', $productDesc);
        $statement->bindParam(':productImg', $productImg);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':total', $total);
        $statement->bindParam(':email', $email);


        $count = $statement->execute();
        return $count;
    }
}
