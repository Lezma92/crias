<?php
include("conexion.php");
class funcionesAyudante extends ConexionBD
{
    private $NoRegistro;
    private $datos_registrar;

    function setNoRegistro($numero)
    {
        $this->NoRegistro = $numero;
    }

    function setDatosRegistrar($datos)
    {
        $this->datos_registrar = array(
            "id_crias" => $datos["id_crias"],
            "status_revision" => $datos["status_revision"],
            "tempertura" => $datos["tempertura"],
            "frecuencia_c" => $datos["frecuencia_c"],
            "frecuencia_r" => $datos["frecuencia_r"],
            "frecuencia_s" => $datos["frecuencia_s"],
        );
    }
    function getDatosRegistrar()
    {
        return $this->datos_registrar;
    }
    function addRevisiones()
    {
        $query = $this->getConexion()->prepare("INSERT INTO datosSensores  VALUES (NULL,:id_crias,:tempertura,:frecuencia_c,:frecuencia_r,:frecuencia_s,current_timestamp(),'enviado')");
        $query->bindParam(":id_crias", $this->datos_registrar["id_crias"], PDO::PARAM_INT);
        $query->bindParam(":tempertura", $this->datos_registrar["tempertura"], PDO::PARAM_STR);
        $query->bindParam(":frecuencia_c", $this->datos_registrar["frecuencia_c"], PDO::PARAM_INT);
        $query->bindParam(":frecuencia_r", $this->datos_registrar["frecuencia_r"], PDO::PARAM_INT);
        $query->bindParam(":frecuencia_s", $this->datos_registrar["frecuencia_s"], PDO::PARAM_INT);

        if ($query->execute()) {
            return "ok";
        } else {
            return $query->errorInfo();
        }
    }
    function updateStatusSaludCrias()
    {
        $query = $this->getConexion()->prepare("UPDATE crias SET status_revision = :status_revision WHERE id =:id");
        $query->bindParam(":status_revision", $this->datos_registrar["status_revision"], PDO::PARAM_STR);
        $query->bindParam(":id", $this->datos_registrar["id_crias"], PDO::PARAM_INT);

        if ($query->execute()) {
            return "ok";
        } else {
            return $query->errorInfo();
        }
    }
    function buscarNoRegistro()
    {
        $query = $this->getConexion()->prepare("
        SELECT c.id,c.id_proveedor, c.NoRegistro, c.nombre, c.marmoleo, c.colorMusculo, c.peso, 
            if(ds.tempertura <> '',ds.tempertura,'INF_NULL') AS temp,
            if(ds.frecuencia_c <> '', ds.frecuencia_c,'INF_NULL') AS f_cardiaca,
            if(ds.frecuencia_r <> '', ds.frecuencia_r,'INF_NULL') AS f_respiratoria,
            if(ds.frecuencia_s <> '', ds.frecuencia_s,'INF_NULL') as f_sanguinea,
            if(ds.fecha_revision <> '',ds.fecha_revision,'INF_NULL') AS ultimaRevision
        FROM
            crias AS c
                LEFT JOIN
            datosSensores AS ds ON c.id = ds.id_crias
        WHERE
            c.NoRegistro = :NoRegistro
        ORDER BY ds.fecha_revision DESC LIMIT 10;");

        $query->bindParam(":NoRegistro", $this->NoRegistro, PDO::PARAM_STR);
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        }
    }
}
