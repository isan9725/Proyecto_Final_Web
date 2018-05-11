<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<?php
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
                <form action="busqueda_registrados.php" method="POST" class="navbar-form navbar-left" role="form">
                    <div class="form-group">  
                        <input class="form-control" type="text" name="busqueda" id="busqueda" placeholder="Buscar">             
                    </div>
                    <button class="btn btn-default" type="submit" name="btn_busqueda" id="btn_busqueda">Buscar</button>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home_registrados.php">HOME</a></li>
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
                                    <li><a href="busqueda_registrados.php?categoria=fumigaciones">Fumigaciones</a></li>
                                    <li><a href="busqueda_registrados.php?categoria=niniera">Niñera</a></li>
                                    <li><a href="busqueda_registrados.php?categoria=lavanderia">Lavanderia</a></li>
                                    <li><a href="busqueda_registrados.php?categoria=podado">Podado de Cesped</a></li>
                                    <li><a href="busqueda_registrados.php?categoria=decoracion">Decoración de Interiores</a></li>
                                    <li><a href="busqueda_registrados.php?categoria=asesorias">Asesorías</a></li>
                                    <li><a href="busqueda_registrados.php?categoria=ayudas">Ayudas</a></li>
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
        <form role="form" method="POST" action="mensajero_servicios.php" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="escoger_servicio">Tipo de Servicio</label>
                <select class="form-control" name="servicios" id="servicio">
                    <option value="seleccionar">Seleccionar</option>
                    <option value="fumigacion">Fumigación</option>
                    <option value="niniera">Niñera</option>
                    <option value="lavanderia">Lavanderia</option>
                    <option value="podado">Podado de Cesped</option>
                    <option value="decoración">Decoración de Interiores</option>
                    <option value="asesorias">Asesorias</option>
                    <option value="ayuda">Ayudas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="direcicon">Dirección</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Ingresa tu Número de Contacto">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
                <input name="imagen" type="file" id="ejemplo_archivo_1">
                <p class="help-block">La imagen no puede superar los 2MB</p>
            </div>
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>

    <footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
        <p>Proyecto Final Desarrollo Web <a data-toggle="tooltip" title="Visit w3schools">Informes</a></p>
    </footer>

    <script>
        $(document).ready(function() {
            $('.dropdown a.test').on("click", function(e){
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