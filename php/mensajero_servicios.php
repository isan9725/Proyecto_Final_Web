<?php
    require "operacionesSQL.php";

    if(isset($_POST["servicios"]) && isset($_POST["titulo"]) && isset($_POST["direccion"]) && isset($_POST["numero"]) && isset($_POST["descripcion"]) && $_FILES['imagen'] != null ){
        $tipo_servicio = $_POST["servicios"];
        $titulo = htmlentities(addslashes($_POST["titulo"]));
        $direccion = htmlentities(addslashes($_POST["direccion"]));
        $numero = htmlentities(addslashes($_POST["numero"]));
        $descripcion = htmlentities(addslashes($_POST["descripcion"]));
        $nombre_imagen = $_FILES['imagen']['name'];
        $tipo_imagen = $_FILES['imagen']['type'];
        $tamanio_imagen = $_FILES['imagen']['size'];
        session_start();
        $usuario = $_SESSION["usuario"];

        if($tamanio_imagen <= 2500000){
            if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png"){
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads/';

                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);

                $agregar_servicio = new operacionesSQL();

                $id = $agregar_servicio->consulta_Id($usuario);

                $agregar_servicio -> insertar_Servicios($id,$titulo,$tipo_servicio,$direccion,$numero,$descripcion,$nombre_imagen);

            }else{
                echo "no es el formato requerido para subir su imagen";
            }
        }else{
            echo "el tamaño de la imagen es demasiado grande";
        }
    }

?>