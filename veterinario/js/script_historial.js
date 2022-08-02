document.addEventListener("DOMContentLoaded", () => {
    const numeroRegistro = document.getElementById("numero_registro");
    llenarHistorial(numeroRegistro.value);
});



function llenarHistorial(numeroR) {
    let p_datos = new FormData();

    let tablaHistorial = document.getElementById("cuerpoTabla");

    console.log(numeroR);

    p_datos.append("llenarHisorial", numeroR);
    $.ajax({
        url: "controller/ajax_veterinario.php",
        method: "POST",
        data: p_datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            datoTabla = "";
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
                            <td>${element["status_rev"]}</td>
                            <td>${element["fecha_revision"]}</td>
                          </tr>
                            `;
                cont++;
            });
            tablaHistorial.innerHTML = datoTabla;
            $("#tablaHistorial").dataTable();


        }
    });
}