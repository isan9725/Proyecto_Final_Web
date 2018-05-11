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
                    <li><a href="../modulos/Login.html"><span class="glyphicon glyphicon-plus"></span>Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
  <h2>Crear Cuenta</h2>
  <form name="altaUsuario" action="" method="post" enctype="multipart/form-data" id="altaUsuario">
  <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingresa Tu Nombre">
    </div>
  <div class="form-group">
      <label for="apellido">Apellido</label>
      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingresa Tu Apellido">
    </div>
  <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa Tu correo">
    </div>
    <div class="form-group">
      <label for="usuario">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresa Tu usuario">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="password" placeholder="Ingresa Tu password">
    </div>
    <button type="submit" class="btn btn-default">Crear Cuenta</button>
  </form>
</div>
<?php
require "operacionesSQL.php";

if(isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"])){
    $usuario = htmlentities(addslashes($_POST["usuario"]));
    $password = htmlentities(addslashes($_POST["password"]));
    $nombre = htmlentities(addslashes($_POST["nombre"]));
    $apellido = htmlentities(addslashes($_POST["apellido"]));
    $email = htmlentities(addslashes($_POST["email"]));

    $agregarUsuario = new operacionesSQL();

    $agregarUsuario->insertar_Usuario($usuario,$password,$nombre,$apellido,$email);
}




/*try{
    $base = new PDO("mysql:host=localhost; dbname=proyecto_final", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql = "SELECT * FROM usuarios_pass WHERE USUARIO=:usuario AND PASSWORD= :password";
    $sqlInsercion = "INSERT INTO usuarios_pass (ID, USUARIO, PASSWORD, NOMBRE, APELLIDO, EMAIL) VALUES (NULL,:usuario,:password,:nombre,:apellido,:email)";

    $resultado = $base->prepare($sqlInsercion);
    if(isset($_POST["usuario"]) && isset($_POST["password"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"])){
        $usuario = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));
        $nombre = htmlentities(addslashes($_POST["nombre"]));
        $apellido = htmlentities(addslashes($_POST["apellido"]));
        $email = htmlentities(addslashes($_POST["email"]));

        $resultado->bindValue(":usuario",$usuario);
        $resultado->bindValue(":password",$password);
        $resultado->bindValue(":nombre",$nombre);
        $resultado->bindValue(":apellido",$apellido);
        $resultado->bindValue(":email",$email);

        $resultado->execute();

        if($resultado){
           ?>
            <script type="text/javascript">alert('Cuenta Agregada Con Exito');</script>
            <?php  
            header("location:../index.html");
        }
        else{

        }

    }   
}catch(Exception $e){
    die("Error: " . $e->getMessage());
}finally{
    $base = null;
}*/


?>

<footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
        <p>Proyecto Final Desarrollo Web <a data-toggle="tooltip" title="Visit w3schools">Informes</a></p>
    </footer>

</body> 
</html>
