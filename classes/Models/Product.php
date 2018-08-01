<?php

namespace Classes\Models;

// require __DIR__.'/../common/boostrap.php';
// require __DIR__.'/../common/functions.php';
// var_dump(containerGet('database'));


class Product extends Model {
    
    /**
    * Find all products 
    *
    * @return mixed
    */
    public static function findAll()
    {
    	$products = containerGet('database')->fetchAll('SELECT * FROM products');
    	return $products;

    } 

    /**
    * Find a product by id
    *
    * @return mixed
    */
    public static function find($id)
    {
    	$product = containerGet('database')->fetchAssoc('SELECT * FROM products WHERE id = ?', array($id));
    	return $product;
    }

    /**
    * Add a product to database
    *
    * @param $name , $image, $desciption, $price
    */
    public static function Add($name, $image, $description, $price)
    {
        containerGet('database')->insert('products', array('name'=>$name, 'image'=>$image, 'description' => $description, 'price'=>$price));
        
    }

    /**
    * Update a product on database
    *
    * @param $name , $image, $desciption, $price, $id
    */
    public static function Update($name, $image, $description, $price, $id)
    {
        
        containerGet('database')->update('products', array('name'=>$name, 'image'=>$image, 'description' => $description, 'price'=>$price), array('id'=> $id));
    }

    /**
    * Remove a product from database
    *
    * @param $productId
    */
    public static function Delete($productId)
    {
        containerGet('database')->delete('products', array('id' => $productId));
    }
}	

