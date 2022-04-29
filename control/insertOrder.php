<?php 
require_once("../db/conexion_db.php"); 
$productos = $_POST['productos'];
$total = $_POST['total'];

$dato = $productos;
$totalFactura = $total;

class Ordenes {
    public $idFactura;
    public $idProducto; 
    public $cantidad;  
    public $precio;  
}

class Facturas {
    public $idFactura;
    public $totalFactura;
    
    public function Facturas(int $totalFactura) {
        $this->totalFactura = $totalFactura;
    }
}
//Ingresamos la factura
$factura = new Facturas($totalFactura);
$insertResult = $bills->insertOne($factura);
$idFactura = $insertResult->getInsertedId();

//Ingresamos los productos de la facturas
if($idFactura != null){
    $orden = new Ordenes;
    $orden->idFactura = (string) $idFactura;
    $orden->idProducto =  (string) $dato['id'];
    $orden->cantidad = $dato['cantidad'];
    $orden->precio = $dato['precio'];
    $insertResult = $orders->insertOne($orden);
}
?>