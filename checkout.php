<?php

require 'common/bootstrap.php';
use Classes\Models as Model;

session_start();



$products = [];
$cartTotalPrice= 0;
$cartTotal= 0;
$shippingCost = 0;


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

if($_POST){

	
	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:
	$token = $_POST['stripeToken'];

	$charge = \Stripe\Charge::create([

	    'amount' => $total*100,
	    'currency' => 'gbp', 
	    'description' => 'Example charge',
	    'source' => $token,
	]);

	// Insert order to database
	$genderSelect = $_POST['genderSelect'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$postcode = $_POST['postCode'];

	$content= '';
	foreach ($products as $product) {
    	$content_product = $product['id']."-".$product['name']."x".$product['total'];
    	$content = $content."|".$content_product;
    }
	$buyer= $genderSelect.' '.$firstName.' '.$lastName;

	Model\Order::Add($content, $buyer, $email, $address, $postcode, $phone);

	unset($_SESSION['cart']);

	// return the success-payment view
	echo view(getTheme(). "/controllers/checkout/success", [
		'products' => $products,
		'cartTotal' => $cartTotal,
		'cartTotalPrice' => $cartTotalPrice,
		'shippingCost' => $shippingCost,
		'total' => $total,
	]);

	

	return;
}

echo view(getTheme(). "/controllers/checkout/index", [
	'products' => $products,
	'cartTotal' => $cartTotal,
	'cartTotalPrice' => $cartTotalPrice,
	'shippingCost' => $shippingCost,
	'total' => $total,
]);

