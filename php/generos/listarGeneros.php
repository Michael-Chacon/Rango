<?php
require_once '../../database/database.php';

$listar = $conexion->prepare("SELECT * FROM genero");
$listar->execute();
$lista = $listar->fetchAll();
echo json_encode($lista);
