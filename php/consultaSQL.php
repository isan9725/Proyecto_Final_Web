<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Validacion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>

<body>
    <?php
        $usuario = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));
        $mysqli = new mysqli('localhost', 'root', '', 'Proyecto_Final');
        if(!$mysqli){
            echo "No se pudo realizar la conexión PHP - MySQL"; 
        }
        else{
            $sql = "SELECT USUARIO,PASSWORD  from usuarios_pass where USUARIO = '"
                    .$usuario."' AND PASSWORD = '". $password."'";                   
            
            $resultado = $mysqli->query($sql);

            if($resultado->num_rows>0){
                echo "<h2>Adelante!!!!</h2>"
            }else{
                header("location:../modulos/Login.html");
            }
        }
       

    ?>
</body>
</htnl>