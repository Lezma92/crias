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
                    <input type="hidden" name="de" value="pag_registrarcrias" id="de">
                    <?php include("views/integrations/formulario.php");?>
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