<?php 
require_once("../db/conexion_db.php"); 
$productos = $_POST['productos'];
$clientes = $_POST['clientes'];
$iva = $_POST['iva'];
$subtotal = $_POST['subtotal'];
$total = $_POST['total'];

$productoF = $productos;
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
    public $idCliente;
    public $iva;
    public $subtotal;
    public $totalFactura;
}

class Clientes {
    public $identificacion;
    public $nombre;
    public $correo;
    public $telefono;
}


//Validamos cliente
$numeroClientes = $clients->count(array('identificacion'=> $identCliente));
if ($numeroClientes > 0){
    $clienteDb = $clients->findOne(array('identificacion' => $identCliente));
    foreach($clienteDb as $key => $value) {
        if ($key == '_id') { 
            $idClienteF = $value;
        }
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
    $orden->idProducto =  (string) $productoF['id'];
    $orden->cantidad = $productoF['cantidad'];
    $orden->precio = $productoF['precio'];
    $insertResult = $orders->insertOne($orden);
}

?>