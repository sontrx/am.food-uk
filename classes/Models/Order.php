<?php

namespace Classes\Models;

// require __DIR__.'/../common/boostrap.php';
// require __DIR__.'/../common/functions.php';
// var_dump(containerGet('database'));


class Order extends Model {
    
    /**
    * Find all orders 
    *
    * @return mixed
    */
    public static function findAll()
    {
    	$orders = containerGet('database')->fetchAll('SELECT * FROM orders');
    	return $orders;

    } 

    /**
    * Find a order by id
    *
    * @return mixed
    */
    public static function find($id)
    {
    	$order = containerGet('database')->fetchAssoc('SELECT * FROM orders WHERE id = ?', array($id));
    	return $order;
    }

    /**
    * Add a order to database
    *
    * @param $name , $image, $desciption, $price
    */
    public static function Add($content, $total, $buyer, $email, $address, $zipcode, $phone)
    {
        $created_at = date('Y-m-d H:i:s');
        containerGet('database')->insert('orders', array('content'=>$content, 'total'=>$total, 'buyer'=>$buyer, 'email' => $email, 'address'=>$address, 'zipcode'=>$zipcode, 'phone'=>$phone, 'created_at'=>$created_at));
        
    }

    

    /**
    * Remove a order from database
    *
    * @param $orderId
    */
    public static function Delete($orderId)
    {
        containerGet('database')->delete('orders', array('id' => $orderId));
    }
}	

