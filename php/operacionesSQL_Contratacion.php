<?php
    require "connection.php";

    class operacionesSQL_Contratacion extends connection{
                
        public function OperacionesSQL(){
            parent::__construct();
        }

        public function obtener_Usuario_Del_Servicio($id_servicio){
            $sql = "SELECT ID FROM `servicios` WHERE ID_SERVICIO = :id_servicio";

            try{

                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":id_servicio",$id_servicio);

                $resultado->execute();

                $numero_registro = $resultado->rowCount();

                if($numero_registro != 0){
                    $registro = $resultado->fetch(PDO::FETCH_ASSOC);
                    $resultado->closeCursor();
                    return $registro["ID"];
                }else{
                    return null;    
                    echo "No se encontro ningun registro con ese servicio";
                }



            }catch(Exception $e){
                echo "Error; " . $e->getMessage();
                echo "El error esta en la linea: " . $e->getLine();
            }
        }

        public function consulta_email_de_usuario($id_usuario){
            $sql = "SELECT EMAIL FROM usuarios_pass WHERE ID = :id_usuario";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado -> bindValue(":id_usuario",$id_usuario);
                $resultado->execute();               

                $numero_registro = $resultado->rowCount();

                if($numero_registro != 0){
                    $registro = $resultado->fetch(PDO::FETCH_ASSOC);
                    $resultado->closeCursor();
                    return $registro['EMAIL'];
                }else{
                    return null;    
                    echo "No se encontro ningun registro con ese usuario";
                }
            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
                echo "El error esta en la linea: " . $e->getLine();
            }
        }
        
        public function consulta_email_del_cliente($usuario_cliente){
            $sql = "SELECT EMAIL FROM usuarios_pass WHERE USUARIO = :usuario_cliente";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado -> bindValue(":usuario_cliente",$usuario_cliente);
                $resultado->execute();               

                $numero_registro = $resultado->rowCount();

                if($numero_registro != 0){
                    $registro = $resultado->fetch(PDO::FETCH_ASSOC);
                    $resultado->closeCursor();
                    return $registro['EMAIL'];
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