<?php
require_once '../../database/database.php';
require_once '../validaciones.php';
session_start();
if (isset($_POST)) {
    $file = $_FILES['img'];
    $filename = $file['name'];
    $mimetype = $file['type'];
    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
        if (!is_dir('../../images/')) {
            mkdir('../../images/', 0777, true);
        }
        move_uploaded_file($file['tmp_name'], '../../images/' . $filename);
    } else {
        echo "El formato de la imagen no es válido";
    }

# limpiar y combertir el string en un array
    $id_gender = $_POST["id_genero"];
    $limpiar_genero = str_replace(",", ' ', $id_gender);
    $id_generos = explode(' ', $limpiar_genero);

    $id_actor = $_POST["actores"];
    $limpiar_actores = str_replace(",", ' ', $id_actor);
    $id_actores = explode(' ', $limpiar_actores);

    $name = $_POST['nombre'];
    $year = $_POST['año'];
    $country = $_POST['pais'];
    $qualification = $_POST['calificacion'];
    $sinopsis = $_POST['sinopsis'];
    $image = $filename;
    $user = $_SESSION['cinefil@']->id_user;
    $validacion = EvitarDatosDuplicados($name, $conexion, 'pelicula', 'nombre_p');

    if ($validacion) {
        try {

            $pelicula = $conexion->prepare("INSERT INTO pelicula VALUES (null, :user, :name, :year, :country, :sinopsis, :qualification, :img);");
            $pelicula->bindParam(":user", $user, PDO::PARAM_INT);
            $pelicula->bindParam(":name", $name, PDO::PARAM_STR);
            $pelicula->bindParam(":year", $year, PDO::PARAM_INT);
            $pelicula->bindParam(":country", $country, PDO::PARAM_STR);
            $pelicula->bindParam(":sinopsis", $sinopsis, PDO::PARAM_STR);
            $pelicula->bindParam(":qualification", $qualification, PDO::PARAM_INT);
            $pelicula->bindParam(":img", $image, PDO::PARAM_STR);
            $pelicula->execute();
            $peli_id = $conexion->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {

# registrar los generos a los que pertenece la pelicula
            foreach ($id_generos as $genero) {
                $generos = $conexion->prepare("INSERT INTO peliculageneros VALUES(:gender, :movie);");
                $generos->bindParam(":gender", $genero, PDO::PARAM_INT);
                $generos->bindParam(":movie", $peli_id, PDO::PARAM_INT);
                $generos->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        try {
# registrar los actores que participan en la pelicula
            foreach ($id_actores as $actor) {
                $actores = $conexion->prepare("INSERT INTO peliculaactores VALUES(:actor, :movieId);");
                $actores->bindParam(":actor", $actor, PDO::PARAM_INT);
                $actores->bindParam(":movieId", $peli_id, PDO::PARAM_INT);
                $actores->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        echo "ok";

    } else {
        echo "La película ya está registrada en la base de datos";
    }
} # post
