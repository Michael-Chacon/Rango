<?php
require_once '../../database/database.php';
require '../validaciones.php';

if (isset($_POST)) {
    $nombre = $_POST['nombreA'];
    $validacion = valiadarActor($nombre, $conexion);
    if ($validacion) {
        $registrar = $conexion->prepare("INSERT INTO actor VALUES(null, :nombre)");
        $registrar->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        if ($registrar->execute()) {
            echo 'ok';
        } else {
            echo "Error al intentar registrar el actor.";
        }
    } else {
        echo "El actor ya está registrado en la base de datos.";
    }
}
