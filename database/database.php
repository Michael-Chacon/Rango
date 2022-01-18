<?php
$servidor = "localhost";
$db = "rango";
$puerto = 3306;
$charset = "utf8";
$usuario = "root";
$password = "";
$opciones = [PDO::ATTR_CASE => PDO::CASE_NATURAL, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_EMULATE_PREPARES => false];
$conexion = new PDO("mysql:dbname={$db};host={$servidor};port={$puerto};charset={$charset}", $usuario, $password, $opciones);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $conexion;
