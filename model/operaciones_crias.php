<?php
include("conexion.php");
class operacionesCrias extends ConexionBD
{
    private $datos_cria;
    function setDatosCrias($datos)
    {
        $this->datos_cria = array(
            "id_proveedor" => $datos["id_proveedor"],
            "nombre" => $datos["nombre"],
            "peso" => $datos["peso"],
            "descripcion" => $datos["descripcion"],
            "costo" => $datos["costo"],
        );
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


    function addDatosCrias()
    {
        $query = $this->getConexion()->prepare("INSERT INTO crias (id_proveedor,nombre,peso,costo,descripcion,fecha) VALUES(:ID_PROV,:NOMBRE,:PESO,:COSTO,:DESCRIP,current_timestamp())");
        $query->bindParam(":ID_PROV", $this->datos_cria["id_proveedor"], PDO::PARAM_INT);
        $query->bindParam(":NOMBRE", $this->datos_cria["nombre"], PDO::PARAM_STR);
        $query->bindParam(":PESO", $this->datos_cria["peso"], PDO::PARAM_STR);
        $query->bindParam(":COSTO", $this->datos_cria["costo"], PDO::PARAM_STR);
        $query->bindParam(":DESCRIP", $this->datos_cria["descripcion"], PDO::PARAM_STR);

        if ($query->execute()) {
            return "ok";
        } else {
            return $query->errorInfo();
        }
    }
}
