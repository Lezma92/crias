<?php
class ConexionBD
{
    private $name_bd;
    private $user;
    private $password;
    private $servidor;


    function __construct()
    {
        $this->servidor = "localhost";
        $this->user = "root";
        $this->name_bd = "crias";
        $this->password = "";
    }

    function getConexion()
    {
        try {
            $opciones = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false];
            $con = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->name_bd . "", $this->user, $this->password, $opciones);
            $con->exec("set names utf8");
            return $con;
        } catch (PDOException $ex) {
            print_r("Error de conexion: " . $ex->getMessage());
        }
    }
}
