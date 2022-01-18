<?php
require '../../database/database.php';

$pelicula = $conexion->prepare("SELECT id_pelicula, img, nombre_p, año, calificacion  FROM pelicula");
$pelicula->execute();
$datos = $pelicula->fetchAll();
echo json_encode($datos);
