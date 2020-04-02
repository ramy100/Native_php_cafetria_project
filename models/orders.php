<?php
class Order
{
    public static function insert($post)
    {
        require 'database.php';
        session_start();
        $sql = "INSERT INTO orders(user_id, notes) VALUES ('{$_SESSION["id"]}','{$post["notes"]}')";
        echo ($sql);
        $mysqli->query($sql);
        $newOrderId = $mysqli->insert_id;
        foreach ($post as $id => $quantity) {

            $sql = "INSERT INTO `order_products`(`order_id`, `product_id`, `quantity`) VALUES ({$newOrderId},{$id},{$quantity})";
            $mysqli->query($sql);
        }
    }
}
