<?php

include("controller/apis_controller.php");
$api = new crearApis();
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        if (isset($_GET["c"])) {
            if ($_GET["c"] == "T1") {
                $api->showTipo1();
            }
            if ($_GET["c"] == "T2") {
                $api->showTipo2();
            }
        } else {
            $api->showAllClasificaciones();
        }
        break;

    case "POST":
        print_r(array_keys($_POST));
        echo (json_encode(array("metodoPOS" => "Metodo POST")));
        break;

    case "DELETE":
        echo (json_encode(array("MetodoDELETE" => "Metodo DELETE")));
        break;
    default:

        break;
}
