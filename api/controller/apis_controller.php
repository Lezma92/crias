<?php
include("model/funciones_api.php");
class crearApis
{
    private $todas_clasificaciones = array();
    private $grasaTipo1 = array();
    private $grasaTipo2 = array();

    function showAllClasificaciones()
    {
        $crear = new apiCrias();
        $this->todas_clasificaciones["grasaTipo1"] = array();
        $this->todas_clasificaciones["grasaTipo2"] = array();
        $this->todas_clasificaciones["status"] = array();

        $datosCrias = $crear->getAllClasificaciones();

        if ($datosCrias != "SinDatos") {
            array_push($this->todas_clasificaciones["status"], array(
                "resp" => "ok",
                "stats" => "200"
            ));
        }
        foreach ($datosCrias as $key => $value) {
            $item = array(
                "id" => $value["id"],
                "tipoGrasa" => $value["tipoGrasa"],
                "NoRegistro" => $value["NoRegistro"],
                "nombre" => $value["nombre"],
                "marmoleo" => $value["marmoleo"],
                "colorMusculo" => $value["colorMusculo"],
                "peso" => $value["peso"],
                "costo" => $value["costo"],
                "descripcion" => $value["descripcion"],
                "fecha" => $value["fecha"],
            );

            if ($value["tipoGrasa"] == "GrasaTipo1") {
                array_push($this->todas_clasificaciones["grasaTipo1"], $item);
            }
            if ($value["tipoGrasa"] == "GrasaTipo2") {
                array_push($this->todas_clasificaciones["grasaTipo2"], $item);
            }
        }

        echo (json_encode($this->todas_clasificaciones));
    }

    function showTipo1()
    {
        $crear = new apiCrias();
        $datosClasifTipo1 = $crear->getClasifGrasaT1();
        $this->grasaTipo1["data"] = array();
        $this->grasaTipo1["status"] = array();

        if ($datosClasifTipo1 != "SinDatos") {
            array_push($this->grasaTipo1["status"], array(
                "resp" => "ok",
                "msg_alert" => "200"
            ));
        }

        foreach ($datosClasifTipo1 as $key => $value) {
            $item = array(
                "id" => $value["id"],
                "NoRegistro" => $value["NoRegistro"],
                "nombre" => $value["nombre"],
                "marmoleo" => $value["marmoleo"],
                "colorMusculo" => $value["colorMusculo"],
                "peso" => $value["peso"],
                "costo" => $value["costo"],
                "descripcion" => $value["descripcion"],
                "fecha" => $value["fecha"]
            );
            array_push($this->grasaTipo1["data"], $item);
        }

        echo (json_encode($this->grasaTipo1));
    }
    function showTipo2()
    {
        $crear = new apiCrias();
        $datosClasifTipo2 = $crear->getClasifGrasaT2();
        $this->grasaTipo2["data"] = array();
        $this->grasaTipo2["status"] = array();

        if ($datosClasifTipo2 != "SinDatos") {
            array_push($this->grasaTipo2["status"], array(
                "resp" => "ok",
                "msg_alert" => "200"
            ));
        }

        foreach ($datosClasifTipo2 as $key => $value) {
            $item = array(
                "id" => $value["id"],
                "NoRegistro" => $value["NoRegistro"],
                "nombre" => $value["nombre"],
                "marmoleo" => $value["marmoleo"],
                "colorMusculo" => $value["colorMusculo"],
                "peso" => $value["peso"],
                "costo" => $value["costo"],
                "descripcion" => $value["descripcion"],
                "fecha" => $value["fecha"]
            );
            array_push($this->grasaTipo2["data"], $item);
        }

        echo (json_encode($this->grasaTipo2));
    }
}
