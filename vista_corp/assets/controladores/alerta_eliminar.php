<script>
    // Utiliza clases en lugar de ids para los botones y formularios
    let eliminarBtns = document.querySelectorAll('.eliminarBtn');

    eliminarBtns.forEach(function(btn) {
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            let idAEliminar = btn.parentElement.querySelector('.id_a_eliminar_input').value;

            Swal.fire({
                title: "¿Estás seguro de eliminar la información?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Obtener el formulario ascendente más cercano al botón actual
                    let formulario = btn.closest('form');

                    if (formulario) {
                        // Si el formulario existe, enviarlo
                        Swal.fire({
                            title: "Informacion eliminada",
                            text: "",
                            icon: "success",
                            timer: 2000,
                            timerProgressBar: true,
                            willClose: () => {
                                formulario.submit();
                            }
                        });
                    } else {
                        // Manejar el caso en que no se encuentra el formulario
                        Swal.fire({
                            title: "Error",
                            text: "No se encontró el formulario asociado al botón",
                            icon: "error"
                        });
                    }
                } else {
                    Swal.fire({
                        title: "Eliminacion cancelada",
                        text: "",
                        icon: "error",
                        timer: 2000,
                        timerProgressBar: true
                    });
                }
            });
        });
    });
    </script>