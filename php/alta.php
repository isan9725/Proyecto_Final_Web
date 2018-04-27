<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/home.css">
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
                    <li><a href="../modulos/Login.html"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
  <h2>Crear Cuenta</h2>
  <form>
  <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" placeholder="Ingresa Tu Nombre">
    </div>
  <div class="form-group">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" id="apellido" placeholder="Ingresa Tu Apellido">
    </div>
  <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Ingresa Tu correo">
    </div>
    <div class="form-group">
      <label for="usuario">Usuario</label>
      <input type="text" class="form-control" id="usuario" placeholder="Ingresa Tu usuario">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Ingresa Tu password">
    </div>
    <button type="submit" class="btn btn-default">Crear Cuenta</button>
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
