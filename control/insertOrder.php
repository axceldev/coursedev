<?php 
require_once("../db/conexion_db.php"); 
$productos = $_POST['productos'];
$clientes = $_POST['clientes'];
$iva = $_POST['iva'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];

$dato = $productos;
$clienteF = $clientes;
$identCliente = $clienteF['identificacion'];
$idClienteF;
$ivaFactura = $iva;
$subTotalFactura = $subtotal;
$totalFactura = $total;

class Ordenes {
    public $idFactura;
    public $idProducto; 
    public $cantidad;  
    public $precio;  
}

class Facturas {
    public $idFactura;
    public $idCliente;
    public $iva;
    public $subtotal;
    public $totalFactura;
}

class Clientes {
    public $idCliente;
    public $identificacion;
    public $nombre;
    public $correo;
    public $telefono;
}


//Validamos cliente
$cursor = $clients->find(array('identificacion' => $identCliente));
$numeroClientes = $cursor->count();
if ($numeroClientes > 0){
    $clienteDb = $clients->findOne(array('identificacion' => $identCliente));
    foreach ($clienteDb as $cln) {
        $idClienteF = (string) $cln['_id'];
    }
}else {
    $cliente = new Clientes();
    $cliente->identificacion = $clienteF['identificacion'];
    $cliente->nombre =  $clienteF['nombre'];
    $cliente->correo = $clienteF['correo'];
    $cliente->telefono = $clienteF['telefono'];
    $insertResult = $clients->insertOne($cliente);
    $idClienteF = $insertResult->getInsertedId();
}

//Ingresamos la factura
if ($idClienteF != null) {
    $factura = new Facturas();
    $factura->idCliente = $idClienteF;
    $factura->iva = $ivaFactura;
    $factura->subtotal = $subTotalFactura;
    $factura->totalFactura = $totalFactura;
    $insertResult = $bills->insertOne($factura);
    $idFactura = $insertResult->getInsertedId();
}

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