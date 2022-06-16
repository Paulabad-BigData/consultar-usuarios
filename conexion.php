<?php

    class Conexion extends PDO{
        public function __construct(){
            try{
                parent::__construct("mysql:host=localhost;dbname=consulta_usuarios", "", "");
                parent::exec("set names utf8");
            }catch(PDOExepction $e){
                echo "Error al conectar " . $e->getMenssage();
                exit;
            }
        }
    }