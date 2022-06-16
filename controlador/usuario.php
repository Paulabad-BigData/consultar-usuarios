<?php

    require '../modelo/usuario.php';

    if($_POST){
        $usuario = new Usuario();

        switch($_POST["accion"]){
            case "CONSULTAR":
                echo json_encode($usuario->ConsultarTodo());
                break;
            case "CONSULTAR_ID":
                echo json_encode($usuario->ConsultarPorId($_POST["idUsuario"]));
                break;
            case "GUARDAR":
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $telefono = $_POST["telefono"];
                $direccion = $_POST["direccion"];
                $cargo = $_POST["cargo"];
                $estado = $_POST["estado"];
                $respuesta = $usuario->Guardar($nombres, $apellidos, $telefono, $direccion, $cargo, $estado);
                echo json_encode($respuesta);
                break;
            case "MODIFICAR":
                $nombres = $_POST["nombres"];
                $apellidos = $_POST["apellidos"];
                $telefono = $_POST["telefono"];
                $direccion = $_POST["direccion"];
                $cargo = $_POST["cargo"];
                $estado = $_POST["estado"];
                $idUsuario = $_POST["idUsuario"];
                $respuesta = $usuario->Modificar($idUsuario, $nombres, $apellidos, $telefono, $direccion, $cargo, $estado);
                echo json_encode($respuesta);
                break;
            case "ELIMINAR":
                $idUsuario = $_POST["idUsuario"];
                $respuesta = $usuario->Eliminar($idUsuario);
                echo json_encode($respuesta);
                break;
        }
    }
    

