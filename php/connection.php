<?php

class Connection{

    protected $connection_db;

    public function Connection(){
        try{
            $this->connection_db = new PDO('mysql:host=localhost; dbname=proyecto_final', 'root', '');

            $this->connection_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connection_db->exec("SET CHARACTER SET utf8");

            $this->connection_db;


        }catch(Exception $e){
            echo "Error: " . $e->getMessage() . "<br/>";
            echo "La Linea Del Error Es: " . $e->getLine();
        }
    }

}

?>