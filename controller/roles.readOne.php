<?php

include_once '../model/rol.php';

$id = $_POST["id"];

$rolM = new Modelo\Rol();
$result = $rolM->readOne($id);

echo json_encode($result);
unset($rolM);