<?php
session_start();
include_once("php/connect.php");
setlocale(LC_MONETARY,"pt_PT");
if(isset($_GET['limpar'])){
	unset($_SESSION['products']);
}
if(isset($_GET["N_serie"])) {
	foreach($_GET as $key => $value){
		$product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
	}	
	$statement = $con->prepare("SELECT N_serie,Modelo,Preco FROM produtos WHERE N_serie=? LIMIT 1");
	$statement->bind_param('s', $product['N_serie']);
	$statement->execute();
	$statement->bind_result($N_serie,$Modelo,$Preco);
	while($statement->fetch()){ 
		$product["product_n_serie"] = $N_serie;
		$product["product_model"] = $Modelo;		
		$product["product_price"] = $Preco;		
		if(isset($_SESSION["products"])){ 
			if(isset($_SESSION["products"][$product['N_serie']])) {				
				$_SESSION["products"][$product['N_serie']]["product_qty"] = $_SESSION["products"][$product['N_serie']]["product_qty"] + $_GET["product_qty"];				
			} else {
				$_SESSION["products"][$product['N_serie']] = $product;
			}			
		} else {
			$_SESSION["products"][$product['N_serie']] = $product;
		}	
	}
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
if(isset($_GET["remove_code"])) {
	$N_serie  = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);
	if(isset($_SESSION["products"][$N_serie]))	{
		unset($_SESSION["products"][$N_serie]);
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
if(isset($_GET["update_quantity"]) && isset($_SESSION["products"])) {	
	if(isset($_GET["quantity"]) && $_GET["quantity"]>0) {		
		$_SESSION["products"][$_GET["update_quantity"]]["product_qty"] = $_GET["quantity"];	
	}
	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}	
?>