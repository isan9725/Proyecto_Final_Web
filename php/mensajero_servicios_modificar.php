<?php
    require "operacionesSQL_Modificacion.php";

    if( isset($_POST["titulo"]) && isset($_POST["direccion"]) && isset($_POST["numero"]) && isset($_POST["descripcion"]) && isset($_POST["id_servicio"]) ){

        if($_FILES['imagen']['name'] != null && $_FILES['imagen']['size'] > 0){
            $titulo = htmlentities(addslashes($_POST["titulo"]));
            $direccion = htmlentities(addslashes($_POST["direccion"]));
            $numero = htmlentities(addslashes($_POST["numero"]));
            $descripcion = htmlentities(addslashes($_POST["descripcion"]));
            $id_servicio = $_POST["id_servicio"];
            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tamanio_imagen = $_FILES['imagen']['size'];
            session_start();
            $usuario = $_SESSION["usuario"];

            if($tamanio_imagen <= 2500000){
                if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg" || $tipo_imagen == "image/png"){
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads/';

                    move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);

                    $modificar_servicio = new operacionesSQL_Modificacion();

                    $modificar_servicio -> update_Servicios_ConFoto($titulo,$direccion,$numero,$descripcion,$nombre_imagen,$id_servicio);

                }else{
                    echo "no es el formato requerido para subir su imagen";
                }
            }else{
                echo "el tamaño de la imagen es demasiado grande";
            }

        }else{
            

            $titulo = htmlentities(addslashes($_POST["titulo"]));
            $direccion = htmlentities(addslashes($_POST["direccion"]));
            $numero = htmlentities(addslashes($_POST["numero"]));
            $descripcion = htmlentities(addslashes($_POST["descripcion"]));
            $id_servicio = $_POST["id_servicio"];

            $modificar_servicio = new operacionesSQL_Modificacion();

            $modificar_servicio -> update_Servicios_SinFoto($titulo,$direccion,$numero,$descripcion,$id_servicio);
        }
        
    }

?>