<?php
require '../../database/database.php';

$id_pelicula = $_POST['id_pelicula'];

$pelicula = $conexion->prepare("SELECT * FROM pelicula WHERE id_pelicula = :id");
$pelicula->bindParam(":id", $id_pelicula, PDO::PARAM_INT);
$pelicula->execute();
$datos = $pelicula->fetchAll();
// echo $datos[0]->nombre_p;
// echo "<br>";
// $pelis = $pelicula->fetchObject();
// // var_dump($pelis->nombre_p);
// $datos = array(
//     'nombre' => $pelis->nombre_p,
//     'año' => $pelis->año,
// );
// // var_dump($datos);
echo json_encode($datos);
