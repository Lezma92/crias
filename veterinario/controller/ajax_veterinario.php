<?php
include("../model/model_veterinario.php");

class ajaxVeterinario
{
    function statusRecientes()
    {
        $llenar = new modeloVeterinario();
        $resultado = $llenar->getStatusRecientes();

        echo (json_encode($resultado));
    }
    function statusCuarentena()
    {
        $llenar = new modeloVeterinario();
        $resultado = $llenar->getCriasCuarentena();

        echo (json_encode($resultado));
    }
    function showHistorial()
    {
        $obj = new modeloVeterinario();
        $respuesta = $obj->getHistorialCria($_POST["llenarHisorial"]);
        echo (json_encode($respuesta));
    }
    function uptStatus()
    {
        $llenar = new modeloVeterinario();
        $llenar->setDatosStatusCria($_POST["cambiarStatus"], $_POST["id_sensor"], $_POST["id_cria"]);
        $respuesta = $llenar->updateStatusSensores();
        $respuesta = $llenar->updateStatusCria();
        echo (json_encode($respuesta));
    }
}

if (isset($_POST["statusRecientes"])) {
    $ajax = new ajaxVeterinario();
    $ajax->statusRecientes();
}
if (isset($_POST["statusCuarentena"])) {
    $ajax = new ajaxVeterinario();
    $ajax->statusCuarentena();
}
if (isset($_POST["cambiarStatus"])) {
    $ajax = new ajaxVeterinario();
    $ajax->uptStatus();
}
if (isset($_POST["llenarHisorial"])) {
    $ajax = new ajaxVeterinario();
    $ajax->showHistorial();
}
