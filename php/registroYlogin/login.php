<?php
require_once '../../database/database.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$validacion = $conexion->prepare("SELECT * FROM usuario WHERE usuario = :user");
$validacion->bindParam(":user", $user, PDO::PARAM_STR);
$validacion->execute();
if ($validacion->rowCount() == 1) {
    $informacion = $validacion->fetchObject();
    print_r($informacion);
    $resultado = password_verify($pass, $informacion->password);
    print_r($resultado);
    exit;
    if ($resultado) {
        echo 'ok';
        $_SESSION['cinefil@'] = $informacion;
    } else {
        echo "La contraseña es incorrecto.";
    }
} else {
    echo "El usuario es incorrecto.";
}
