document.addEventListener("DOMContentLoaded", () => {
    llenarTablaStatus();
});

function enviarAccion(idCrria, id, opc) {

    let msj1 = 'Está seguro que desea enviar a cuarentena este registro?';
    let msj2 = "Cria enviada a cuarentena con exito!";
    let url = "controller/ajax_veterinario.php"
    let datosEnviar = new FormData();

    let tip_msj = 'warning';
    if (opc == 1) {
        datosEnviar.append("cambiarStatus", "cuarentena");
        datosEnviar.append("id_sensor", id);
        datosEnviar.append("id_cria", idCrria);
    } else {
        datosEnviar.append("cambiarStatus", "saludable");
        datosEnviar.append("id_sensor", id);
        datosEnviar.append("id_cria", idCrria);
        msj1 = "El estado de este registro se modificara a revisado, desea continuar";
        msj2 = "El estado se cambio con exito!";
        tip_msj = 'info';
    }
    Swal.fire({
        title: msj1,
        text: "si no esta seguro puede cancelas está operación!",
        icon: tip_msj,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SÍ, Enviar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                method: "POST",
                data: datosEnviar,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    console.log(respuesta);
                    if (respuesta == "ok") {
                        Swal.fire(
                            msj2,
                            'Datos notificados en el sistema',
                            'success'
                        );
                        setTimeout("location.reload(true);", "4000");
                    }
                }
            });

        }
    });
}
function llenarTablaStatus() {
    let url = "controller/ajax_veterinario.php"
    let datosEnviar = new FormData();
    datosEnviar.append("statusRecientes", "statusRecientes");
    const cuerpoTabla = document.getElementById("cuerpoTabla");
    $.ajax({
        url: url,
        method: "POST",
        data: datosEnviar,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta != "SinDatos") {
                let datoTabla = "";
                let cont = 1;
                respuesta.forEach(element => {
                    datoTabla += `
                        <tr>
                            <th scope="row">${cont}</th>
                            <td>${element["NoRegistro"]}</td>
                            <td>${element["tempertura"]}</td>
                            <td>${element["frecuencia_c"]}</td>
                            <td>${element["frecuencia_r"]}</td>
                            <td>${element["frecuencia_s"]}</td>
                            <td>${element["estadoSalud"]}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    ${element["estadoSalud"] != "Cria saludable" ? '<button type="button" class="btn btn-warning" onclick="enviarAccion(' + element["id"] + ',' + element["idSensores"] + ',1)"><i class="bi bi-exclamation-triangle"></i> Cuarentena</button>' : '<button type="button" class="btn btn-success" onclick="enviarAccion(' + element["id"] + ',' + element["idSensores"] + ',2)"><i class="bi bi-check2-circle"></i> Saludable</button>'}                                
                                    <a type="button" class="btn btn-info" href="?pagina=historial&registro=${element["NoRegistro"]}">
                                    <i class="bi bi-clock-history"></i>
                                    Ver Historial
                                    </a>
                                </div>
                            </td>
                      </tr>`;

                    cont += 1;
                });
                cuerpoTabla.innerHTML = datoTabla;
                $('#tablaStsSalud').DataTable();
            } else {
                $('#tablaStsSalud').DataTable();
            }


        }
    });
}

