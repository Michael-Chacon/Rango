 <!-- contenido de  la pagina -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    Rango
                </a>
                <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if (isset($_SESSION['cinefil@'])): ?>
                            <li class="nav-item">
                            <a aria-current="page" class="nav-link " href="../php/registroYlogin/logout.php">
                               | <i class="bi bi-power"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-current="page" class="nav-link " href="#">
                                <?=$_SESSION['cinefil@']->usuario?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-current="page" class="nav-link " href="#">
                                Mis listas
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Opciónes
                          </a>
                          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a  accesskey="g" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#creargenero">Crear Genero</a></li>
                            <li><a accesskey="p" class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#crearPelicula" id="crearP">Crear pelicula</a></li>
                            <li><a class="dropdown-item" href="#">Crear serie</a></li>
                            <li><a class="dropdown-item" href="#">Crear anime</a></li>
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#crearActor">Registrar actor</a></li>
                            <li><a class="dropdown-item" href="#">Crear serie</a></li>
                          </ul>
                        </li>
                    <?php endif;?>
                        <li class="nav-item">
                            <a aria-current="page" class="nav-link " href="#">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Peliculas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-disabled="true" class="nav-link" href="#" tabindex="-1">
                                Series
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-disabled="true" class="nav-link" href="#" tabindex="-1">
                                Generos
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex buscar">
                        <input aria-label="Search" class="form-control me-2" placeholder="Buscar" type="search">
                            <button class="btn btn-outline-success btn-sm" type="submit">
                                Buscar
                            </button>
                        </input>
                    </form>
                    <?php if (!isset($_SESSION['cinefil@'])): ?>
                        <div aria-label="Basic mixed styles example" class="btn-group" role="group">
                            <button accesskey="w" class="btn btn-outline-light btn-sm" onclick="ingresar()" type="button">
                                Ingresar
                            </button>
                            <button accesskey="q" class="btn btn-outline-light btn-sm" onclick="registrarme()" type="button">
                                Registrarme
                            </button>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </nav>

        <!-- Modal para iniciar session-->
        <div aria-hidden="true" aria-labelledby="login" class="modal fade" id="login" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="login">
                            Ingresar a la plataforma
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <form action="#" method="post">
                    <div class="modal-body">
                            <div class="mb-3">
                              <label for="userL" class="form-label">Usuario:</label>
                              <input type="text" class="form-control" id="userL" name="userL">
                            </div>
                            <div class="mb-3">
                              <label for="passL" class="form-label">Contraseñas:</label>
                              <input type="password" class="form-control" id="passL" name="passL">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                            Cancelar
                        </button>
                        <button class="btn btn-outline-success" type="button" id="btnLogin">
                            Ingresar
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal para que los usuarios se registren -->
        <div aria-hidden="true" aria-labelledby="registro" class="modal fade" id="registro" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registro">
                            Registrarme
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="user">
                                    Usuario
                                </label>
                                <input  class="form-control" id="usuario" name="usuario" pattern="[A-Za-z0-9]{1,20}" placeholder="Usuario" required="" title="Solo letras en minúscula y minúsculas y números, sin espacios al final.">
                                </input>
                                <div class="form-text" id="emailHelp">
                                    Solo 20 caracteres, letras y números.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="pass">
                                    Contraseña
                                </label>
                                <input class="form-control" id="pass" name="pass" placeholder="Contraseña" required="" type="password">
                                </input>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="correo">
                                    Correo:
                                </label>
                                <input class="form-control" id="correo" name="correo" placeholder="Correo" required="" type="email">
                                </input>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="genero">
                                    Genero:
                                </label>
                                <select aria-label="Default select example" class="form-select" id="genero" name="genero" required="">
                                    <option>
                                    </option>
                                    <option value="Mujer">
                                        Cinefila
                                    </option>
                                    <option value="Hombre">
                                        Cinefilo
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Edad">
                                    Edad:
                                </label>
                                <input class="form-control" id="edad" name="edad" pattern="[0-9]{2}" placeholder="Edad" required="" title="Ingresa solo 2 números.">
                                </input>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-danger" data-bs-dismiss="modal" type="button">
                                    Cancelar
                                </button>
                                <button class="btn btn-outline-success" id="btnRegistro" type="button">
                                    Registrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>