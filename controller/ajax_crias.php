<?php
include("../model/operaciones_crias.php");
class ajaxCrias
{
    function enviarDatosCrias($datos)
    {
        $guardar = new operacionesCrias();
        $guardar->setDatosCrias($datos);
        $respuesta = $guardar->addDatosCrias();
        echo (json_encode($respuesta));
    }

    function llenarTablaCrias()
    {
        $respuesta = new operacionesCrias();
        $resp = $respuesta->getDatosBDCrias();
        echo (json_encode($resp));
    }
}

if (isset($_POST["insertarDatos"])) {
    $datos = array(
        "id_proveedor" => $_POST["id_proveedor"],
        "nombre" => $_POST["nombre"],
        "peso" => $_POST["peso"],
        "costo" => $_POST["costo"],
        "descripcion" => $_POST["descripcion"]
    );
    $guardarAjax = new ajaxCrias();
    $guardarAjax->enviarDatosCrias($datos);
}
