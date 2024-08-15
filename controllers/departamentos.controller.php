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

require_once('../models/departamentos.models.php');
error_reporting(0);

$departamentos = new Departamentos();

switch ($_GET['op']) {
    case 'todosDepartamentos':
        $datos = $departamentos->todosDepartamentos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todosDepartamentos[] = $row;
        }
        echo json_encode($todosDepartamentos);
        break;

    case 'unDepartamentoId':
        $departamento_id = $_GET['departamento_id'];
        $datos = $departamentos->unDepartamentoId($departamento_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

    case 'insertarDepartamento':
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $jefe_departamento = $_POST['jefe_departamento'];
        $extension = $_POST['extension'];
        $datos = $departamentos->insertarDepartamento($nombre, $ubicacion, $jefe_departamento, $extension);
        echo json_encode($datos);
        break;

    case 'actualizarDepartamento':
        $departamento_id = $_POST['departamento_id'];
        $nombre = $_POST['nombre'];
        $ubicacion = $_POST['ubicacion'];
        $jefe_departamento = $_POST['jefe_departamento'];
        $extension = $_POST['extension'];
        $datos = $departamentos->actualizarDepartamento($departamento_id, $nombre, $ubicacion, $jefe_departamento, $extension);
        echo json_encode($datos);
        break;

    case 'eliminarDepartamento':
        $departamento_id = $_POST['departamento_id'];
        $datos = $departamentos->eliminarDepartamento($departamento_id);
        echo json_encode($datos);
        break;
}
