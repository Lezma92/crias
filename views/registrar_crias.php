<!DOCTYPE html>
<html lang="en">

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
        <div class="card mt-1 col-md-8">

            <div class="card-header text-center">
                <h6 class="text-titulo-1">Formulario de Registro</h6>
            </div>
            <div class="card-body">
                <div>
                    <form>
                        <div class="mb-2">
                            <label for="txt_nombre" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre">
                        </div>
                        <div class="mb-2">
                            <label for="txt_peso" class="form-label">Peso:</label>
                            <input type="number" step=".01" class="form-control" id="txt_peso" name="txt_peso">
                        </div>
                        <div class="mb-2">
                            <label for="txt_peso" class="form-label">Costo:</label>
                            <input type="number" step=".01" class="form-control" id="txt_peso" name="txt_peso">
                        </div>
                        <div class="mb-2">
                            <label for="txt_peso" class="form-label">Costo:</label>
                            <input type="number" step=".01" class="form-control" id="txt_peso" name="txt_peso">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" id="btn_guardar" class="btn btn-lg btn-primary">Guardar registro</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</html>