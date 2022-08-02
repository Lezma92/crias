document.addEventListener("DOMContentLoaded", () => {
    llenarTablaCuarentena();
});

function llenarTablaCuarentena() {
    let url = "controller/ajax_veterinario.php"
    let datosEnviar = new FormData();
    datosEnviar.append("statusCuarentena", "statusCuarentena");
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
                            <td>${element["nombre"]}</td>
                            <td>${element["marmoleo"]}</td>
                            <td>${element["colorMusculo"]}</td>
                            <td>${element["peso"]}</td>
                            <td>
                                <a class="btn-group" role="group">
                                    <a type="button" class="btn btn-info" href="?pagina=historial&registro=${element["NoRegistro"]}">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    Ver Historial
                                    </a>
                                </a>
                            </td>
                      </tr>`;

                    cont += 1;
                });
                cuerpoTabla.innerHTML = datoTabla;
                $('#tablaCuarentena').DataTable();
            } else {
                $('#tablaCuarentena').DataTable();
            }


        }
    });
}

