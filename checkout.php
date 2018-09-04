<?php

require 'common/bootstrap.php';
use Classes\Models as Model;

session_start();



$products = [];
$cartTotalPrice= 0;
$cartTotal= 0;
$shippingCost = 0;

if (isset($_SESSION['cart'])){

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

}

// the total price that we charge the buyer
$total= $cartTotalPrice + $shippingCost;

if($_POST){

	
	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_test_4eC39HqLyjWDarjtT1zdp7dc");

	// Token is created using Checkout or Elements!
	// Get the payment token ID submitted by the form:

	$token = $_POST['stripeToken'];

	// Create a Customer
	$customer = \Stripe\Customer::create([
	    'email' => $_POST['email'],
	    'source' => $token,
	]);

	// Charge the Customer 
	$charge = \Stripe\Charge::create([

	    'amount' => $total*100,
	    'currency' => 'gbp', 
        'description' => 'order onetime charge',
	    'customer' => $customer->id,
	]);


	// For subscription
	if ( isset($_POST['subscribe']) and $_POST['subscribe'] === 'subscribed'){

		// Create a product on by stripe API
		$product = \Stripe\Product::create([
		    'name' => 'BoomKitchen Recipe',
		    'type' => 'service',
		]);

		$plan = \Stripe\Plan::create([

		  'product' => $product->id,
		  'nickname' => "BoomKitchen Monthy Subscribe",
		  'interval' => 'month',
		  'currency' => 'gbp',
		  'amount' => $total*100,
		]);

		// Make subscription
		$subscription = \Stripe\Subscription::create([
		    'customer' => $customer->id,
		    'items' => [['plan' => $plan->id]],
		]);

		

	};

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

	Model\Order::Add($content,$total, $buyer, $email, $address, $postcode, $phone);

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

