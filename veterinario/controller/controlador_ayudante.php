<?php
include("../model/funciones_ayudante.php");
class controladorAyudante
{
    function ctlBuscar($no_buscar)
    {
        $fun_buscar = new funcionesAyudante();
        $fun_buscar->setNoRegistro($no_buscar);
        $respuesta = $fun_buscar->buscarNoRegistro();
        echo (json_encode($respuesta));
    }
    function agregarRevision()
    {
        $fun_add = new funcionesAyudante();

        $datos = array(
            "id_crias" => $_POST["id_c"],
            "tempertura" => $_POST["val_txt_temp"],
            "frecuencia_c" => $_POST["val_txt_fcardiaca"],
            "frecuencia_r" => $_POST["val_txt_frespiratoria"],
            "frecuencia_s" => $_POST["val_txt_fsanguinea"],
        );

        $fun_add->setDatosRegistrar($datos);
        $respuesta = $fun_add->addRevisiones();
        echo (json_encode($respuesta));
    }
}


if (isset($_POST["BuscarRegistro"])) {
    $objControlador = new controladorAyudante();
    $objControlador->ctlBuscar($_POST["BuscarRegistro"]);
}
if (isset($_POST["InsertarRevision"])) {
    $objControlador = new controladorAyudante();
    $objControlador->agregarRevision();
}
