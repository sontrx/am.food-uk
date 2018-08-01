<?php

require 'common/bootstrap.php';
use Classes\Models as Model;

session_start();

$products = [];
$cartTotalPrice= 0;
$cartTotal= 0;
$shippingCost = 15;


foreach ($_SESSION['cart']->products as $productOnCart) {
	# code...
	$productArray = [];
	$product = Model\product::find($productOnCart->productId);

	$productArray['name'] = $product['name'];
	$productArray['id'] = $product['id'];
	$productArray['total'] = $productOnCart->total;
	$productArray['price'] = $product['price'];
	$productArray['image'] = $product['image'];
	array_push($products, $productArray);

	$cartTotalPrice = $cartTotalPrice + $productArray['price']*$productArray['total'];
	$cartTotal = $cartTotal + $productArray['total'];


}

$total= $cartTotalPrice + $shippingCost;

echo view(getTheme(). "/controllers/checkout/index", [
	'products' => $products,
	'cartTotal' => $cartTotal,
	'cartTotalPrice' => $cartTotalPrice,
	'shippingCost' => $shippingCost,
	'total' => $total,
]);

