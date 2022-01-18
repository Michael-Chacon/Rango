<?php
function EvitarDatosDuplicados($parametro, $db, $tabla, $campo)
{
    $validar = $db->prepare("SELECT * FROM $tabla WHERE $campo = :dato;");
    $validar->bindParam(":dato", $parametro, PDO::PARAM_STR);
    $validar->execute();
    if ($validar->rowCount() > 0) {
        return false;
    } else {
        return true;
    }
}

function validarNombre($nombre, $db)
{
    try {

        $validar = $db->prepare("SELECT * FROM usuario WHERE usuariO = :user;");
        $validar->bindParam(":user", $nombre, PDO::PARAM_STR);
        $validar->execute();
        if ($validar->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

function validarCorreo($correo, $db)
{
    try {

        $validar = $db->prepare("SELECT * FROM usuario WHERE correo = :mail;");
        $validar->bindParam(":mail", $correo, PDO::PARAM_STR);
        $validar->execute();
        if ($validar->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}

# validar que el genero no se repita
function validarGenero($genero, $db)
{
    $validar = $db->prepare("SELECT * FROM genero WHERE nombre_g = :nombre");
    $validar->bindParam(":nombre", $genero, PDO::PARAM_STR);
    $validar->execute();
    if ($validar->rowCount() > 0) {
        return false;
    } else {
        return true;
    }
}

# validar que un actor no sea registrado dos veces

function valiadarActor($nombre, $db)
{
    $validar = $db->prepare("SELECT * FROM actor WHERE nombre_a = :name");
    $validar->bindParam(":name", $nombre, PDO::PARAM_STR);
    $validar->execute();
    if ($validar->rowCount() > 0) {
        return false;
    } else {
        return true;
    }
}
