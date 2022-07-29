<?php

class operacionesCrias extends ConexionBD
{

    private $datos_cria;

    function setDatosCrias($datos)
    {
        $this->datos_cria = array(
            "id_proveedor" => $datos["proveedor"],
            "nombre" => $datos["nombre"],
            "peso" => $datos["peso"],
            "descripcion" => $datos["descripcion"],
            "costo" => $datos["costo"],
        );
    }
    function getDatosCrias()
    {
        return $this->datos_cria;
    }


    function addDatosCrias()
    {
        $query = $this->getConexion()->prepare("INSERT INTO crias (id_proveedor,nombre,peso,costo,descripcion,fecha) VALUES(:ID_PROV,:NOMBRE,:PESO,:COSTO,:DESCRIP,current_timestamp())");
        $query->bindParam(":ID_PROV", $this->datos["id_proveedor"], PDO::PARAM_INT);
        $query->bindParam(":NOMBRE", $this->datos["nombre"], PDO::PARAM_STR);
        $query->bindParam(":PESO", $this->datos["PESO"], PDO::PARAM_STR);
        $query->bindParam(":COSTO", $this->datos["COSTO"], PDO::PARAM_STR);
        $query->bindParam(":DESCRIP", $this->datos["DESCRIP"], PDO::PARAM_STR);

        if ($query->execute()) {
            return "ok";
        } else {
            return $query->errorInfo();
        }
    }
}
