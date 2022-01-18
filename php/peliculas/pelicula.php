<?php
require '../../database/database.php';

$id_pelicula = $_POST['id_pelicula'];

$pelicula = $conexion->prepare("SELECT * FROM pelicula WHERE id_pelicula = :id");
$pelicula->bindParam(":id", $id_pelicula, PDO::PARAM_INT);
$pelicula->execute();
$peli = $pelicula->fetchAll(PDO::FETCH_ASSOC);

# listar los genero  a los que pertenece la peli 
$generos = $conexion->prepare("SELECT g.id_genero, g.nombre_g FROM genero g INNER JOIN peliculageneros pg ON g.id_genero = pg.genero_id_p WHERE pg.pelicula_id_g  =  :id_peliculaG");
$generos->bindParam(":id_peliculaG", $id_pelicula, PDO::PARAM_INT);
$generos->execute();
$generosP = $generos->fetchAll(PDO::FETCH_ASSOC);

# listar a los actores que participan en la pelicula
$actores = $conexion->prepare("SELECT a.id_actor, a.nombre_a FROM actor a  INNER JOIN peliculaactores pa ON a.id_actor = pa.actor_id_p WHERE pa.pelicula_id_a  = :id_peliculaA");
$actores->bindParam(":id_peliculaA", $id_pelicula, PDO::PARAM_INT);
$actores->execute();
$actoresP = $actores->fetchAll(PDO::FETCH_ASSOC);
	
$datos_peli = array($peli, $generosP, $actoresP);
// var_dump($datos_peli);
echo json_encode($datos_peli);
