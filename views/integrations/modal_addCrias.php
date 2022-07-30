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
                        <form method="POST" id="formulario_cria">
                            <input type="hidden" name="de" value="modal" id="de">
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
                            <div class="d-flex justify-content-center modal-footer">
                                <button type="submit" id="btn_guardar" class="btn btn-lg btn-info">Guardar</button>
                            </div>

                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>