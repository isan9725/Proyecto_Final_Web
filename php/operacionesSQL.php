<?php
    require "connection.php";

    class OperacionesSQL extends connection{


        public function OperacionesSQL(){
            parent::__construct();
        }
        
        public function insertar_Servicios($id,$titulo,$tipo_de_servicio,$direccion,$numero,$descripcion,$foto){
            $sql = "INSERT INTO servicios (ID,TITULO,TIPO_DE_SERVICIO,DIRECCION,NUMERO,DESCRIPCION,FOTO) VALUES(:id,:titulo,:tipo_de_servicio,:direccion,:numero,:descripcion,:foto)";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":id",$id);
                $resultado->bindValue(":titulo",$titulo);
                $resultado->bindValue(":tipo_de_servicio",$tipo_de_servicio);
                $resultado->bindValue(":direccion",$direccion);
                $resultado->bindValue(":numero",$numero);
                $resultado->bindValue(":descripcion",$descripcion);
                $resultado->bindValue(":foto",$foto);

                $resultado->execute();

                if($resultado){
                    $resultado->closeCursor();
                    echo "<script languaje='javascript'>\n";
                    echo "    alert('Servicio Agregado Con Exito');\n";
                    echo "    location.href = 'home_registrados.php';\n";
                    echo "</script>\n";     
                }else{
                    echo "<script languaje='javascript'>\n";
                    echo "    alert('No Se Puedo Agregar El Servicio');\n";
                    echo "    location.href = 'home_registrados.php';\n";
                    echo "</script>\n";
                }


            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
                echo "Linea: " . $e->getLine();
            }
        }
        public function insertar_Usuario($usuario,$password,$nombre,$apellido,$email){
            $sql = "INSERT INTO usuarios_pass (ID, USUARIO, PASSWORD, NOMBRE, APELLIDO, EMAIL) VALUES (NULL,:usuario,:password,:nombre,:apellido,:email)";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":usuario",$usuario);
                $resultado->bindValue(":password",$password);
                $resultado->bindValue(":nombre",$nombre);
                $resultado->bindValue(":apellido",$apellido);
                $resultado->bindValue(":email",$email);

                $resultado->execute();

                if($resultado){
                    $resultado->closeCursor();
                    echo "<script languaje='javascript'>\n";
                    echo "    alert('Cuenta Agregada Con Exito');\n";
                    echo "    location.href = '../modulos/Login.html';\n";
                    echo "</script>\n";        
                    #header("location:../modulos/Login.html");
                }
                else{

                    #me falta validar los campos

                }
                

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

        public function validar_Login($usuario,$password){
            $sql = "SELECT * FROM usuarios_pass WHERE USUARIO=:usuario AND PASSWORD= :password";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":usuario",$usuario);
                $resultado->bindValue(":password",$password);

                $resultado->execute();
                $numero_registro = $resultado->rowCount();

                if($numero_registro != 0){
                    
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    $resultado->closeCursor();
                    header("location:home_registrados.php");

                }else{
                    $resultado->closeCursor();
                    header("location:../modulos/Login.html");
                }
            $this->connection_db = null;

            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
                echo "El error esta en la linea: " . $e->getLine();
            }

            


        }

        
    }
?>