<?php 
require_once("../db/conexion_db.php"); 
$product = $_POST['producto'];

$jsonProduct = json_decode($product, true);
print_r($jsonProduct);
$insertOneResult = $orders->insertOne($jsonProduct);

?>