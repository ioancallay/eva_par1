<?php
require_once('../config/conexion.php');

class Departamentos
{

    //TODO: Metodo para mostrar todos los Departamentos
    public function todosDepartamentos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Departamentos";
        // $cadena = "SELECT * FROM Departamentos d JOIN Empleados e ON d.jefe_departamento = e.empleado_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //TODO: Metodo para buscar un departamento por Id
    public function unDepartamentoId($departamento_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Departamentos WHERE departamento_id = $departamento_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //TODO: Metodo para agregar un departamento
    public function insertarDepartamento($nombre, $ubicacion, $jefe_departamento, $extension)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO Departamentos (nombre, ubicacion, jefe_departamento, extension) VALUES ('$nombre', '$ubicacion', '$jefe_departamento', '$extension')";

            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return "error: " . $con->error;
            }
        } catch (Exception $e) {
            return "error: " . $e->getMessage();
        } finally {
            $con->close();
        }
    }

    //TODO: Metodo para actualizar un departamento
    public function actualizarDepartamento($departamento_id, $nombre, $ubicacion, $jefe_departamento, $extension)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE Departamentos SET nombre = '$nombre', ubicacion = '$ubicacion', jefe_departamento = '$jefe_departamento', extension = '$extension' WHERE departamento_id = $departamento_id";

            if (mysqli_query($con, $cadena)) {
                return $departamento_id;
            } else {
                return "error: " . $con->error;
            }
        } catch (Exception $e) {
            return "error: " . $e->getMessage();
        } finally {
            $con->close();
        }
    }

    //TODO: Metodo para eliminar un departamento
    public function eliminarDepartamento($departamento_id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM Departamentos WHERE departamento_id = $departamento_id";

            if (mysqli_query($con, $cadena)) {
                return $departamento_id;
            } else {
                return "error: " . $con->error;
            }
        } catch (Exception $e) {
            return "error: " . $e->getMessage();
        } finally {
            $con->close();
        }
    }
}
