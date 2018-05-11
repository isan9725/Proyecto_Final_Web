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

        require "operacionesSQL.php";

        $usuario = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));

        $login = new operacionesSQL();

        $login->validar_Login($usuario,$password);


        /*$mysqli = new mysqli('localhost', 'root', '', 'Proyecto_Final');
        if($mysqli->connect_errno){
            echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
        }
        else{
            $usuario = htmlentities(addslashes($_POST["usuario"]));
            $password = htmlentities(addslashes($_POST["password"]));
            $sql = "SELECT USUARIO,PASSWORD from usuarios_pass where USUARIO = $usuario AND PASSWORD = $password ";                   
            try{
                $resultado = $mysqli_query($sql);
            }catch(Exception $e){
                echo "Error: " . $e;
            }
            

            $fila = $resultado->fetch_assoc();
            echo $fila['_msg'];

            if($resultado->num_rows>0){
                echo "<h2>Adelante!!!!</h2>";
            }else{
                header("location:../modulos/Login.html");
            }
        }

        try{
            $base = new PDO("mysql:host=localhost; dbname=proyecto_final", "root", "");
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM usuarios_pass WHERE USUARIO=:usuario AND PASSWORD= :password";

            $resultado = $base->prepare($sql);
            $usuario = htmlentities(addslashes($_POST["usuario"]));
            $password = htmlentities(addslashes($_POST["password"]));

            $resultado->bindValue(":usuario",$usuario);
            $resultado->bindValue(":password",$password);

            $resultado->execute();
            $numero_registro = $resultado->rowCount();

            if($numero_registro != 0){
                echo "<h2>Adelante!!!!</h2>";

            }else{
                header("location:../modulos/Login.html");
            }

        }catch(Exception $e){
            die("Error: " . $e->getMessage());
        }*/

       

    ?>
</body>
</htnl>