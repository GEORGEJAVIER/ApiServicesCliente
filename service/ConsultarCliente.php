<?php

require_once '../dao/ClienteDao.php';

// Parámetros
$dni = $_REQUEST["dni"];

// Proceso
$dao = new ClienteDao();
$fila = $dao->consultarCliene($dni);

if ($fila) {
    $fila["estado"] = 1; // Existe
} else {
    $fila["estado"] = 0; // No existe
}
$data = json_encode($fila);

// Retorno
echo $data;

?>