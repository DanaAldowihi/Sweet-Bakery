<?php
if(isset($_REQUEST['add_to_cart'])){
	session_start();

	$cartList = array();
	if(isset($_SESSION['cartList']) && $_SESSION['cartList'] != ''){
		$cartList = $_SESSION['cartList'];
		$key = array_search($_REQUEST['add_to_cart'], array_column($cartList, 'product_id'));
	}

	$add_to_cart = array("product_id" => $_REQUEST['add_to_cart'], "product_name" => $_REQUEST['product_name'], "product_picture" => $_REQUEST['product_picture'], "product_price" => $_REQUEST['product_price'], "quantity" => $_REQUEST['quantity']);

	if(sizeOf($cartList) > 0 && $cartList[$key]['product_id'] == $_REQUEST['add_to_cart']){
		$cartList[$key]['product_id'] = $_REQUEST['add_to_cart'];
		$cartList[$key]['product_name'] = $_REQUEST['product_name'];
		$cartList[$key]['product_picture'] = $_REQUEST['product_picture'];
		$cartList[$key]['product_price'] = $_REQUEST['product_price'];
		$q = ((int) $cartList[$key]['quantity']) + 1;
		$cartList[$key]['quantity'] = $q;
	}else{
		array_push($cartList, $add_to_cart);
	}
	$_SESSION['cartList'] = $cartList;
	$output['total'] = sizeof($_SESSION['cartList']);
	echo json_encode($output);

}

if(isset($_REQUEST['get_list'])){
	session_start();
	$output['list'] = $_SESSION['cartList'];
	$output['total'] = sizeof($_SESSION['cartList']);
	echo json_encode($output);
}

if(isset($_REQUEST['change_q'])){
	session_start(); 
	if(isset($_SESSION['cartList']) && $_SESSION['cartList'] != ''){
		$cartList = $_SESSION['cartList'];
		$key = array_search($_REQUEST['add_to_cart'], array_column($cartList, 'product_id'));
		$q = $_REQUEST['change_q'];
		$cartList[$key]['quantity'] = $q;
		$_SESSION['cartList'] = $cartList;
	}
}

if(isset($_REQUEST['remove'])){
	session_start(); 
	if(isset($_SESSION['cartList']) && $_SESSION['cartList'] != ''){
		$cartList = $_SESSION['cartList'];
		$key = array_search($_REQUEST['remove'], array_column($cartList, 'product_id'));
		unset($cartList[$key]);
		$_SESSION['cartList'] = $cartList;
	}
}

// if(isset($_REQUEST['remove_all'])){
// 	session_start(); 
// 	session_unset(); 
// 	session_destroy(); 
// }
?>