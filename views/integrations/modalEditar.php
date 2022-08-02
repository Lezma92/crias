<!-- Modal -->
<div class="modal fade" id="updateCrias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualización de datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="alert alert-danger text-center d-none" role="alert" id="msg_alert">
                        Es necesario llenar todos los campos
                    </div>
                    <form method="POST" id="formUpdateCria">
                        <input type="hidden" name="idCrias" id="idCrias">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="upd_folio" class="form-label">No. Registro: </label>
                                <input type="text" class="form-control bg-primary text-white f-bold" value="" disabled id="upd_folio" name="upd_folio" require placeholder="">
                            </div>
                            <div class="col-md-8">
                                <label for="upd_nombre" class="form-label">Nombre: </label>
                                <input type="text" class="form-control" id="upd_nombre" name="upd_nombre" require placeholder="Ingresa el nombre del ternero">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="upd_marmoleo" class="form-label">Marmoleo:</label>
                                    <select class="form-select" id="upd_marmoleo">
                                        <option selected disabled value="">
                                            calidad
                                        </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="upd_musculo" class="form-label">Color musculo:</label>
                                    <select class="form-select" id="upd_musculo">
                                        <option selected disabled>
                                            seleccionar
                                        </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="upd_peso" class="form-label">Peso (kg):</label>
                                    <input type="number" step=".01" class="form-control" id="upd_peso" name="upd_peso" placeholder="Ingresa el peso del ternero" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="upd_costo" class="form-label">Costo ($):</label>
                                    <input type="number" step=".01" class="form-control" id="upd_costo" name="upd_costo" placeholder="Costo del ternero" require>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="upd_descripcion" class="form-label">Descripción:</label>
                            <textarea name="upd_descripcion" id="upd_descripcion" cols="10" rows="3" class="form-control" placeholder="Agrega una descripción" require></textarea>
                        </div>
                        <div class="d-flex justify-content-center modal-footer">
                            <button type="submit" id="btn_actualizar" class="btn btn-lg btn-info">Actualizar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>