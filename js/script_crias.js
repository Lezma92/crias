document.addEventListener("DOMContentLoaded", () => {


    const boton_enviar = document.getElementById("btn_guardar");



    boton_enviar.addEventListener("click", (event) => {
        event.preventDefault();
        const nombre = document.getElementById("txt_nombre").value;
        const peso = document.getElementById("txt_peso").value;
        const costo = document.getElementById("txt_costo").value;
        const descripcion = document.getElementById("txt_descripcion").value;
        const msg_alert = document.getElementById("msg_alert");
        const ventana = document.getElementById("de");

        if (nombre != "" && peso != "" && costo != "" && descripcion != "") {
            msg_alert.classList.add("d-none");
            if (peso > 10 && costo > 10) {
                boton_enviar.classList.add("disabled");
                let datos = new FormData();
                msg_alert.classList.add("d-none");
                datos.append("insertarDatos", "insertarDatos");
                datos.append("id_proveedor", 1);
                datos.append("nombre", nombre);
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
                            boton_enviar.classList.remove("disabled");
                            if (ventana.value == "modal") {
                                tabla = $('#tablaCrias').DataTable();
                                tabla.row.add(
                                    [1, nombre, costo, peso, descripcion, `
                                        <div class="btn-group">
                                            <button type="buttom" class="btn btn-sm btn-primary">Informacion</button>
                                            <button type="buttom" class="btn btn-sm btn-warning">Eliminar</button>
                                        </div>`]
                                ).draw(false);;
                            }
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


