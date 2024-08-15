<?php

class ClaseConectar
{

    public $conexion;
    protected $db;

    //TODO: Datos para la conexion a la base de datos
    private $db_host = "www.ioasystem.com"; //TODO: Servidor remoto de la base de datos
    private $db_user = "ioasyste_iaproject";
    private $db_password = "d,!4{bTrbYzz";
    private $db_name = "ioasyste_evap1";

    //TODO: Metodo para conectar al servidor y la base de datos
    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        mysqli_set_charset($this->conexion, "utf8");

        if ($this->conexion->connect_error) {
            die("Error al conectar al servidor: " . $this->conexion->connect_error);
        }

        $this->db = $this->conexion;
        if ($this->db === false) {
            die("Error: No se pudo conectar a la base. " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }
}
