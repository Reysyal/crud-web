<?php

namespace app\models;

use app\Database;

class Product
{
    public ?int $id = null;
    public string $title;
    public string $description;
    public int $price;

    public function load($product)
    {
        $this->id = $product['id'] ?? null;
        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->price = $product['price'];
    }

    public function save()
    {
        $db = new Database();
        if ($this->id) {
            $db->updateProduct($this);
        } else {
            $db->createProduct($this);
        }
    }
}