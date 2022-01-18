<?php
require_once '../../database/database.php';

$actores = $conexion->prepare("SELECT * FROM actor");
$actores->execute();
$listado = $actores->fetchAll();
echo json_encode($listado);
