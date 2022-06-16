<?php

    require 'conexion.php';

    class Usuario{

        public function ConsultarTodo(){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM usuarios");
            $stmt->excute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function ConsultarPorId($idUsuario){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE idUsuario = :idUsuario");
            $stmt->bindValue(":idUsuario", $idUsuario, PDO::PARAM_INT);
            $stmt->excute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }


        public function Guardar($nombres, $apellidos, $telefono, $direccion, $cargo, $estado){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("INSERT INTO `usuarios`(`nombres`, `apellidos`, `telefono`, `direccion`, `cargo`, `estado`) VALUES (:nombres, :apellidos, :telefono, :direccion, :cargo, :estado);");
            $stmt->bindValue(":nombres", $nombres, PDO::PARAM_STR);
            $stmt->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindValue("telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindValue(":cargo", $cargo, PDO::PARAM_STR);
            $stmt->bindValue(":estado", $estado, PDO::PARAM_INT);

            if($stmt->execute()){
                return "Registro Exitoso";
            }else{
                return "Error al guardar información";
            }
        }

        public function Modificar($idUsuario, $nombres, $apellidos, $telefono, $direccion, $cargo, $estado){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("UPDATE `usuarios` SET `nombres`= :nombres,`apellidos`= :apellidos,`telefono`= :telefono,`direccion`= :direcccion,`cargo`= :cargo,`estado`= :estado WHERE `idUsuario`= :idUsuario;");
            $stmt->bindValue(":nombres", $nombres, PDO::PARAM_STR);
            $stmt->bindValue(":apellidos", $apellidos, PDO::PARAM_STR);
            $stmt->bindValue("telefono", $telefono, PDO::PARAM_STR);
            $stmt->bindValue(":direccion", $direccion, PDO::PARAM_STR);
            $stmt->bindValue(":cargo", $cargo, PDO::PARAM_STR);
            $stmt->bindValue(":estado", $estado, PDO::PARAM_INT);
            $stmt->bindValue(":idUsuario", $idUsuario, PDO::PARAM_INT);

            if($stmt->execute()){
                return "Registro Modificado";
            }else{
                return "Error al modificar información";
            }
        }

        public function Eliminar($idUsuario){
            $conexion = new Conexion();
            $stmt = $conexion->prepare("DELETE FROM persona WHERE idUsuario = :ideUsuario;");
            $stmt->bindValue(":idUsuario", $idUsuario, PDO::PARAM_INT);

            if($stmt->execute()){
                return "Registro Eliminado";
            }else{
                return "Error al eliminar información";
            }
        }
    }