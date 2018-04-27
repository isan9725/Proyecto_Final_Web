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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                      </button>
                <a class="navbar-brand" href="#myPage">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.html">HOME</a></li>
                    <!--<li><a href="#tour">Algo</a></li>-->
                    <li><a href="#contact">Servicios Destacados</a></li>-
                    <li><a href="#band">Acerca De Nosotros</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servicios
                          <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Contratar Servicio</a></li>
                            <li><a href="#">Ofrecer Servicio</a></li>
                            <li><a href="#">Ayuda</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form role="form">
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
                <label for="direcicon">Dirección</label>
                <input type="text" class="form-control" id="direccion" placeholder="Dirección">
            </div>
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="text" class="form-control" id="numero" placeholder="Ingresa tu Número de Contacto">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="ejemplo_archivo_1">Adjuntar un archivo</label>
                <input type="file" id="ejemplo_archivo_1">
                <p class="help-block">Ejemplo de texto de ayuda.</p>
            </div>
            <div class="checkbox">
                <label>
                        <input type="checkbox"> Activa esta casilla
                      </label>
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


</body>

</html>