<!-- Modal -->
<div class="modal fade" id="addRevision" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulario de revisión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="alert alert-danger text-center d-none" role="alert" id="msg_alert">
                        Es necesario llenar todos los campos
                    </div>
                    <form method="POST" id="formulario_revision">
                        <input type="hidden" name="idCrias" id="idCrias">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="txt_folio" class="form-label">No. Registro: </label>
                                <input type="text" class="form-control bg-primary text-white f-bold" value="" disabled id="txt_folio" name="txt_folio" require placeholder="">
                            </div>
                            <div class="col-md-8">
                                <label for="txt_nombre" class="form-label">Nombre: </label>
                                <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" disabled require placeholder="Ingresa el nombre del ternero">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="txt_temp" class="form-label">Temp (°C):</label>
                                    <input type="number" step=".01" class="form-control" id="txt_temp" name="txt_temp" placeholder="Temperatura °" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="txt_fcardiaca" class="form-label">F. Cardiaca:</label>
                                    <input type="number" class="form-control" id="txt_fcardiaca" name="txt_fcardiaca" placeholder="Frecuencia cardiaca" require>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="txt_frespiratoria" class="form-label">F. Respiratoria:</label>
                                    <input type="number"  class="form-control" id="txt_frespiratoria" name="txt_frespiratoria" placeholder="Frecuencia Respiratoria" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div>
                                    <label for="txt_fsanguinea" class="form-label">F. Sanguinea:</label>
                                    <input type="number" class="form-control" id="txt_fsanguinea" name="txt_fsanguinea" placeholder="Frecuencia Sanguinea" require>
                                </div>
                            </div>
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