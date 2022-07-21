<?php

namespace DesignPattern\Prototype;

class Product {
    public $name;

}

class Prototype {
    public function run()
    {
        $product = new Product;
        // creation logic 10, 20
        $product->name = 'Product 1';

        $product2 = clone $product;
        $product2->name = 'Product 2';

        echo $product->name; // Product 1
        echo $product2->name; // Product 2
    }
}

