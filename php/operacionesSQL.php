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

        public function consultar_Filas_Servicios($busqueda){
            $sql = "SELECT * FROM servicios WHERE DESCRIPCION LIKE %:busqueda% OR TITULO LIKE %:busqueda% OR TIPO_DE_SERVICIO LIKE %:busqueda%";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":busqueda",$busqueda);

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
            }
        }
        public function consultar_Servicios_Limite($busqueda,$tamanio_paginas,$empezar_desde){
            $sql = "SELECT * FROM servicios WHERE DESCRIPCION LIKE %:busqueda% OR TITULO LIKE %:busqueda% OR TIPO_DE_SERVICIO LIKE %:busqueda% LIMIT $empezar_desde, $tamanio_paginas";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":busqueda",$busqueda);

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
            }
        }

        public function consultar_Servicios_Por_Categorias_Limite($tipo_De_Servicio,$tamanio_paginas,$empezar_desde)
        {
            $sql = "SELECT * FROM `servicios` WHERE TIPO_DE_SERVICIO = :tipo_de_servicio LIMIT $empezar_desde, $tamanio_paginas";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":tipo_de_servicio",$tipo_De_Servicio);

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
        public function consultar_Filas_Servicios_Por_Categorias($tipo_De_Servicio)
        {
            $sql = "SELECT * FROM `servicios` WHERE TIPO_DE_SERVICIO = :tipo_de_servicio";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":tipo_de_servicio",$tipo_De_Servicio);

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
            }
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
            }
        }

        public function delete_Servicios($id_servicio){
            $sql = "DELETE FROM `servicios` WHERE ID_SERVICIO = :id_servicio";

            try{

                $resultado = $this->connection_db->prepare($sql);

                $resultado->bindValue(":id_usuario",$id_usuario);

                $resultado->execute();

                $resultado->closeCursor();

                echo "<script languaje='javascript'>\n";
                echo "    alert('Servicio Eliminado Con Exito');\n";
                echo "    location.href = 'home_registrados.php';\n";
                echo "</script>\n";        

            }catch(Exception $e){
                echo "Error: " . $e->getMessage();
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
                $resultado->bindValue(":id_usuario",$id_servicio);

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
                $resultado->bindValue(":id_usuario",$id_servicio);

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
            }
        }


        public function obtener_Servicios_Usuario($id_servicio){
            $sql = "SELECT * FROM `servicios` WHERE ID_SERVICIO = :id:servicio";

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
            }
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
            }
        }
        
    }
?>