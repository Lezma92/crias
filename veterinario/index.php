
<?php
    $pagina =  isset($_GET["pagina"]) ? strtolower($_GET["pagina"]) : "principal";
    require_once("views/".$pagina.".php");
?>