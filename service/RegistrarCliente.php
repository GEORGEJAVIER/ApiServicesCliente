<?php

require_once '../dao/ClienteDao.php';

// Parámetros
$paterno = $_REQUEST["paterno"];
$materno= $_REQUEST["materno"];
$nombre=$_REQUEST["nombre"];
$dni=$_REQUEST["dni"];
$ciudad=$_REQUEST["ciudad"];
$direccion=$_REQUEST["direccion"];
$telefono=$_REQUEST["telefono"];
$email=$_REQUEST["email"];

// Proceso
$dao = new ClienteDao();
$rec = $dao->RegistrarCliente($paterno,$materno,$nombre,$dni,$ciudad,$direccion,$telefono,$email);

if ($rec) {
    $rec["estado"] = 1; // Existe
} else {
    $rec["estado"] = 0; // No existe
}
$data = json_encode($rec);
// Retorno
echo $data;
?>