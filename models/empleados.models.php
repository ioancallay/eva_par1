<?php

require_once('../config/conexion.php');

class Empleados
{

    //TODO: Metodo para cargar todos los Empleados
    public function todosEmpleados()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Empleados";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    //TODO: Metodo para buscar un empleado por Id
    public function unEmpleadoId($empleado_id)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Empleados WHERE empleado_id = $empleado_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();

        return $datos;
    }

    //TODO: Metodo para agregar un empleado
    public function insertarEmpleado($nombre, $apellido, $email, $telefono, $departamento_id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO Empleados (nombre, apellido, email, telefono, departamento_id) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$departamento_id')";
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

    //TODO: Metodo para actualizar un empleado
    public function actualizarEmpleado($empleado_id, $nombre, $apellido, $email, $telefono, $departamento_id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE Empleados SET nombre = '$nombre', apellido = '$apellido', email = '$email', telefono = '$telefono', departamento_id = '$departamento_id' WHERE empleado_id = $empleado_id";
            if (mysqli_query($con, $cadena)) {
                return $empleado_id;
            } else {
                return "error: " . $con->error;
            }
        } catch (Exception $e) {
            return "error: " . $e->getMessage();
        } finally {
            $con->close();
        }
    }

    //TODO: Metodo para eliminar un empleado
    public function eliminarEmpleado($empleado_id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM Empleados WHERE empleado_id = $empleado_id";
            if (mysqli_query($con, $cadena)) {
                return $empleado_id;
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
