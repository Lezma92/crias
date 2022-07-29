document.addEventListener("DOMContentLoaded",()=>{
    const boton = document.getElementById("mostrar");

    boton.addEventListener("click",()=>{
        alerta();
    });
    
    
    function alerta() {
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
            title: 'Registro exitoso'
        })
    }
});




