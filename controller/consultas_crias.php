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
    function mostrarTodo(){
        $respuesta = new operacionesCrias();
        $resp = $respuesta->getAllDatosBDCrias();
        return $resp;
    }
}
