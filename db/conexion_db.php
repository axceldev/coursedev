<?php
	
	require_once __DIR__ . '/vendor/autoload.php';
    $productos = (new MongoDB\Client)->coursedev->products; 
    $orders = (new MongoDB\Client)->coursedev->orders; 
    $bills = (new MongoDB\Client)->coursedev->bills; 	
?>