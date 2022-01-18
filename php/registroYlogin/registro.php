<?php
require_once '../../database/database.php';
require_once '../validaciones.php';

if (isset($_POST)) {
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $mail = $_POST['mail'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $password_encrypted = password_hash($pass, PASSWORD_BCRYPT, ['const' => 15]);
    $nombreV = validarNombre($user, $conexion);
    $correoV = validarCorreo($mail, $conexion);

    if ($nombreV) {
        if ($correoV) {
            $insert = $conexion->prepare("INSERT INTO usuario VALUES(null, :user, :pass, :gender, :mail, :age);");
            $insert->bindParam(":user", $user, PDO::PARAM_STR);
            $insert->bindParam(":pass", $password_encrypted, PDO::PARAM_STR);
            $insert->bindParam(":gender", $gender, PDO::PARAM_STR);
            $insert->bindParam(":mail", $mail, PDO::PARAM_STR);
            $insert->bindParam("age", $age, PDO::PARAM_INT);
            if ($insert->execute()) {
                echo "ok";
            } else {
                echo "Error! intentelo de nuevo";
            }
        } else {
            echo "El correo ya está registrado, intente con otro.";
        }
    } else {
        echo "El nombre de usuario ya está registrado, intente con otro nombre.";
    }

} #post
