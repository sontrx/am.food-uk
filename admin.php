
<?php

require 'common/bootstrap.php';
use Classes\Models as Model;

session_start();


$action = @$_POST['action'] ? $_POST['action'] : null;
$tab = @$_GET['tab'] ? $_GET['tab'] : 'index';


if ( $action === 'login' ) {

	$userName = $_POST['userName'];
	$passW = $_POST['passW'];

	// find the user name on database
	$user = Model\User::find($userName);

	// check if the user exit and the password match 
	if ( $user and $passW === $user['password'] ) {

		// save the admin seassion
		$_SESSION['admin'] = $user; 


	}else{

		echo 'wrong password or username!';

	}
	

} 
else if ($action === 'logout') {

	unset($_SESSION["admin"]);
	echo 'admin';
	return ;

}
else if ($action === 'add_product'){

	$name = $_POST['productName'];
	$description = $_POST['productDescription'];
	$price = $_POST['productPrice'];

	if ($_FILES['productImage']['size']) {

	    $duoi = explode('.', $_FILES['productImage']['name']); 
	    $duoi = $duoi[(count($duoi) - 1)]; 

	    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
	        
	        if (!move_uploaded_file($_FILES['productImage']['tmp_name'], 'uploads/' . $_FILES['productImage']['name'])) {

	            // die('Upload thành công file: ' . $_FILES['productImage']['name']); 
	            die('Error!'); 
	        }
	    } else { 
	        die('Upload image only!'); 
	    }
	} else {
	    die('Please upload image!');
	}

	$image = 'uploads/' .$_FILES['productImage']['name'];
	Model\Product::Add($name, $image, $description, $price);
	$tab = 'products';

}
else if($action === 'edit_product') {

	$name = $_POST['productName'];
	$description = $_POST['productDescription'];
	$price = $_POST['productPrice'];
	$id = $_POST['productId'];
	$image = $_POST['oldImage'];

	if ($_FILES['productImage']['size']) {

	    $duoi = explode('.', $_FILES['productImage']['name']); 
	    $duoi = $duoi[(count($duoi) - 1)]; 


	    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
	        
	        if (move_uploaded_file($_FILES['productImage']['tmp_name'], 'uploads/' . $_FILES['productImage']['name'])) {

	            // die('Upload thành công file: ' . $_FILES['productImage']['name']); 
	            unlink($image);
            	$image = 'uploads/' .$_FILES['productImage']['name'];

	            
	        }else{

	        	die('Error!');

	        }
	    } else { 
	        die('Upload image only!'); 
	    }
	}

	Model\Product::Update($name, $image, $description, $price, $id);
	$tab = 'products';

}
else if($action === 'delete_product') {

	$productId = $_POST['productId'];
	$productImage= $_POST['productImage'];
	unlink($productImage);//delete the image from uploads folder.
	Model\product::delete($productId);
	return;
}


// Check if the user has login
if ( !isset($_SESSION['admin']) ) {

	// Not yet? return the login page
	echo view( getTheme(). "/controllers/admin/login");
	return;
} 

switch ($tab) {
 	case 'products':
 		
 		$products = Model\Product::findAll();
		echo view( getTheme(). "/controllers/admin/products", [
			'products' => $products,
			'user' => $_SESSION['admin']['name'],
		]);
 		break;

 	case 'product':
 		
 		$productId = $_GET['id'];
 		$product = Model\product::find($productId);
 		echo view( getTheme(). "/controllers/admin/product", [
			'user' => $_SESSION['admin']['name'],
			'product' => $product,
		]);
 		break;

 	case 'add_product':
 		
		echo view( getTheme(). "/controllers/admin/add_product", [
			'user' => $_SESSION['admin']['name'],
		]);
 		break;
 	
 	default:
 		// return the index page
		echo view( getTheme(). "/controllers/admin/index", [
			'user' => $_SESSION['admin']['name'],
		]);
 		break;
} 

	


