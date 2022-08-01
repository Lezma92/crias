<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <title>Clasificación de crias</title>
</head>

<body>
    <?php
    $descargarDatos  = file_get_contents("http://localhost/crias/api/api.php");
    $datos = json_decode($descargarDatos, true);

    $cantidadCard = sizeof($datos) - 1;
    ?>
    <div class="container-fluid">

        <?php for ($card = 0; $card < $cantidadCard; $card++) { ?>
            <div class="card mt-4">
                <div class="card-header text-center text-primary">
                    <?php
                    $titulo = "<h4>Grasa Tipo 1</h4>";
                    if ($card == 1) {
                        $titulo = "<h4>Grasa Tipo 2</h4>";
                    }
                    echo ($titulo);
                    ?>
                </div>
                <div class="card-body">
                    <table class="table  table-hover" id="tablaCrias<?php echo ($card + 1); ?>">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. Registro</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">marmoleo</th>
                                <th scope="col">Costo</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha REG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $datosClasificaciones;
                            if ($card == 0) {
                                $datosClasificaciones = $datos["grasaTipo1"];
                            } else {
                                $datosClasificaciones = $datos["grasaTipo2"];
                            }
                            foreach ($datosClasificaciones as $key => $value) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo ($key + 1); ?></th>
                                    <td><?php echo ($value["NoRegistro"]); ?></td>
                                    <td><?php echo ($value["nombre"]); ?></td>
                                    <td><?php echo ($value["marmoleo"]); ?></td>
                                    <td><?php echo ($value["costo"]); ?></td>
                                    <td><?php echo ($value["peso"]); ?></td>
                                    <td><?php echo ($value["descripcion"]); ?></td>
                                    <td><?php echo ($value["fecha"]); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php
        } ?>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script>
    $('#tablaCrias1').DataTable();
    $('#tablaCrias2').DataTable();
</script>

</html>