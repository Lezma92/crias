<?php
$numero = $_GET["registro"];
if (isset($numero)) {
} else {
    header("location: ?pagina=principal");
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Historial</title>
</head>

<body>
    <!-- inicio de menu de navegacion -->
    <?php include("integrations/nav-bar.php"); ?>
    <!-- fin de menu de navegacion -->
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header text-center">
                <h4>Bienvenido</h4>
                <h5>Historial de todas las revisiones que se le han realizado a <?php echo ($numero); ?></h5>
                </dv>
            </div>
            <div class="card-body">
                <input type="hidden" name="numero_registro" id="numero_registro" value="<?php echo ($numero); ?>">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info" role="alert">
                            <div class="pad table-responsive">
                                <table class="table table-hover" id="tablaHistorial">
                                    <thead class="">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No. Registro</th>
                                            <th scope="col">Temperatura °C</th>
                                            <th scope="col">Fr. Cardiaca</th>
                                            <th scope="col">Fr. Respiratoria</th>
                                            <th scope="col">Fr. Sanguinea</th>
                                            <th scope="col">Status Salud</th>
                                            <th scope="col">Status revisión</th>
                                            <th scope="col">Fecha Revisión</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpoTabla">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/script_historial.js"></script>


</html>