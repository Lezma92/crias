<!-- Modal -->
<div class="modal fade" id="addCrias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="alert alert-danger text-center d-none" role="alert" id="msg_alert">
                        Es necesario llenar todos los campos
                    </div>
                    <input type="hidden" name="de" value="modal" id="de">
                   <?php include("formulario.php");?>
                </div>

            </div>
        </div>
    </div>
</div>