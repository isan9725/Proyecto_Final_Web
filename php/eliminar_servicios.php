<?php
    require "operacionesSQL_Modificacion.php";

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("location:../modulos/Login.html");
    }
    if(isset($_POST["id_servicio"])){
        $eliminar = new operacionesSQL_Modificacion();
        $eliminar->delete_Servicios($_POST["id_servicio"]);
    }


?>