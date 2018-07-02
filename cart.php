

<?php


if ( !isset($_SESSION) ) {

	session_start();

}



if ( $_POST['action'] == 'push') {

	$_SESSION['cart'] = json_decode($_POST['cart']);

	echo json_encode($_SESSION['cart']);
}


if ( $_POST['action'] == 'pull') {

	if( $_SESSION['cart']) {

		$cart = $_SESSION['cart'];

	} else {

		$cart = null;
	}

	echo json_encode($cart);
}







