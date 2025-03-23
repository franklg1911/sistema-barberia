$(document).ready(function () {
   
    // Registrar una cita
    $("#formRegistro").submit(function (e) {
        e.preventDefault();

        // Capturamos los valores de los campos del formulario
        let cliente = $("#cliente").val().trim();
        let fecha = $("#fecha").val().trim();
        let hora = $("#hora").val().trim();
        let servicio = $("#servicio").val().trim();
        let empleado = $("#empleado").val().trim();
        let estado = $("#estado").val().trim();

        if (cliente === "" || fecha === "" || hora === "" || servicio === "" || empleado === "" || estado === "") {
            $("#alerta").html('<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>');
            return;
        }

        $.ajax({
            url: "../../controller/citas/registrar.php",
            type: "POST",
            data: { cliente: cliente, fecha: fecha, hora: hora, servicio: servicio, empleado: empleado, estado: estado },
            success: function (response) {
                if (response == "ok") {
                    $("#alerta").html('<div class="alert alert-success">Cita registrada correctamente.</div>');

                    setTimeout(function () {
                        $("#modalRegistro").modal("hide");
                        location.reload();
                    }, 1000);

                } else {
                    $("#alerta").html('<div class="alert alert-danger">Error al registrar la cita.</div>');
                }
            }
        });
    });

    // Editar una cita
    $('.btnEditar').click(function() {
        var id = $(this).data('id');
        var cliente = $(this).data('cliente');
        var fecha = $(this).data('fecha');
        var hora = $(this).data('hora');
        var servicio = $(this).data('servicio');
        var empleado = $(this).data('empleado');
        var estado = $(this).data('estado');


        $('#idCita').val(id);
        $('#clienteEditar').val(cliente);
        $('#fechaEditar').val(fecha);
        $('#horaEditar').val(hora);
        $('#servicioEditar').val(servicio);
        $('#empleadoEditar').val(empleado);
        $('#estadoEditar').val(estado);

        $('#modalEditar').modal('show');
    });

    $("#formEditar").submit(function (e) {
        e.preventDefault();
        
        let id = $("#idCita").val();
        let cliente = $("#clienteEditar").val();
        let fecha = $("#fechaEditar").val();
        let hora = $("#horaEditar").val();
        let servicio = $("#servicioEditar").val();
        let empleado = $("#empleadoEditar").val();
        let estado = $("#estadoEditar").val();

        if (cliente === "" || fecha === "" || hora === "" || servicio === "" || empleado === "" || estado === "") {
            $("#alertaEditar").html('<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>');
            return;
        }

        $.ajax({
            url: "../../controller/citas/actualizar.php",
            type: "POST",
            data: { id: id, cliente: cliente, fecha: fecha, hora: hora, servicio: servicio, empleado: empleado, estado: estado },
            success: function (response) {
                if (response == "ok") {
                    $("#alertaEditar").html('<div class="alert alert-success">Cita actualizada correctamente.</div>');

                    setTimeout(function () {
                        $("#modalEditar").modal("hide");
                        location.reload();
                    }, 1000);
                } else {
                    $("#alertaEditar").html('<div class="alert alert-danger">Error al actualizar la cita.</div>');
                }
            }
        });
    });

    // Eliminar una cita
    $(document).on("click", ".btnEliminar", function () {
        let id = $(this).data('id');

        if (!confirm("¿Estás seguro de eliminar la cita?")) {
            return;
        }

        $.ajax({
            url: "../../controller/citas/eliminar.php",
            type: "POST",
            data: { id: id },
            success: function (response) {
                if (response == "ok") {
                    $("#alertaEliminar").html('<div class="alert alert-success">Cita eliminada correctamente.</div>');

                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    $("#alertaEliminar").html('<div class="alert alert-danger">Error al eliminar la cita.</div>');
                }
            }
        });
    })
});