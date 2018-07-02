<?php

require 'common/bootstrap.php';

use Classes\Models as Model;

$action = @$_GET['action'] ? $_GET['action'] : 'home';

// Action home
// Show home content
if ($action === 'home') {

    $products = Model\product::findAll();
    echo view(getTheme().'.controllers.index.home', [
        'products' => $products,
    ]);

} 

// Action test
// Just for fun

elseif ($action === 'action-test') {

	$products = Model\product::findAll();
	// var_dump($products[1]);
    echo view(getTheme().'.controllers.index.action-test', [
        'pageTitle' => 'This is action test',
        'products' => $products,
    ]);

}