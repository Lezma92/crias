<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro de Crias</title>
</head>

<body>
    <!-- menu principal -->
    <?php include("integrations/nav-bar.php"); ?>
    <!-- fin del menu -->
    <div class="container-fluid d-flex justify-content-center">
        <div class="card mt-4 col-md-6 col-sm-12  col-xl-8 mb-2">

            <div class="card-header text-center">
                <h6 class="text-titulo-1">Formulario de Registro</h6>
            </div>
            <div class="card-body">
                <div>
                    <div class="alert alert-danger text-center d-none" role="alert" id="msg_alert">
                        Es necesario llenar todos los campos
                    </div>
                    <form method="POST" id="formulario_cria">
                    <input type="hidden" name="de" value="ventana" id="de">
                        <div class="mb-2">
                            <label for="txt_nombre" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" require placeholder="Ingresa el nombre del ternero">
                        </div>
                        <div class="mb-2">
                            <label for="txt_peso" class="form-label">Peso (K):</label>
                            <input type="number" step=".01" class="form-control" id="txt_peso" name="txt_peso" placeholder="Ingresa el peso del ternero" require>
                        </div>
                        <div class="mb-2">
                            <label for="txt_costo" class="form-label">Costo ($):</label>
                            <input type="number" step=".01" class="form-control" id="txt_costo" name="txt_costo" placeholder="Costo del ternero" require>
                        </div>
                        <div class="mb-2">
                            <label for="txt_descripcion" class="form-label">Descripción:</label>
                            <textarea name="txt_descripcion" id="txt_descripcion" cols="10" rows="3" class="form-control" placeholder="Agrega una descripción" require></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" id="btn_guardar" class="btn btn-lg btn-primary">Guardar registro</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/script_crias.js"></script>

</html>