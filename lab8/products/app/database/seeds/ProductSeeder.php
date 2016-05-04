<?php

class ProductSeeder extends Seeder {
    function run() {
        $product = new Product;
        $product->name = 'Burger';
        $product->price = 5.00;
        $product->save(); 
        
        $product = new Product;
        $product->name = 'Milkshake';
        $product->price = 4.00;
        $product->save();         
    }
}