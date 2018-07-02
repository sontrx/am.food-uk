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
}	