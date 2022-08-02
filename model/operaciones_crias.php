<?php
include("conexion.php");
class operacionesCrias extends ConexionBD
{
    private $datos_cria;
    function setDatosCrias($datos)
    {
        $this->datos_cria = array(
            "id_proveedor" => $datos["id_proveedor"],
            "NoRegistro" => $datos["NoRegistro"],
            "nombre" => $datos["nombre"],
            "marmoleo" => $datos["marmoleo"],
            "colorMusculo" => $datos["colorMusculo"],
            "peso" => $datos["peso"],
            "descripcion" => $datos["descripcion"],
            "costo" => $datos["costo"],
        );
    }

    function getNoFolio()
    {
        $query = $this->getConexion()->prepare("SELECT COUNT(id) as TotalIDS from crias;");
        if ($query->execute()) {
            return $query->fetch();
        } else {
            return "REG-0001";
        }
    }
    function getDatosBDCrias()
    {
        $query = $this->getConexion()->prepare("SELECT * FROM crias WHERE date(fecha) = CURDATE() ORDER BY id ASC");
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        }
    }
    function getDatoUpadte($id)
    {
        $query = $this->getConexion()->prepare("SELECT * FROM crias WHERE NoRegistro = :id");
        $query -> bindParam(":id",$id,PDO::PARAM_STR);
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetch();
            } else {
                return "SinDatos";
            }
        }
    }

    function getAllDatosBDCrias()
    {
        $query = $this->getConexion()->prepare("SELECT * FROM crias;");
        if ($query->execute()) {
            if ($query->rowCount() > 0) {
                return $query->fetchAll();
            } else {
                return "SinDatos";
            }
        }
    }


    function addDatosCrias()
    {
        try {
            $query = $this->getConexion()->prepare("INSERT INTO crias (id_proveedor,NoRegistro,nombre,marmoleo,colorMusculo,peso,costo,descripcion,fecha) VALUES(:ID_PROV,:NoRegistro,:NOMBRE,:MARMOLEO,:COLOR_MUSCUL,:PESO,:COSTO,:DESCRIP,current_timestamp())");
            $query->bindParam(":ID_PROV", $this->datos_cria["id_proveedor"], PDO::PARAM_INT);
            $query->bindParam(":NoRegistro", $this->datos_cria["NoRegistro"], PDO::PARAM_STR);
            $query->bindParam(":NOMBRE", $this->datos_cria["nombre"], PDO::PARAM_STR);
            $query->bindParam(":MARMOLEO", $this->datos_cria["marmoleo"], PDO::PARAM_INT);
            $query->bindParam(":COLOR_MUSCUL", $this->datos_cria["colorMusculo"], PDO::PARAM_INT);
            $query->bindParam(":PESO", $this->datos_cria["peso"], PDO::PARAM_STR);
            $query->bindParam(":COSTO", $this->datos_cria["costo"], PDO::PARAM_STR);
            $query->bindParam(":DESCRIP", $this->datos_cria["descripcion"], PDO::PARAM_STR);

            if ($query->execute()) {
                return "ok";
            } else {
                return $query->errorInfo();
            }
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }
    function updateDatosCrias()
    {
        try {
            $query = $this->getConexion()->prepare("UPDATE crias SET nombre = :NOMBRE,marmoleo = :MARMOLEO,colorMusculo = :COLOR_MUSCUL,peso = :PESO,costo = :COSTO,descripcion = :DESCRIP WHERE  NoRegistro = :NoRegistro");
            $query->bindParam(":NoRegistro", $this->datos_cria["NoRegistro"], PDO::PARAM_STR);
            $query->bindParam(":NOMBRE", $this->datos_cria["nombre"], PDO::PARAM_STR);
            $query->bindParam(":MARMOLEO", $this->datos_cria["marmoleo"], PDO::PARAM_INT);
            $query->bindParam(":COLOR_MUSCUL", $this->datos_cria["colorMusculo"], PDO::PARAM_INT);
            $query->bindParam(":PESO", $this->datos_cria["peso"], PDO::PARAM_STR);
            $query->bindParam(":COSTO", $this->datos_cria["costo"], PDO::PARAM_STR);
            $query->bindParam(":DESCRIP", $this->datos_cria["descripcion"], PDO::PARAM_STR);

            if ($query->execute()) {
                return "ok";
            } else {
                return $query->errorInfo();
            }
        } catch (Exception $e) {
            return $e -> getMessage();
        }
    }
}
