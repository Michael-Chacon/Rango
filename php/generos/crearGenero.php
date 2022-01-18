<?php
require_once '../../database/database.php';
require_once '../validaciones.php';

if (isset($_POST)) {
    $genero = $_POST['genero'];
    $validacion = validarGenero($genero, $conexion);
    if ($validacion) {
        $guardar = $conexion->prepare("INSERT INTO genero VALUES(null, :gender)");
        $guardar->bindParam(':gender', $genero, PDO::PARAM_STR);
        if ($guardar->execute()) {
            echo 'ok';
        } else {
            echo "Error al intentar registrar en genero.";
        }
    } else {
        echo "El género ya está registrado en la base de datos.";
    }
}
