<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $titulo?></title>
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  </head>

  <body>

    <header class="bg-light w-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Mi Cms</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <!-- Pagina -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="submenuPagina" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Página
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="submenuPagina">
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>pagina">Listar</a>
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>pagina/nueva">Crear</a>
                                    </div>
                                </li>

                                <!-- Artículo -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="submenuArticulo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Artículo
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="submenuArticulo">
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>articulo">Listar</a>
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>articulo/nuevo">Crear</a>
                                    </div>
                                </li>

                                <!-- Visitante -->

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="submenuArticulo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Visitante
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="submenuArticulo">
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>visitante">Listar</a>

                                     <!-- Comentarios -->

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="submenuArticulo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Comentario
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="submenuArticulo">
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>comentario">Listar</a>
                                        
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="submenuArticulo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Sesión
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="submenuArticulo">
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>salirAdmin">Cerrar sesión</a>
                                        <a class="dropdown-item" href="<?php echo config('base_url')?>administrador">Mi perfil</a>
                                        
                                    </div>
                                </li>

                            </ul>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <br/><br/>