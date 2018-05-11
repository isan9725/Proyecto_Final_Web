<?php
require "connection.php";

class operacionesSQL_Modificacion extends connection{

    public function OperacionesSQL(){
        parent::__construct();
    }

    public function consultar_Filas_Servicios_Cliente($id_usuario){
        $sql = "SELECT * FROM `servicios` JOIN `usuarios_pass` WHERE servicios.ID = :id_usuario AND usuarios_pass.ID = :id_usuario";

        try{

            $resultado = $this->connection_db->prepare($sql);

            $resultado->bindValue(":id_usuario",$id_usuario);

            $resultado->execute();

            $numero_registro = $resultado->rowCount();

            if($numero_registro !=0){

                $resultado->closeCursor();
                return $numero_registro;

            }else{
                return null;
            }


        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }

    }

    public function consultar_Servicios_Cliente_Limite($id_usuario,$tamanio_paginas,$empezar_desde){
        $sql = "SELECT * FROM `servicios` JOIN `usuarios_pass` WHERE servicios.ID = :id_usuario AND usuarios_pass.ID = :id_usuario LIMIT $empezar_desde, $tamanio_paginas";

        try{
            $resultado = $this->connection_db->prepare($sql);

            $resultado->bindValue(":id_usuario",$id_usuario);

            $resultado->execute();

            $numero_registro = $resultado->rowCount();

            if($numero_registro !=0){
                $registro = $resultado->fetchAll(PDO::FETCH_ASSOC);
                $resultado->closeCursor();
                return $registro;
            }else{
                return null;
            }

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }
    }

    public function obtener_Servicios_Usuario($id_servicio){
        $sql = "SELECT * FROM `servicios` WHERE ID_SERVICIO = :id_servicio";

        try{

            $resultado = $this->connection_db->prepare($sql);

            $resultado->bindValue(":id_servicio",$id_servicio);

            $resultado->execute();

            $numero_registro = $resultado->rowCount();

            if($numero_registro != 0){
                $registro = $resultado->fetch(PDO::FETCH_ASSOC);
                $resultado->closeCursor();
                return $registro;
            }else{
                return null;    
                echo "No se encontro ningun registro con ese usuario";
            }



        }catch(Exception $e){
            echo "Error; " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }
    }

    public function update_Servicios_ConFoto($titulo,$direccion,$numero,$descripcion,$foto,$id_servicio){
        $sql = "UPDATE `servicios` SET TITULO = :titulo, DIRECCION = :direccion, NUMERO = :numero, DESCRIPCION = :descripcion, FOTO = :foto WHERE ID_SERVICIO = :id_servicio";

        try{

            $resultado = $this->connection_db->prepare($sql);

            $resultado->bindValue(":titulo",$titulo);
            $resultado->bindValue(":direccion",$direccion);
            $resultado->bindValue(":numero",$numero);
            $resultado->bindValue(":descripcion",$descripcion);
            $resultado->bindValue(":foto",$foto);
            $resultado->bindValue(":id_servicio",$id_servicio);

            $resultado->execute();
            if($resultado){
                $resultado->closeCursor();

                echo "<script languaje='javascript'>\n";
                echo "    alert('Servicio Modificado Con Exito');\n";
                echo "    location.href = 'home_registrados.php';\n";
                echo "</script>\n";        
            }else{
                echo "<script languaje='javascript'>\n";
                echo "    alert('Fallo en actualizar el Servicio');\n";
                echo "    location.href = 'home_registrados.php';\n";
                echo "</script>\n";        
            }


        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }
    }
    public function update_Servicios_SinFoto($titulo,$direccion,$numero,$descripcion,$id_servicio){
        $sql = "UPDATE `servicios` SET TITULO = :titulo, DIRECCION = :direccion, NUMERO = :numero, DESCRIPCION = :descripcion WHERE ID_SERVICIO = :id_servicio";

        try{

            $resultado = $this->connection_db->prepare($sql);

            $resultado->bindValue(":titulo",$titulo);
            $resultado->bindValue(":direccion",$direccion);
            $resultado->bindValue(":numero",$numero);
            $resultado->bindValue(":descripcion",$descripcion);
            $resultado->bindValue(":id_servicio",$id_servicio);

            $resultado->execute();
            if($resultado){
                $resultado->closeCursor();

                echo "<script languaje='javascript'>\n";
                echo "    alert('Servicio Modificado Con Exito');\n";
                echo "    location.href = 'home_registrados.php';\n";
                echo "</script>\n";        
            }else{
                echo "<script languaje='javascript'>\n";
                echo "    alert('Fallo en actualizar el Servicio');\n";
                echo "    location.href = 'home_registrados.php';\n";
                echo "</script>\n";        
            }


        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }
    }

    public function delete_Servicios($id_servicio){
        $sql = "DELETE FROM `servicios` WHERE ID_SERVICIO = :id_servicio";

        try{

            $resultado = $this->connection_db->prepare($sql);

            $resultado->bindValue(":id_servicio",$id_servicio);

            $resultado->execute();

            $resultado->closeCursor();

            echo "<script languaje='javascript'>\n";
            echo "    alert('Servicio Eliminado Con Exito');\n";
            echo "    location.href = 'home_registrados.php';\n";
            echo "</script>\n";        

        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }
    }

    public function consulta_Id($usuario){
        $sql = "SELECT ID FROM usuarios_pass WHERE USUARIO = :usuario";

        try{
            $resultado = $this->connection_db->prepare($sql);

            $resultado -> bindValue(":usuario",$usuario);
            $resultado->execute();               

            $numero_registro = $resultado->rowCount();

            if($numero_registro != 0){
                $registro = $resultado->fetch(PDO::FETCH_ASSOC);
                $resultado->closeCursor();
                return $registro['ID'];
            }else{
                return null;    
                echo "No se encontro ningun registro con ese usuario";
            }
        }catch(Exception $e){
            echo "Error: " . $e->getMessage();
            echo "El error esta en la linea: " . $e->getLine();
        }
    }

}

?>