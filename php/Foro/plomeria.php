<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plomería</title>
</head>

 <body style="background: #00BDD1;">
 <?php
        session_start();

        if(!isset($_SESSION["usuario"])){
            header("location:../modulos/Login.html");
        }
?>

        <div align="center" style="background: #044799; color: white;">
        <h1>FORO</h1> 
        </div>

<div>
<form action="plomeria.php" name="empleado" method="post" enctype="multipart/form-data">
    <a href="header.html"><h3>Inicio</h3></a> <br>
     <table align="center"> 
                 <p> <tr><td><h4>Añadir tema</h4></td>

                  <p> <tr><td>Nombre: </td>
                    <td><input type="text" name="nombre" id="nombre" /> </p> </td> </tr>

                  <p> <tr><td>Tema: </td>
                    <td><input type="text" name="tema" id="tema"></td></tr>
                    

                   <p> <tr><td>Descripción: </td>
                 <td><textarea rows="10" cols="40" name="descripcion" id="descripcion"></textarea></p></td></tr>
                 
                 <tr><td> <input type="submit" name="benviar" value="Enviar"/></td></tr>

                    </table>
</form>
</div>
<br>
  
<?php

    $nombre = $_POST["nombre"];
    $tema = $_POST["tema"];
    $descripcion = $_POST["descripcion"];

    if($nombre != null || $tema = null || $descripcion != null){

        $mysql = new mysqli('localhost', 'root', '', 'proyecto_final');

        $sql = "INSERT INTO foro_foro(nombre, tema, descripcion, id_forocategoria) VALUES ('$nombre','$tema','$descripcion', '1')";

        mysqli_query("SET NAMES 'utf8'");

        if($agregaTema){
            echo "<br>¡Tu tema ha sido agregado correctamente!</br>";

        } else {
            echo "Error al agregar tema";

        }
    } else {
        echo "No se ha caputrado información</br>";
        echo "<a href='indexplomeria.php'>Volver/a></br>";
        //echo "<a href='index.html'>Ir a inicio</a></br>";
    }

    $sql = "SELECT nombre, tema, descripcion FROM foro_foro WHERE id_forocategoria='1'";

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
</body>
</html>

  