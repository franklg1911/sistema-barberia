$(document).ready(function () {
   
    // Registrar un empleado
    $("#formRegistro").submit(function (e) {
        e.preventDefault();

        // Capturamos los valores de los campos del formulario
        let usuario = $("#username").val().trim();
        let contraseña = $("#contraseña").val().trim();
        let rol = $("#rol").val().trim();
        
        if (usuario === "" || contraseña === "" || rol === "") {
            $("#alerta").html('<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>');
            return;
        }

        $.ajax({
            url: "../../controller/empleados/registrar.php",
            type: "POST",
            data: { usuario: usuario, contraseña: contraseña, rol: rol },
            success: function (response) {
                if (response == "ok") {
                    $("#alerta").html('<div class="alert alert-success">Empleado registrado correctamente.</div>');

                    setTimeout(function () {
                        $("#modalRegistro").modal("hide");
                        location.reload();
                    }, 1000);

                } else {
                    $("#alerta").html('<div class="alert alert-danger">Error al registrar el empleado.</div>');
                }
            }
        });
    });


    // Editar empleado
    $(document).on("click", ".btnEditar", function () {
       
        // Cargar datos en el modal de edición
        let id = $(this).data("id");
        let username = $(this).data("username");
        let password = $(this).data("password");
        let rol = $(this).data("role");

        $("#idEmpleado").val(id);
        $("#usernameEditar").val(username);
        $("#contraseñaEditar").val(password);
        $("#rolEditar").val(rol);


        $("#modalEditar").modal("show");
    });

    $("#formEditar").submit(function (e) {
       e.preventDefault();
       
       let id = $("#idEmpleado").val();
       let username = $("#usernameEditar").val();
       let contraseña = $("#contraseñaEditar").val();
       let rol = $("#rolEditar").val();

       if (username === "" || contraseña === "" || rol === "") {
        $("#alertaEditar").html('<div class="alert alert-warning" role="alert">Todos los campos son obligatorios</div>');
       }
       
       $.ajax({
        url: "../../controller/empleados/actualizar.php",
        type: "POST",
        data: { id: id, username: username, password: contraseña, role: rol },
        success: function (response) {
            if (response.trim() === "ok") {
                $("#alertaEditar").html('<div class="alert alert-success">Empleado actualizado correctamente.</div>');

                setTimeout(function () {
                    $("#modalEditar").modal("hide");
                    location.reload();
                }, 1000);
            } else {
                $("#alertaEditar").html('<div class="alert alert-danger">Error al actualizar el empleado.</div>');
            }
        }
       });
    });

    // Eliminar empleado
    $(document).on("click", ".btnEliminar", function () {
       let id = $(this).data("id");
       
       if (!confirm("¿Estás seguro de eliminar este empleado?")) {
           return;
       }

       $.ajax({
        url: "../../controller/empleados/eliminar.php",
        type: "POST",
        data: { id: id },
        success: function (response) {
            if (response == "ok") {
                $("#alertaEliminar").html('<div class="alert alert-success">Empleado eliminado correctamente.</div>');

                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                $("#alertaEliminar").html('<div class="alert alert-danger">Error al eliminar el empleado.</div>');
            }
        }        
       });
    });
});