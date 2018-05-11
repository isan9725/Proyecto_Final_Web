<?php
    require "operacionesSQL_Contratacion.php";
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("location:../modulos/Login.html");
    }

    if($_POST["mensaje"] == "" || $_POST["direccion-email"] == "" || $_POST["asunto"] == "" || $_POST["id_servicio"] == ""){
        echo "insertar javascript";
        header("location:contratar.php");
    }else{

    

        $texto_mail = $_POST["mensaje"] . "\r\n";
        $asunto = $_POST["asunto"];
        $id_servicio = $_POST["id_servicio"];
        $usuario_cliente = $_SESSION["usuario"];

        $consultar_usuario_del_post = new operacionesSQL();

        $id_usuario_del_servicio = $consultar_usuario_del_post->obtener_Usuario_Del_Servicio($id_servicio);

        $email_del_usuario_del_servicio = $consultar_usuario_del_post->consulta_email_de_usuario($id_usuario_del_servicio);
        $email_del_usuario_cliente = $consultar_usuario_del_post->consulta_email_del_cliente($usuario_cliente);

        $texto_mail.= "Un usuario Solicita tu servicio Contactar por $email_del_usuario_cliente";


        $headers="MIME-Version: 1.0\r\n";

        $headers.="Content-type: text/html; charset=iso-8859-1\r\n";
        $headers.="From: Proyecto Final < proyecto_final875@gmail.com >\r\n";
        
        $exito = mail($email_del_usuario_del_servicio,$asunto,$texto_mail,$headers);

        if($exito){
            echo "agregar javascript";
            header("location:contratar.php");
        }else{
            echo "Algo paso";
        }
    }
?>