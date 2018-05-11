<?php
    require "operacionesSQL.php";

    session_start();

    if(!isset($_SESSION["usuario"])){
        header("location:../modulos/Login.html");
    }
    if(isset($_POST["id_servicio"])){
        $eliminar = new operacionesSQL();
        $eliminar->delete_Servicios($_POST["id_servicio"]);
    }


?>