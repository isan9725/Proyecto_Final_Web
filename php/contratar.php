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
    <title>Contratar</title>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <?php

        session_start();

        if(!isset($_SESSION["usuario"])){
            header("location:../modulos/Login.html");
        }
        if(isset($_POST["id_servicio"])){
            $id_servicio = $_POST["id_servicio"];
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
                <form action="busqueda_registrados.php" method="POST" class="navbar-form navbar-left" role="form">
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
                            <li><a tabindex="-1" href="modificarServicios.php">Modificar Servicios</a></li>
                            <li><a tabindex="-1" href="#">Ayuda</a></li>
                            <li class="divider"></li>
                            <li>
                                <a class="test" href="#">Categorias <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="busqueda.php?categoria=fumigaciones">Fumigaciones</a></li>
                                    <li><a href="busqueda.php?categoria=niniera">Niñera</a></li>
                                    <li><a href="busqueda.php?categoria=lavanderia">Lavanderia</a></li>
                                    <li><a href="busqueda.php?categoria=podado">Podado de Cesped</a></li>
                                    <li><a href="busqueda.php?categoria=decoracion">Decoración de Interiores</a></li>
                                    <li><a href="busqueda.php?categoria=asesorias">Asesorías</a></li>
                                    <li><a href="busqueda.php?categoria=ayudas">Ayudas</a></li>
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

    <div class="container">
        <form role="form" method="POST" action="mandar_contratacion.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Nombre">Nombre: </label>
                <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre Quien Envia El Email">
                <input type="hidden" name="datos_de_sesion">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apeliido" id="apellido" placeholder="Apelliedo de Quien Envia el Email">
            </div>
            <div class="form-group">
                <input type="hidden" name="id_servicio" value="<?php echo $id_servicio ?>">
            </div>
            <div class="form-group">
                <label for="numero-telefonico">Número Telefonico</label>
                <input type="text" class="form-control" id="numero-telefono" name="numero-telefono" placeholder="Ingresa tu Número de Contacto">
            </div>
            <div class="form-group">
                <label for="asunto">Asunto: </label>
                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto">
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="3" placeholder="Escribe tu mensaje..."></textarea>
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>





    <!-- Footer -->
    <footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
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