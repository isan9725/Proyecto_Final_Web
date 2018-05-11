<?php
    require "connection.php";

    class operacionesSQL_Busqueda extends connection{

        public function OperacionesSQL_Busqueda(){
            parent::__construct();
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
                echo "Linea: " . $e->getLine();
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
                echo "Linea: " . $e->getLine();
            }
        }

        public function consultar_Filas_Servicios($busqueda){
            $sql = "SELECT * FROM servicios WHERE DESCRIPCION LIKE :busqueda OR TITULO LIKE :busqueda OR TIPO_DE_SERVICIO LIKE :busqueda";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $busqueda = "%$busqueda%";

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
            $sql = "SELECT * FROM servicios WHERE DESCRIPCION LIKE :busqueda OR TITULO LIKE :busqueda OR TIPO_DE_SERVICIO LIKE :busqueda LIMIT $empezar_desde, $tamanio_paginas";

            try{
                $resultado = $this->connection_db->prepare($sql);

                $busqueda = "%$busqueda%";

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
                echo "Linea: " . $e->getLine();
            }
        }
        
    }
?>