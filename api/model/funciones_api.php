<?php
include("conexion.php");
class apiCrias extends ConexionBD
{
    function setDatoClasifTipo($dato)
    {

        $this->datoClasifTipo = $dato;
    }

    function getAllClasificaciones()
    {
        $query = $this->getConexion()->prepare("
            SELECT id,IF(peso >= 15 AND peso <= 25,'GrasaTipo1',(IF(peso < 15 OR peso > 25, 'GrasaTipo2',''))) AS tipoGrasa,
            NoRegistro,nombre, marmoleo, colorMusculo, peso, costo,  descripcion, fecha FROM crias order by tipoGrasa ASC;
        ");

        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        }
    }
    function getClasifGrasaT1()
    {
        $query = $this->getConexion()->prepare("
        SELECT id, NoRegistro, nombre, marmoleo,colorMusculo, peso,
        costo, descripcion, fecha FROM crias WHERE peso >= 15 AND peso <= 25;");
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            }else {
                return "SinDatos";
            }
        }
    }
    function getClasifGrasaT2()
    {
        $query = $this->getConexion()->prepare("
        SELECT id, NoRegistro, nombre, marmoleo,colorMusculo, peso,
        costo, descripcion, fecha FROM crias WHERE peso < 15 OR peso > 25;");
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            }else {
                return "SinDatos";
            }
        }
    }
}
