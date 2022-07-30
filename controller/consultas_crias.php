<?php
include("model/operaciones_crias.php");
class consultasCrias
{
    function llenarTablaCrias()
    {
        $respuesta = new operacionesCrias();
        $resp = $respuesta->getDatosBDCrias();
        return $resp;
    }
}
