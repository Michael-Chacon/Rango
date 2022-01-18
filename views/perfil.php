<?php session_start();
require_once '../php/session.php';?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
        <meta content="" name="Peliculas"/>
        <meta content="" name="Michael"/>
        <title>
            Rango
        </title>
        <!-- Bootstrap CSS -->
        <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" rel="stylesheet">
            <!-- fuente -->
            <style>
			@import url('https://fonts.googleapis.com/css2?family=Inconsolata&display=swap');
			</style>
            <!-- Iconos do bootstrap-->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css" rel="stylesheet"/>
            <link href="../css/estilos.css" rel="stylesheet">
                <!-- jquery -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
                </script>
                <!-- ESTILOS  sweet alert -->
                <link href="../librerias/alertas/dist/sweetalert2.min.css" rel="stylesheet"/>
            </link>
        </link>
    </head>
    <body>
    	<?php require_once 'menu.php'?>
        <main class="container-fluid">
        	<h2 class="text-center">Géneros</h2>
        	<section class="row mt-3" id="listadoGeneros" >
        	</section>
        	<h2 class="text-center">Peliculas</h2>
        	<section class="row" id="listadoPeliculas">
	        	<article class="col-md-2">
	        		<div class="card">
					  <img src="../images/seven.jpg" class="card-img-top portada" alt="...">
					  <div class="card-body texto-portada">
					    <h5 class="card-subtitle mb-2 text-muted text-center">Seven <span class="badge bg-dark">1995</span>
					    </h5>
					  </div>
					  <a href="#" class="stretched-link"></a>
					</div>
	        	</article>
	        </section>
        </main>
        <!-- ------------------------------------------------------INICIO DE LOS MODALES------------------------ -->
			<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="infoPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content fondo ">
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-5" id="imgPelicula">
        		<img src="../images/seven.jpg" alt="" class="foto-pelicula">
        	</div>
        	<div class="col-md-7">
        			<h2 class="text-center mb-3" id="tituloPelicula">Seven</h2>
        			<article class="row justify-content-center text-center">
        				<div class="col-md-10">
							    <ul class="list-group bg-dark">
								  <li class="list-group-item">
								  	<div class="row">
								  		<div class="col text-muted">Pais</div>
								  		<div class="col small" id="paisPeli">Estados Unidos</div>
								  	</div>
								  </li>
								  <li class="list-group-item">
								  	<div class="row">
								  		<div class="col text-muted">Año</div>
								  		<div class="col small" id="añoPeli">1995</div>
								  	</div>
								  </li>
								  <li class="list-group-item">
								  	<div class="row">
								  		<div class="col text-muted">Calificación</div>
								  		<div class="col small" id="calificacionPeli">9.5</div>
								  	</div>
								  </li>
								</ul>
        				</div>
        			</article>	
        			<section class="row mt-4 text-center">
        				<article class="col-md-6">
        					<h5>Generos</h5>
        					Lorem ipsum dolor sit amet consectetur adipisicing.
        				</article>
        				<article class="col-md-6">
        					<h5>Actores</h5>
        					Lorem ipsum dolor sit amet consectetur adipisicing elit.
        				</article>
        			</section>
        				<div id="global" class="bg-dark mt-4">
					 	 <div id="mensajes">
						  	<p class="sinopsisPeli">
			        			El teniente Somerset, del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso y brillante detective David Mills. Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta..
			        		</p>
					  </div>
        		</div>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>

			<!-- Modal  para registrar los GENERO-->
			<div class="modal fade" id="creargenero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Crear género</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	<form action="#" method="post">
				        <div class="mb-3">
						  <label for="nombreG" class="form-label">Nombre del genero</label>
						  <input type="text" class="form-control" id="nombreG" name="nombreGe" placeholder="Nombre">
						</div>
			      	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">cancelar</button>
			        <button type="button" class="btn btn-outline-success" id="btnSaveGenero">Registrar</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal  para registrar los ACTORES-->
			<div class="modal fade" id="crearActor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-sm">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Registrar a un actor</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	<form action="#" method="post">
				        <div class="mb-3">
						  <label for="nombreA" class="form-label">Nombre del actor</label>
						  <input type="text" class="form-control" id="nombreA" name="nombreA" placeholder="Nombre">
						</div>
			      	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">cancelar</button>
			        <button type="button" class="btn btn-outline-success" id="btnSaveActor">Registrar</button>
			      </div>
			    </div>
			  </div>
			</div>


			<!-- Modal  para CREAR PELICUALA-->
			<div class="modal fade" id="crearPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-scrollable">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Registrar pelicula</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			      </div>
			      <div class="modal-body">
			      	<form action="#" method="post" enctype="multipart/form-data">
			      		<div class="mb-3">
						  <label for="imgP" class="form-label">Imagen de portada:</label>
						  <input class="form-control" type="file" id="imgP" name="imgP">
						</div>
						<div class="mb-3">
						  <label for="nombreP" class="form-label">Nombre:</label>
						  <input type="text" class="form-control" id="nombreP" placeholder="Nombre de la peli" name="nombreP">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
								  <label for="año" class="form-label">Año de estreno:</label>
								  <input type="number" class="form-control" id="año" placeholder="Año de estreno" name="año">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
								  <label for="paisP" class="form-label">Pais:</label>
								  <input type="text" class="form-control" id="paisP" placeholder="País de origen" name="paisP">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
								  <label for="calificacion" class="form-label">Calificación:</label>
								  <input type="number" class="form-control" id="calificacion" placeholder="¿Qué puntaje le das?" name="calificacion">
								</div>
							</div>
							<div class="col-md-6">
						<div class="form-floating">
						  <textarea class="form-control" placeholder="Sinopsis" id="sinopsis" name="sinopsis"></textarea>
						  <label for="sinopsis">Sinopsis</label>
						</div>
							</div>
						</div>
						<hr/>
						<h3 class="text-center">Géneros</h3>
						<div class="row" id="listGenders">
						</div>
						<hr/>
						<h3 class="text-center">Actores</h3>
						<div class="row" id="listActors">
						</div>
			      	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
			        <button type="button" class="btn btn-outline-success" id="saveMovie">Registrar</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal  para ver la informacion de la pelicula-->
			<!-- <div class="modal fade" id="infoPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered">
			    <div class="modal-content">
			      <div class="modal-body">
			        	<div class="card mb-3" style="max-width: 540px;">
						  <div class="row g-0">
						    <div class="col-md-4" id="imgPelicula">
						    </div>
						    <div class="col-md-8">
						      <div class="card-body">
						        <h5 class="card-title" id="tituloPelicula"></h5>
						        <p class="card-text" id="sinopsisPelicula">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
						        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						      </div>
						    </div>
						  </div>
						</div>
			      </div>
			    </div>
			  </div>
			</div> -->
    <!-- Bootstrap core JS-->
        <script type="text/javascript" src="../js/script.js"></script>
        <script src="../librerias/alertas/dist/sweetalert2.all.min.js">
        </script>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
