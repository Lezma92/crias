<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <title>Ayudante</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-header text-center">
                <h5>Bienvenido</h5>
                <h6>Ayudante de Veterinario</h6>
                </dv>
                <div>
                    <form class="row g-3" validate>
                        <div class="col-sm-4">
                            <label for="txt_buscar" class="visually-hidden">Buscar</label>
                            <input type="text" class="form-control" id="txt_buscar" placeholder="Ingresa el número de registro, REG-0001" require>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-info mb-3 text-white" id="btn_buscar">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="card col-sm tex-center" id="cardDatos">
                    <div class="card-header text-center" id="titulo_card">
                    </div>
                    <div class="card-body text-center">
                        <div class="">
                            <div class="alert alert-secondary" role="alert">
                                <h4 class="text-primary"><strong>Nombre:</strong></h4>
                                <h5 class="text-success" id="etq_nombre"></h5>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h4 class="text-primary"><strong>Marmoleo:</strong></h4>
                                        <h5 class="text-success" id="etq_marmoleo"></h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="text-primary"><strong>Color de musculo:</strong></h4>
                                        <h5 class="text-success" id="etq_musculo"></h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4 class="text-primary"><strong>Peso:</strong></h4>
                                        <h5 class="text-success" id="etq_peso"></h5>
                                    </div>
                                </div>

                                <div>

                                </div>

                                <div class="alert alert-warning d-none" role="alert" id="datos_revision">
                                    <h5 class="text-primary">Datos de revisión - Historial</h5>
                                    <div class="border border-success pad table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Temp °C</th>
                                                    <th scope="col">F. Cardiaca</th>
                                                    <th scope="col">F. Respiratoria</th>
                                                    <th scope="col">F. Sanguinea</th>
                                                    <th scope="col">Fecha Revisión</th>
                                                </tr>
                                            </thead>
                                            <tbody id="datosHistorial">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <button type="button" class="btn btn-ls btn-success d-none" id="btn_agregarRevision" data-bs-toggle="modal" data-bs-target="#addRevision">
                            Agregar Revision
                        </button>

                    </div>

                    <div class="card-footer text-muted text-center">
                        <p id="ult_revision">Sin datos</p>
                    </div>
                </div>

            </div>
            <?php include("integrations/modal_add_revision.php");?>
        </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/script_ayudante.js"></script>

</html>