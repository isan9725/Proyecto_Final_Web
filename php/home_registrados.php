<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
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

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../img/Decoracion.png" alt="New York" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>Decoraciones De Interiores</h3>
                    <p>The atmosphere in New York is lorem ipsum.</p>
                </div>
            </div>

            <div class="item">
                <img src="../img/limpiar-casas.jpg" alt="Chicago" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>Limpieza</h3>
                    <p>Casas Relucientes</p>
                </div>
            </div>

            <div class="item">
                <img src="../img/fumigar.jpg" alt="Los Angeles" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>Fumigaciones</h3>
                    <p>Deshaste de la molesta plaga!</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Container (Contact Section) -->
    <section>
        <div id="contact" class="container">
            <div class="section-header">
                <h3>Destacados</h3>
                <p><em>Para ti</em></p>
            </div>
            <div class="row image-thubs">
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="../img/se1.jpg" alt="..."><i class="text-thum">Limpieza Hogareña</i>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="../img/se2.jpg" alt="..."><i class="text-thum">Preparación De Comidas</i>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="../img/se3.jpg" alt="..."><i class="text-thum">Lavanderia</i>
                    </a>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="../img/se4.jpg" alt="..."><i class="text-thum">Niñera</i>
                    </a>
                </div>
            </div>
            <br>
            <!--<h3 class="text-center">From The Blog</h3>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Mike</a></li>
                <li><a data-toggle="tab" href="#menu1">Chandler</a></li>
                <li><a data-toggle="tab" href="#menu2">Peter</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h2>Mike Ross, Manager</h2>
                    <p>Man, we've been on the road for some time now. Looking forward to lorem ipsum.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h2>Chandler Bing, Guitarist</h2>
                    <p>Always a pleasure people! Hope you enjoyed it as much as I did. Could I BE.. any more pleased?</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h2>Peter Griffin, Bass player</h2>
                    <p>I mean, sometimes I enjoy the show, but other times I enjoy other things.</p>
                </div>
            </div>-->
        </div>
    </section>



    <!-- Container (The Band Section) -->
    <div id="band" class="container text-center">
        <h3>Acerca DE NOSOTROS</h3>
        <p><em>Sitio De Posteo y Contratación de Servicios</em></p>
        <p>Hemos encontrado los problemas que las gente tiene cuando de contratar servicios se refiere, encontrar lo que buscan, y ofrecerles garantias que los hagan sentir más seguros de lo que contratan, y por ser personas con el mismo problema es que
            existe este sitio Diseñado para aquellas personas que buscan ofrecer o contratar un servicio.
        </p>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <p class="text-center"><strong>Seguridad</strong></p><br>
                <a href="#demo" data-toggle="collapse">
                    <img src="../img/seguridad.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                </a>
                <div id="demo" class="collapse">
                    <p>Garantizar Proteccón de información</p>
                    <p>Confidencialidad</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Calidad</strong></p><br>
                <a href="#demo2" data-toggle="collapse">
                    <img src="../img/calidad.png" class="img-circle person" alt="Random Name" width="255" height="255">
                </a>
                <div id="demo2" class="collapse">
                    <p>Servicios de Calidad</p>
                    <p>Quedara satisfecho con los resultados</p>
                </div>
            </div>
            <div class="col-sm-4">
                <p class="text-center"><strong>Date a Conocer</strong></p><br>
                <a href="#demo3" data-toggle="collapse">
                    <img src="../img/date-a-conocer.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                </a>
                <div id="demo3" class="collapse">
                    <p>Ofrece tus servicios rapidamente</p>
                    <p>Contrata rapido</p>
                </div>
            </div>
        </div>
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