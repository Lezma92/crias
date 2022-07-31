<form method="POST" id="formulario_cria">
    
    <div class="row">
        <div class="col-md-4">
            <label for="txt_folio" class="form-label">No. Registro: </label>
            <input type="text" class="form-control bg-primary text-white f-bold" value="" disabled id="txt_folio" name="txt_folio" require placeholder="">
        </div>
        <div class="col-md-8">
            <label for="txt_nombre" class="form-label">Nombre: </label>
            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" require placeholder="Ingresa el nombre del ternero">
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-sm-6">
            <div>
                <label for="txt_marmoleo" class="form-label">Marmoleo:</label>
                <select class="form-select" id="txt_marmoleo">
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
                <label for="txt_musculo" class="form-label">Color musculo:</label>
                <select class="form-select" id="txt_musculo">
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
                <label for="txt_peso" class="form-label">Peso (kg):</label>
                <input type="number" step=".01" class="form-control" id="txt_peso" name="txt_peso" placeholder="Ingresa el peso del ternero" require>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div>
                <label for="txt_costo" class="form-label">Costo ($):</label>
                <input type="number" step=".01" class="form-control" id="txt_costo" name="txt_costo" placeholder="Costo del ternero" require>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <label for="txt_descripcion" class="form-label">Descripción:</label>
        <textarea name="txt_descripcion" id="txt_descripcion" cols="10" rows="3" class="form-control" placeholder="Agrega una descripción" require></textarea>
    </div>
    <div class="d-flex justify-content-center modal-footer">
        <button type="submit" id="btn_guardar" class="btn btn-lg btn-info">Guardar</button>
    </div>

</form>