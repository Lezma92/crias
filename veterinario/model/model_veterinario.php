<?php
include("conexion.php");

class modeloVeterinario extends ConexionBD
{
    private $status_cria;
    private $idCria;
    private $id_sensores;

    function setDatosStatusCria($status, $id_sensor, $idCria)
    {
        $this->status_cria  = $status;
        $this->id_sensores  = $id_sensor;
        $this->idCria  = $idCria;
    }

    function getStatusRecientes()
    {
        $query = $this->getConexion()->prepare("
                SELECT 
                    c.id, ds.id AS idSensores, c.NoRegistro, ds.tempertura,
                    ds.frecuencia_c, ds.frecuencia_r, ds.frecuencia_s, 
                    IF((ds.tempertura >= 37.5 AND ds.tempertura <= 39.5)
                    AND (ds.frecuencia_c >= 70 AND ds.frecuencia_c <= 80)
                    AND (ds.frecuencia_r >= 15 AND ds.frecuencia_r <= 20)
                    AND (ds.frecuencia_s >= 8  AND ds.frecuencia_s <= 10),
                    'Cria saludable', 'Cria por enfermar') AS estadoSalud,
                    ds.status_rev,MAX(ds.fecha_revision) AS ult_revision
                FROM
                    crias AS c INNER JOIN datosSensores AS ds ON c.id = ds.id_crias
                    AND ds.status_rev = 'enviado'
                GROUP BY c.NoRegistro 
                ORDER BY estadoSalud ASC , ds.fecha_revision ASC;
            ");


        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        } else {
            return $query->errorInfo();
        }
    }

    function getCriasCuarentena()
    {
        $query  = $this->getConexion()->prepare("select * from crias where status_revision = 'cuarentena';");
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        } else {
            return $query->errorInfo();
        }
    }

    function getHistorialCria($registro)
    {
        $query  = $this->getConexion()->prepare("SELECT 
        ds.id AS idSensores,
        c.NoRegistro,
        ds.status_rev,
        ds.tempertura,
        ds.frecuencia_c,
        ds.frecuencia_r,
        ds.frecuencia_s,
        ds.fecha_revision,
        IF((ds.tempertura >= 37.5
                AND ds.tempertura <= 39.5)
                AND (ds.frecuencia_c >= 70
                AND ds.frecuencia_c <= 80)
                AND (ds.frecuencia_r >= 15
                AND ds.frecuencia_r <= 20)
                AND (ds.frecuencia_s >= 8
                AND ds.frecuencia_s <= 10),
            'Cria saludable',
            'Cria por enfermar') AS estadoSalud
    FROM
        datosSensores AS ds
            INNER JOIN
        crias AS c ON ds.id_crias = c.id
    WHERE
        c.NoRegistro = :registro order by ds.fecha_revision DESC;");

        $query->bindParam(":registro", $registro, PDO::PARAM_STR);

        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        } else {
            return $query->errorInfo();
        }
    }

    function updateStatusSensores()
    {
        $query  = $this->getConexion()->prepare("UPDATE datosSensores SET status_rev = 'revisado' WHERE id = :id;");
        $query->bindParam(":id", $this->id_sensores, PDO::PARAM_INT);

        if ($query->execute()) {
            return "ok";
        }
    }
    function updateStatusCria()
    {
        $query  = $this->getConexion()->prepare("UPDATE crias SET status_revision = :status_revision WHERE id = :id;");
        $query->bindParam(":status_revision", $this->status_cria, PDO::PARAM_STR);
        $query->bindParam(":id", $this->idCria, PDO::PARAM_INT);

        if ($query->execute()) {
            return "ok";
        }
    }
}
