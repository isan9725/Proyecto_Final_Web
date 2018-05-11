<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/home.css">
    <title>Electridad</title>
</head>

 <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
 <?php
        session_start();

        if(!isset($_SESSION["usuario"])){
            header("location:../../modulos/Login.html");
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
                            <li><a tabindex="-1" href="modificar_servicios.php">Modificar Servicios</a></li>
                            <li><a tabindex="-1" href="Foro/header.php">Ayuda</a></li>
                            <li class="divider"></li>
                            <li>
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
<br><br><br><br>

        <div align="center" >
        <h4>FORO</h4> 
        </div>

<div>
<form action="electricidad.php" name="empleado" method="post" enctype="multipart/form-data">
    <a href="header.php"><h3>Inicio</h3></a> <br>
     <table align="center"> 
                 <p> <tr><td><h4>Añadir tema</h4></td>

                  <p> <tr><td>Nombre: </td>
                    <td><input type="text" name="nombre" id="nombre" /> </p> </td> </tr>

                  <p> <tr><td>Tema: </td>
                    <td><input type="text" name="tema" id="tema"></td></tr>
                    

                   <p> <tr><td>Descripción: </td>
                 <td><textarea rows="10" cols="40" name="descripcion" id="descripcion"></textarea></p></td></tr>

                 <tr><td><input type="submit" name="benviar" value="Enviar"/></td></tr>

                    </table>
</form>
</div>
<br>
  
<?php

    $mysql = new mysqli('localhost', 'root', '', 'proyecto_final');

    $sql = "SELECT nombre, tema, descripcion FROM foro_foro WHERE id_forocategoria='3'";

    $informacion = $mysql->query($sql);

    if($informacion->num_rows > 0){
        echo "<h1>Temas guardados</h1>";

        for($i=0; $i<$informacion->num_rows; $i++){
            $fila = $informacion->fetch_array(MYSQLI_ASSOC);
            echo "</br>";
            echo "<strong>".$fila["nombre"]."</strong>"."</br>";
            echo "<i>".$fila["tema"]."</i>"."</br>";
            echo $fila["descripcion"]."</br>";
            echo "</br>";
        }
    }else{
        echo "</br>"."No se pudo obtener la información de los temas"."</br>";
    }

?>
 <!-- Footer -->
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

  