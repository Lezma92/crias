num_row = 1;
tabla = "";

/*
*Este evento  se encarga de esperar a que todas las etiquetas HTML carguen por completo
*/
document.addEventListener("DOMContentLoaded", () => {
    const ventana = document.getElementById("de");
    const boton_enviar = document.getElementById("btn_guardar");
    getFolio();
    if (ventana.value == "modal") {
        llenarTabla();
    }

    boton_enviar.addEventListener("click", (event) => {
        event.preventDefault();
        const nombre = document.getElementById("txt_nombre").value;
        const txt_folio = document.getElementById("txt_folio").value;
        const marmoleo = document.getElementById("txt_marmoleo").value;
        const colorMusculo = document.getElementById("txt_musculo").value;
        const peso = document.getElementById("txt_peso").value;
        const costo = document.getElementById("txt_costo").value;
        const descripcion = document.getElementById("txt_descripcion").value;
        const msg_alert = document.getElementById("msg_alert");

        if (nombre != "" && peso != "" && costo != "" && descripcion != "" && marmoleo != "" && colorMusculo != "") {
            msg_alert.classList.add("d-none");
            if (peso > 10 && costo > 10) {
                boton_enviar.classList.add("disabled");
                let datos = new FormData();
                msg_alert.classList.add("d-none");
                datos.append("insertarDatos", "insertarDatos");
                datos.append("id_proveedor", 1);
                datos.append("txt_folio", txt_folio);
                datos.append("nombre", nombre);
                datos.append("marmoleo", marmoleo);
                datos.append("colorMusculo", colorMusculo);
                datos.append("peso", peso);
                datos.append("costo", costo);
                datos.append("descripcion", descripcion);

                $.ajax({
                    url: "controller/ajax_crias.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        console.log(respuesta);
                        if (respuesta == "ok") {
                            document.getElementById("formulario_cria").reset();
                            alerta("Registro exitoso!");

                            getFolio();
                            boton_enviar.classList.remove("disabled");
                            if (ventana.value == "modal") {
                                tabla.row.add([
                                    `<th class="row"><strong>${num_row}</strong></th>`,
                                    `<td class="row">${txt_folio}</td>`,
                                    `<td class="row">${nombre}</td>`,
                                    `<td class="row">${"$" + costo}</td>`,
                                    `<td class="row">${peso + "K"}</td>`,
                                    `<td class="row">${descripcion}</td>`,
                                    `<td class="row">
                                        <div class="btn-group">
                                            <button type="buttom" class="btn btn-sm btn-primary">Editar</button>
                                            <button type="buttom" class="btn btn-sm btn-warning">Eliminar</button>
                                        </div>
                                    </td>`
                                ]).draw();

                            }
                            num_row += 1;
                            $('#addCrias').modal('hide');
                        } else {

                        }
                    }
                });
            } else {
                msg_alert.classList.remove("d-none");
                msg_alert.innerText = "el peso y el costo deben de ser mayor a 10";
            }
        } else {
            msg_alert.classList.remove("d-none");
            msg_alert.innerText = "Por favor complete todos los campos";
        }


    });


});


/*
** esta función se encarga de mostrar un mensaje al usuario cuando se realizó alguna acción 
** @param mensaje = este parametro almacena el msj que se le mostrara al usuario.
*/
async function alerta(mensaje) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    await Toast.fire({
        icon: 'success',
        title: mensaje
    })
}
/* 
*funcion encargada de asignar un numero de folio a cada regitro de manera automatica
*/
function getFolio() {
    let NoFolio = "folio";
    let datos = new FormData();
    let no_folio = document.getElementById("txt_folio");
    datos.append("NoFolio", NoFolio);
    $.ajax({
        url: "controller/ajax_crias.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            no_folio.value = respuesta;
        }
    });
}
/* 
*Esta funcion es la encargada de llenar la tabla de la pagina index, realiza una peticion por medio de ajax
*para no refrescar la pagina
*/
function llenarTabla() {
    let datos = new FormData();
    const tablaDatos = document.getElementById("cuerpoTabla");
    datos.append("llenarTabla", "llenarTabla");
    $.ajax({
        url: "controller/ajax_crias.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta != "SinDatos") {
                respuesta.forEach(element => {
                    tablaDatos.insertRow().innerHTML = `
                    <tbody>
                            <tr>
                                <th scope="row">${num_row}</th>
                                <td scope="cell">${element["NoRegistro"]}</td>
                                <td scope="cell">${element["nombre"]}</td>
                                <td scope="cell">${"$" + element["costo"]}</td>
                                <td scope="cell">${"$" + element["peso"] + "k"}</td>
                                <td scope="cell">${element["descripcion"]}</td>
                                <td scope="cell">
                                    <div class="btn-group">
                                        <button type="buttom" class="btn btn-sm btn-primary">Editar</button>
                                        <button type="buttom" class="btn btn-sm btn-warning">Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    `;
                    num_row += 1;
                });

            }
            tabla = $('#tablaCrias').DataTable();

        }
    });
}



