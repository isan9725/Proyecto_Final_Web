<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/busqueda.css">
    <title>Busqueda</title>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <?php
        require "operacionesSQL.php";

        session_start();

        if(!isset($_SESSION["usuario"])){
            header("location:../modulos/Login.html");
        }
        ?>
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#myPage">Logo</a>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="navbar-form navbar-left" role="form">
                    <div class="form-group">  
                        <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar">             
                    </div>
                    <button class="btn btn-default" type="submit" name="btn_busqueda" id="btn_busqueda">Buscar</button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#myPage">HOME</a></li>
                    <li><a href="#contact">Servicios Destacados</a></li>-
                    <li><a href="#band">Acerca De Nosotros</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="agregarServicio.php">Ofrecer Servicio</a></li>
                            <li><a tabindex="-1" href="modificar_servicios.php">Modificar Servicios</a></li>
                            <li><a tabindex="-1" href="#">Ayuda</a></li>
                            <li class="divider"></li>
                            <li>
                                <!--Obersar que es lo que pasa cuando se llama a la misma pagina con el href si no la vuelve a cargar con la nueva peticion
                            se tendra que quitar de aqui -->
                                <a class="test" href="#">Categorias <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="?categoria=fumigaciones">Fumigaciones</a></li>
                                    <li><a href="?categoria=niniera">Niñera</a></li>
                                    <li><a href="?categoria=lavanderia">Lavanderia</a></li>
                                    <li><a href="?categoria=podado">Podado de Cesped</a></li>
                                    <li><a href="?categoria=decoracion">Decoración de Interiores</a></li>
                                    <li><a href="?categoria=asesorias">Asesorías</a></li>
                                    <li><a href="?categoria=ayudas">Ayudas</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["usuario"];?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php

        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $busqueda = $_GET["categoria"];

            $consultar_busqueda = new operacionesSQL();

            $tamanio_pagina=4;

            if(isset($_GET["pagina"])){
                if($_GET["pagina"] == 1){
                    header("location:busqueda_registrados.php");
                }else{
                    $pagina = $_GET["pagina"];
                }
            }else{
                $pagina = 1;
            }

            $empezar_desde = ($pagina-1)*$tamanio_pagina;

            $num_filas = $consultar_busqueda->consultar_Filas_Servicios_Por_Categorias($busqueda);

            $total_pagina = ceil($num_filas/$tamanio_pagina);

            echo $num_filas . $tamanio_pagina . $total_pagina;

            
            $resultados = $consultar_busqueda->consultar_Servicios_Por_Categorias_Limite($busqueda,$tamanio_pagina,$empezar_desde);

            if(is_array($resultados)){
                foreach($resultados as $resultado){
                    ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <h1>Resultados de Busqueda
                                        <h2 class="lead"><strong class="text-danger"><?php echo $num_filas; ?></strong> Resultados encontrados para categoria <strong class="text-danger"><?php echo $busqueda; ?></strong></h2>
                                    </h1>
                                </div>
                            </div>
                            <section>
                                <div class="row search-result">
                                    <div class="col-md-3">
                                        <a href="#" class="thumbnail"><img src="..." alt="..."></a>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="meta-search">
                                            <li><i class="glyphicon glyphicon-search"></i><span><?php echo $busqueda; ?></span></li>
                                            <li><i class="glyphicon glyphicon-hand-right"></i><span>Descripcion</span></li>
                                            <li><i class="glyphicon glyphicon-earphone"></i><span>Contrata</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-7">
                                        <h3><?php $titulo = htmlentities($resultado['TITULO']); echo $titulo; ?></h3>
                                        <p><?php $descripcion = htmlentities($resultado['DESCRIPCION']); echo $descripcion; ?></p>
                                        <form action="contratar.php" method="POST">
                                            <input type="hidden" name="id_servicio" value="<?php $id = htmlentities($resultado['ID_SERVICIO']); echo $id; ?>">
                                            <span class="plus"><button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Contratar</button>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                      

                    <?php
                }
            }
              #paginacion
            for($i=1; $i<=$total_pagina;$i++){
                echo "<a class='paginacion' href='?categoria=".$busqueda."&pagina=" . $i . "'>" . $i . "</a>  ";
            }
            
        }else{

            if(isset($_POST["busqueda"])){
                $busqueda = $_POST["busqueda"];

                $consultar_busqueda = new operacionesSQL();

                $tamanio_pagina=4;

                if(isset($_GET["pagina"])){
                    if($_GET["pagina"] == 1){
                        header("location:busqueda_registrados.php");
                    }else{
                        $pagina = $_GET["pagina"];
                    }
                }else{
                    $pagina = 1;
                }

                $empezar_desde = ($pagina-1)*$tamanio_pagina;

                $num_filas = $consultar_busqueda->consultar_Filas_Servicios($busqueda);

                $total_pagina = ceil($num_filas/$tamanio_pagina);

                echo $num_filas . $tamanio_pagina . $total_pagina;

                
                $resultados = $consultar_busqueda->consultar_Servicios_Limite($busqueda,$tamanio_pagina,$empezar_desde);

                if(is_array($resultados)){
                    foreach($resultados as $resultado){
                        ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h1>Resultados de Busqueda
                                            <h2 class="lead"><strong class="text-danger"><?php echo $num_filas; ?></strong> Resultados encontrados para categoria <strong class="text-danger"><?php echo $busqueda; ?></strong></h2>
                                        </h1>
                                    </div>
                                </div>
                                <section>
                                    <div class="row search-result">
                                        <div class="col-md-3">
                                            <a href="#" class="thumbnail"><img src="..." alt="..."></a>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="meta-search">
                                                <li><i class="glyphicon glyphicon-search"></i><span><?php echo $busqueda; ?></span></li>
                                                <li><i class="glyphicon glyphicon-hand-right"></i><span>Descripcion</span></li>
                                                <li><i class="glyphicon glyphicon-earphone"></i><span>Contrata</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-7">
                                            <h3><?php $titulo = htmlentities($resultado['TITULO']); echo $titulo; ?></h3>
                                            <p><?php $descripcion = htmlentities($resultado['DESCRIPCION']); echo $descripcion; ?></p>
                                            <form action="contratar.php" method="POST">
                                                <input type="hidden" name="id_servicio" value="<?php $id = htmlentities($resultado['ID_SERVICIO']); echo $id; ?>">
                                                <span class="plus"><button type="submit" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Contratar</button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <?php
                     }
                }
                 #paginacion
                 for($i=1; $i<=$total_pagina;$i++){
                    echo "<a class='paginacion' href='?pagina=" . $i . "'>" . $i . "</a>  ";
                }   
            }
        } 
                           ?> 
        <!-- Footer -->
        <footer class="text-center">
            <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </a><br>
            <p>Proyecto Final Desarrollo Web <a data-toggle="tooltip" title="Visit w3schools">Informes</a></p>
        </footer>                    
    <script>
        $(document).ready(function() {
            $('.dropdown a.test').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
            // Initialize Tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {

                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        })
    </script>

</body>

</html>