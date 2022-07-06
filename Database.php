<?php

namespace app;

use app\models\Product;

class Database
{
    private $_connection = null;
    private static $_instance;

    const _DB_HOST = '127.0.0.1:3310';
    const _DB_USER = 'root';
    const _DB_PASS = '';
    const _DB_NAME = 'php_crud';

    public static function getInstance() 
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        
        return self::$_instance;
    }

    public function getConnection()
    {
        $this->_connection = mysqli_connect(self::_DB_HOST, self::_DB_USER, self::_DB_PASS, self::_DB_NAME);

        return $this->_connection;
    }

    public function getProducts()
    {
        $result = self::getInstance()->getConnection()->query("SELECT * FROM products");
        $rows = array();

        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function createProduct(Product $product)
    {
        $sql = 'INSERT INTO products (title, description, price) VALUES ("' . $product->title . '", "' . $product->description . '", ' . $product->price . ')';
        
        self::getInstance()->getConnection()->query($sql);
    }

    public function updateProduct(Product $product)
    {
        $sql = "UPDATE products SET title = '" . $product->title ."', description = '" . $product->description . "', price = " . $product->price . " WHERE id = " . $product->id . "";

        self::getInstance()->getConnection()->query($sql);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";
        return self::getInstance()->getConnection()->query($sql);
    }

    public function getProductById($id)
    {
        $result = self::getInstance()->getConnection()->query("SELECT * FROM products WHERE id = $id");

        return mysqli_fetch_assoc($result);
    }
}