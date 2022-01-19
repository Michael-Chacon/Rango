// metodo para guardar usuario nuevo
function ingresar() {
    $("#login").modal("show");
}

function registrarme() {
    $("#registro").modal("show");
}
// REGISTRO
$('#btnRegistro').click(function(e) {
    registrar();
});

function registrar() {
    var datos = new FormData();
    datos.append('user', $("#usuario").val());
    datos.append('password', $('#pass').val());
    datos.append('mail', $('#correo').val());
    datos.append('gender', $('#genero').val());
    datos.append('age', $('#edad').val());
    $.ajax({
        type: 'post',
        url: 'php/registroYlogin/registro.php',
        data: datos,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data == 'ok') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario creado con exito',
                    showConfirmButton: false,
                    timer: 3000
                });
                $("#registro").modal("toggle");
                $("#login").modal("show");
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: data,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
}
// LOGIN
$('#btnLogin').click(function(e) {
    validarLogin();
});

function validarLogin() {
    var campos = new FormData();
    campos.append('user', $('#userL').val());
    campos.append('pass', $('#passL').val());
    $.ajax({
        type: 'post',
        url: 'php/registroYlogin/login.php',
        data: campos,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            console.log(respuesta);
            if (respuesta == 'ok') {
                window.location.href = "views/perfil.php";
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: respuesta,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
}
// GUARDAR GENERO
$("#btnSaveGenero").click(function(e) {
    guardarGenero();
});

function guardarGenero() {
    var gender = new FormData();
    gender.append('genero', $('#nombreG').val());
    console.log(gender.get('genero'));
    $.ajax({
        type: 'post',
        url: '../php/generos/crearGenero.php',
        data: gender,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            if (respuesta == 'ok') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Género creado con exito',
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#nombreG').val('');
                $("#creargenero").modal("toggle");
                listarGeneros();
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: respuesta,
                    showConfirmButton: false,
                    timer: 3000
                });
                listarGeneros();
            }
        }
    });
}
// LISTAR GENERO
function listarGeneros() {
    $('#listadoGeneros').empty();
    $.getJSON('../php/generos/listarGeneros.php', function(listado) {
        var genero = [];
        $.each(listado, function(llave, valor) {
            if (llave >= 0) {
                var template = '<article class="col-md-2 mb-3">';
                template += '<ul class="list-group">';
                template += '<li class="list-group-item d-flex justify-content-between align-items-center">';
                template += '<a href="#" class="stretched-link"></a>';
                template += valor.nombre_g;
                template += '<span class="badge bg-primary rounded-pill">14</span>';
                template += "</li>";
                template += "</ul>";
                template += "</article>";
                genero.push(template);
            }
        });
        $("#listadoGeneros").append(genero.join(""));
    });
}
// GUARDAR ACTOR
$("#btnSaveActor").click(function(e) {
    guardarActor();
});

function guardarActor() {
    var info = new FormData();
    info.append('nombreA', $('#nombreA').val());
    console.log(info.get('nombreA'));
    $.ajax({
        type: 'post',
        url: '../php/actores/crearActor.php',
        data: info,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            if (respuesta == 'ok') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Actor registrado con éxito',
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#nombreA').val('');
                // $("#crearActor").modal("toggle");
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: respuesta,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
}
listarGeneros();
// listado de generos para claseficar la peli
function Generos() {
    $('#listGenders').empty();
    $.getJSON('../php/generos/listarGeneros.php', function(listado) {
        var gender = [];
        $.each(listado, function(llave, valor) {
            if (llave >= 0) {
                var text = '<div class="col-md-3">';
                text += '<span class="badge bg-dark">';
                text += '<div class="form-check">';
                text += '<input class="form-check-input shadow" type="checkbox" name="id_genero[]" value="' + valor.id_genero + '" id="id_genero' + valor.id_genero + '" checked';
                text += '<label class="check-genero" for="flexCheckChecked">';
                text += valor.nombre_g;
                text += "</label>";
                text += "</div>";
                text += '</span>';
                text += "</div>";
                gender.push(text);
            }
        });
        $("#listGenders").append(gender.join(""));
    });
}
// LISTAR ACTORES para anexarlos a la pelicula
function Actores() {
    $('#listActors').empty();
    $.getJSON('../php/actores/listarActores.php', function(lista) {
        var person = [];
        $.each(lista, function(llave, valor) {
            if (llave >= 0) {
                var text = '<div class="col-md-4 mt-2">';
                text += '<span class="badge bg-success">';
                text += '<div class="form-check">';
                text += '<input class="form-check-input shadow" type="checkbox" name="id_actor[]" value="' + valor.id_actor + '" id="id_actor' + valor.id_actor + '" checked';
                text += '<label class="form-check-label" for="flexCheckChecked">';
                text += valor.nombre_a;
                text += "</label>";
                text += "</div>";
                text += '</span>';
                text += "</div>";
                person.push(text);
            }
        });
        $("#listActors").append(person.join(""));
    });
}
//  guardar peliculas con actores y generos
$("#saveMovie").click(function(e) {
    console.log('en accion');
    guardarPelicula();
});
// listar los generos
$("#crearP").click(function(e) {
    Generos();
    Actores();
});

function guardarPelicula() {
    var generos = $("input[name='id_genero[]']:checked").map(function() {
        return this.value;
    }).get();
    var actores = $("input[name='id_actor[]']:checked").map(function() {
        return this.value;
    }).get();
    var datos = new FormData();
    var files = $("#imgP")[0].files[0];
    datos.append('nombre', $("#nombreP").val());
    datos.append('año', $("#año").val());
    datos.append('pais', $("#paisP").val());
    datos.append('calificacion', $("#calificacion").val());
    datos.append('sinopsis', $("#sinopsis").val());
    datos.append('id_genero', generos);
    datos.append('actores', actores);
    datos.append('img', files);
    console.log(generos);
    console.log(actores);
    $.ajax({
        type: 'post',
        url: '../php/peliculas/guardarPelicula.php',
        data: datos,
        processData: false,
        contentType: false,
        success: function(respuesta) {
            if (respuesta == 'ok') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Pelicula registrada con éxito',
                    showConfirmButton: false,
                    timer: 2000
                });
                $("#nombreP").val('');
                $("#año").val('');
                $("#paisP").val('');
                $("#calificacion").val('');
                $("#sinopsis").val('');
                $("#imgP").val('');
                $("#crearPelicula").modal("toggle");
                portadaPeliculas();
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: respuesta,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        }
    });
}
// listado de generos para claseficar la peli
function Generos() {
    $('#listGenders').empty();
    $.getJSON('../php/generos/listarGeneros.php', function(listado) {
        var gender = [];
        $.each(listado, function(llave, valor) {
            if (llave >= 0) {
                var text = '<div class="col-md-3">';
                text += '<span class="badge bg-dark">';
                text += '<div class="form-check">';
                text += '<input class="form-check-input shadow" type="checkbox" name="id_genero[]" value="' + valor.id_genero + '" id="id_genero' + valor.id_genero + '" checked';
                text += '<label class="check-genero" for="flexCheckChecked">';
                text += valor.nombre_g;
                text += "</label>";
                text += "</div>";
                text += '</span>';
                text += "</div>";
                gender.push(text);
            }
        });
        $("#listGenders").append(gender.join(""));
    });
}
// listar las portadas de las peliculas
function portadaPeliculas() {
    $('#listadoPeliculas').empty();
    $.getJSON('../php/peliculas/seleccionarPortadaPelicula.php', function(lista) {
        var pelis = [];
        $.each(lista, function(llave, valor) {
            if (llave >= 0) {
                var card = '<article class="col-xs-6 col-sm-6 col-md-2">';
                card += '<div class="card portada">';
                card += '<img src="../images/' + valor.img + '" class="card-img-top foto-portada" alt="...">';
                card += '<div class="card-body">';
                card += '<h5 class="card-subtitle mb-2 text-muted text-center">' + valor.nombre_p + ' <span class="año">(' + valor.año + ')</span> <small class="badge bg-danger calificacion">' + valor.calificacion + '</small></h5>';
                card += "</div>";
                card += '<a href="#" class="stretched-link" onclick="obtenerPelicula(' + valor.id_pelicula + ')" data-bs-toggle="modal" data-bs-target="#infoPelicula"></a>';
                card += '</div>';
                card += "</article>";
                pelis.push(card);
            }
        });
        $("#listadoPeliculas").append(pelis.join(""));
    });
}
portadaPeliculas();
// obtener los datos de una pelicula
function obtenerPelicula(peli_id) {
    var michael = new FormData();
    var id = peli_id;
    michael.append('id_pelicula', id);
    $.ajax({
        type: 'post',
        url: '../php/peliculas/pelicula.php',
        data: michael,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function(datosPelicula) {
            console.log(datosPelicula[0]);
            console.log(datosPelicula[1]);
            console.log(datosPelicula[2]);
            var img = '<img src="../images/' + datosPelicula[0][0].img + '" class="img-fluid rounded-start" alt="...">';
            $("#imgPelicula").html(img);
            $("#tituloPelicula").html(datosPelicula[0][0].nombre_p);
            $("#paisPeli").html(datosPelicula[0][0].pais);
            $("#añoPeli").html(datosPelicula[0][0].año);
            $("#calificacionPeli").html(datosPelicula[0][0].calificacion);
            $(".sinopsisPeli").html(datosPelicula[0][0].sinopsis);
            // listar los generos
            var generosPe = [];
            $.each(datosPelicula[1], function(llave, valor) {
                if (llave >= 0) {
                    var badgeG = '<h6><span class="badge bg-danger fuenteG">' + datosPelicula[1][llave].nombre_g + '</span><h6/>';
                    generosPe.push(badgeG);
                }
            });
            var actoresPe = [];
            $.each(datosPelicula[2], function(llave, valor) {
                if (llave >= 0) {
                    var badgeA = '<span class="badge bg-success fuenteG">' + datosPelicula[2][llave].nombre_a + '</span>';
                    actoresPe.push(badgeA);
                }
            });
            $("#generosMov").append(generosPe.join(""));
            $("#actoresMov").append(actoresPe.join(""));
            $("#cerrarModal").click(function(e) {
                $("#generosMov").html('');
                $("#actoresMov").html('');
            });
        }
    });
}