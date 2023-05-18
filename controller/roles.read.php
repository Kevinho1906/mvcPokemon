<?php

include_once "../model/rol.php";

$rolM = new Modelo\ROL();
$result = $rolM->read();

echo json_encode($result);
unset($rolM);
unset($result);