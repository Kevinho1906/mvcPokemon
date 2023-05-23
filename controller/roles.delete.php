<?php

include_once "../model/rol.php";

$id = $_POST["id"];
$nombreRol = $_POST["nombreRol"];

$rolM = new Modelo\Rol();
$rolM->setId($id);
$response = $rolM->update();
echo json_encode($response);

unset($rolM);
unset($response);