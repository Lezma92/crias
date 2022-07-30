<?php

    $pagina =  isset($_GET["pagina"]) ? strtolower($_GET["pagina"]) : "index";
    require_once("views/".$pagina.".php");

?>