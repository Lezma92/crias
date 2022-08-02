

document.addEventListener("DOMContentLoaded", () => {

    //variables del modal de registro de revisiones
    const txt_folio = document.getElementById("txt_folio");
    const txt_nombre = document.getElementById("txt_nombre");
    const txt_idCrias = document.getElementById("idCrias");
    const boton_guardarRevision = document.getElementById("btn_guardar");

    ///
    const btn_buscar = document.getElementById("btn_buscar");
    const etq_buscar = document.getElementById("txt_buscar");
    const titulo = document.getElementById("titulo_card");

    const etq_nombre = document.getElementById("etq_nombre");
    const etq_marmoleo = document.getElementById("etq_marmoleo");
    const etq_musculo = document.getElementById("etq_musculo");
    const etq_peso = document.getElementById("etq_peso");


    const datos_revision = document.getElementById("datos_revision");
    const ult_revision = document.getElementById("ult_revision");

    const btn_agregarRevision = document.getElementById("btn_agregarRevision");



    btn_buscar.addEventListener("click", (event) => {
        event.preventDefault();
        if (etq_buscar.value != "") {
            buscarCria(etq_buscar.value);
        }
    });



    boton_guardarRevision.addEventListener("click", (event) => {
        event.preventDefault();
        let val_txt_temp = document.getElementById("txt_temp");
        let val_txt_fcardiaca = document.getElementById("txt_fcardiaca");
        let val_txt_frespiratoria = document.getElementById("txt_frespiratoria");
        let val_txt_fsanguinea = document.getElementById("txt_fsanguinea");
        if (txt_idCrias.value != "" && val_txt_temp.value != "" && val_txt_fcardiaca.value != "" && val_txt_frespiratoria.value != "" && val_txt_fsanguinea.value != "") {
            addRevision(txt_idCrias.value, val_txt_temp.value, val_txt_fcardiaca.value, val_txt_frespiratoria.value, val_txt_fsanguinea.value);
        }

    });


    function addRevision(id_c, temp, fcardiaca, frespiratoria, fsanguinea) {
        let datos_revision = new FormData();
        datos_revision.append("InsertarRevision", "Insertar");
        datos_revision.append("id_c", id_c);
        datos_revision.append("val_txt_temp", temp);
        datos_revision.append("val_txt_fcardiaca", fcardiaca);
        datos_revision.append("val_txt_frespiratoria", frespiratoria);
        datos_revision.append("val_txt_fsanguinea", fsanguinea);
        $.ajax({
            url: "controller/controlador_ayudante.php",
            method: "POST",
            data: datos_revision,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta == "ok") {
                    document.getElementById("formulario_revision").reset();
                    $("#addRevision").modal("hide");
                    alerta("Datos insertados con exito!");
                    buscarCria(etq_buscar.value);
                }
            }
        });


    }
    function buscarCria(num_registro) {
        let p_datos = new FormData();
        let tablaHistorial = document.getElementById("datosHistorial");
        p_datos.append("BuscarRegistro", num_registro);
        $.ajax({
            url: "controller/controlador_ayudante.php",
            method: "POST",
            data: p_datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta == "SinDatos") {
                    titulo.innerHTML = `<h4><strong class="text-primary">No. Registro:</strong></h4>`;
                    etq_nombre.innerText = ``;
                    etq_marmoleo.innerText = ``;
                    etq_musculo.innerText = ``;
                    etq_peso.innerText = ``;
                    datos_revision.classList.add("d-none");
                    btn_agregarRevision.classList.add("d-none");
                    ult_revision.innerText = "Sin datos" ;
                } else {
                    let n = 0;
                    let datoTabla = "";

                    btn_agregarRevision.classList.remove("d-none");

                    respuesta.forEach(element => {
                        if (n == 0) {
                            titulo.innerHTML = `<h4><strong class="text-primary">No. Registro:</strong> ${element["NoRegistro"]}</h4>`;

                            txt_idCrias.value = element["id"];
                            txt_folio.value = `${element["NoRegistro"]}`;
                            txt_nombre.value = `${element["nombre"]}`;
                            etq_nombre.innerText = `${element["nombre"]}`;
                            etq_marmoleo.innerText = `${element["marmoleo"]}`;
                            etq_musculo.innerText = `${element["colorMusculo"]}`;
                            etq_peso.innerText = `${element["peso"]}`;
                            n++;
                            ult_revision.innerText = "Ult. Revisión: " + element["ultimaRevision"];
                        }
                        if (element["f_cardiaca"] != "INF_NULL") {

                            datos_revision.classList.remove("d-none");
                            datoTabla += `
                            <tr>
                            <th scope="row">1</th>
                            <td>${element["temp"]}</td>
                            <td>${element["f_cardiaca"]}</td>
                            <td>${element["f_respiratoria"]}</td>
                            <td>${element["f_sanguinea"]}</td>
                            <td>${element["ultimaRevision"]}</td>
                          </tr>
    
                            `;

                        } else {
                            datos_revision.classList.add("d-none");
                            ult_revision.innerText = "Sin revisiones";
                        }
                    });
                    tablaHistorial.innerHTML = datoTabla;
                    // 
                    // 

                    // 
                }
            }
        });
    }

    /*
** esta función se encarga de mostrar un mensaje al usuario cuando se realizó alguna acción 
** @param mensaje = este parametro almacena el msj que se le mostrara al usuario.
*/
     function alerta(mensaje) {
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

         Toast.fire({
            icon: 'success',
            title: mensaje
        })
    }

});




