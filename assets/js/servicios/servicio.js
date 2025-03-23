$(document).ready(function () {

    // Registrar un servicio
    $("#formRegistro").submit(function (e) {
        e.preventDefault();

        let nombre = $("#nombreServicio").val().trim();
        let precio = $("#precioServicio").val().trim();

        if (nombre === "" || precio === "") {
            $("#alerta").html('<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>');
            return;
        }

        $.ajax({
            url: "../../controller/servicios/registrar.php",
            type: "POST",

            // Envía los datos como un objeto con clave-valor.
            data: { nombre: nombre, precio: precio },

            // Procesar la respuesta del servidor
            // Cuando el servidor responde, se ejecuta esta función con la respuesta (response).
            success: function (response) {

                // Si el servidor responde con "ok", muestra un mensaje de éxito.
                if (response == "ok") {
                    $("#alerta").html('<div class="alert alert-success">Servicio registrado correctamente.</div>');

                    setTimeout(function () {
                       $("#modalRegistro").modal("hide");
                       location.reload(); 
                    }, 1000);

                } else {
                    $("#alerta").html('<div class="alert alert-danger">Error al registrar el servicio.</div>');
                }
            }
        });
    });


    // Edita un servicio
    $(document).on("click", ".btnEditar", function () {

        // Cargar datos en el modal de edición
        let id = $(this).data("id");
        let nombre = $(this).data("nombre");
        let precio = $(this).data("precio");

        $("#idServicio").val(id);
        $("#nombreEditar").val(nombre);
        $("#precioEditar").val(precio);

        $("#modalEditar").modal("show");
    });

    $("#formEditar").submit(function (e) {
       e.preventDefault();
       
       let id = $("#idServicio").val();
       let nombre = $("#nombreEditar").val();
       let precio = $("#precioEditar").val();

       if (nombre === "" || precio === "") {
        $("#alertaEditar").html('<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>');
       }

       $.ajax ({
        url: "../../controller/servicios/actualizar.php",
        type: "POST",
        data: { id: id, nombre: nombre, precio: precio },
        success: function (response) {
            if (response.trim() === "ok") {
                $("#alertaEditar").html('<div class="alert alert-success">Servicio actualizado correctamente.</div>');

                setTimeout(function () {
                    $("#modalEditar").modal("hide");
                    location.reload();
                }, 1000);
            } else {
                $("#alertaEditar").html('<div class="alert alert-danger">Error al actualizar el servicio.</div>');
            }
        }
       });
    });

    // Eliminar un serivicio
    $(document).on("click", ".btnEliminar", function () {
        let id = $(this).data("id");

        console.log("Clic en eliminar, ID:", id);

        if (!confirm ("¿Estás seguro de eliminar el servicio?")) {
            return;
        }


        $.ajax({
            url: "../../controller/servicios/eliminar.php",
            type: "POST",
            data: { id: id },
            success: function (response) {
                if (response == "ok") {
                    $("#alertaEliminar").html('<div class="alert alert-success">Servicio eliminado correctamente.</div>');

                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    $("#alertaEliminar").html('<div class="alert alert-danger">Error al eliminar el servicio.</div>');
                }
            }
        });
    })
});