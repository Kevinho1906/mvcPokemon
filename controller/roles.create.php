<?php

include_once "../model/rol.php";

$rolM = new Modelo\Rol();
$rolM->setNombreRol($_POST["txtRol"]);
$result = $rolM->create();

echo json_encode($result);
unset($rolM);

?>