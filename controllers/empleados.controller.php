<?php

/**
 * Created by Iván Ancallay
 * User: iancallay
 * Date: 2024/8/14
 * Time: 23:37
 */

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}

require_once('../models/empleados.models.php');
error_reporting(1);

//TODO: Instanciar la clase Empleados
$empleados = new Empleados();

switch ($_GET['op']) {

        //TODO: Mostrar todos los empleados
    case 'todosEmpleados':
        $datos = $empleados->todosEmpleados();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todosEmpleados[] = $row;
        }
        echo json_encode($todosEmpleados);
        break;

        //TODO: Mostrar un empleado por id
    case 'unEmpleadoId':
        $empleado_id = $_GET['empleado_id'];
        $datos = $empleados->unEmpleadoId($empleado_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertarEmpleado':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $departamento_id = $_POST['departamento_id'];
        $datos = $empleados->insertarEmpleado($nombre, $apellido, $email, $telefono, $departamento_id);
        echo json_encode($datos);
        break;


    case 'actualizarEmpleado':
        $empleado_id = $_POST['empleado_id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $departamento_id = $_POST['departamento_id'];
        $datos = $empleados->actualizarEmpleado($empleado_id, $nombre, $apellido, $email, $telefono, $departamento_id);
        echo json_encode($datos);
        break;

    case 'eliminarEmpleado':
        $empleado_id = $_POST['empleado_id'];
        $datos = $empleados->eliminarEmpleado($empleado_id);
        echo json_encode($datos);
        break;
}
