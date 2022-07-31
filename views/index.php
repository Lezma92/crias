<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <!-- menu principal -->
    <?php include("integrations/nav-bar.php"); ?>
    <!-- fin del menu -->
    <div class="container-fluid">
        <div class="card mt-3 mb-2">

            <div class="card-header ">
                <h6 class="text-titulo-1 text-center">REGISTROS RECIENTES</h6>
                <div>
                    <button type="button" class="btn btn-ls btn-success" data-bs-toggle="modal" data-bs-target="#addCrias">
                        <strong>+</strong> Nueva cria
                    </button>
                </div>
            </div>
            <div class="card-body pad table-responsive">
                <table class="table  table-hover" id="tablaCrias">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">No. Registro</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Costo</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Aciones</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                        
                
                    </tbody>
                </table>
            </div>
            <?php
            include("integrations/modal_addCrias.php");
            ?>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/script_crias.js"></script>

</html>