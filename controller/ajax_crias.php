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

    function addFolio()
    {
        $folio = new operacionesCrias();
        $resp = $folio->getNoFolio();
        if (is_array($resp)) {
            $format_folio = "REG-";
            $no_folio = $resp[0];
            if ($no_folio >= 0 && $no_folio < 9) {
                $format_folio .= "000" . ($no_folio + 1);
            } elseif ($no_folio >= 9 && $no_folio < 99) {
                $format_folio .= "00" . ($no_folio + 1);
            }elseif ($no_folio >= 99 && $no_folio < 999) {
                $format_folio .= "0" . ($no_folio + 1);
            }
            echo (json_encode($format_folio));
        }
    }
}

if (isset($_POST["insertarDatos"])) {
    $datos = array(
        "id_proveedor" => $_POST["id_proveedor"],
        "NoRegistro"=>$_POST["txt_folio"],
        "nombre" => $_POST["nombre"],
        "marmoleo" => $_POST["marmoleo"],
        "colorMusculo" => $_POST["colorMusculo"],
        "peso" => $_POST["peso"],
        "costo" => $_POST["costo"],
        "descripcion" => $_POST["descripcion"]
    );
    $guardarAjax = new ajaxCrias();
    $guardarAjax->enviarDatosCrias($datos);
}
if (isset($_POST["llenarTabla"])) {
    $guardarAjax = new ajaxCrias();
    $guardarAjax->llenarTablaCrias();
}
if (isset($_POST["NoFolio"])) {
    $crearFolio = new ajaxCrias();
    $crearFolio->addFolio();
}
