<?php

require 'common/bootstrap.php';
use Classes\Models as Model;

$action = @$_GET['action'] ? $_GET['action'] : 'product';
$id = @$_GET['id'] ? $_GET['id'] : 0;

$view = containerGet('view');

if ($action === 'home') {

	echo view(getTheme().'.controllers.index.home', [
        'pageTitle' => 'This is index controller - action home'
    ]);
}


elseif ( $action === 'product' ) {

	$product = Model\product::find($id);
	echo view( getTheme().'.controllers.index.product', [
		'pageTitle' => 'This is index controller - action product',
		'product' => $product,
	]);
}
