// El código dentro de esta función solo se ejecutará cuando el documento HTML haya terminado de cargarse completamente 
$(document).ready(function() {
    $("#loginForm").submit(function (event) {
        event.preventDefault(); // Evita que se recargue la página

        // .val(): Obtiene el valor ingresado en ese campo.
        // .trim(): Elimina los espacios en blanco al principio y al final del texto
        let usuario = $("#usuario").val().trim();
        let password = $("#password").val().trim();

        if (usuario == "" || password == "") {
            $("#alerta").html('<div class="alert alert-warning">Todos los campos son obligatorios.</div>');
            return;
        }

        // AJAX permite enviar datos al servidor de manera asíncrona sin recargar la página.
        $.ajax({

            // Indica el archivo al que se enviarán los datos del formulario
            url: "/sistema-barberia/controller/auth/login.php",

            // Indica el método de envío de los datos
            type: "POST",

            // $(this) hace referencia al formulario #loginForm que disparó el evento.
            // .serialize() convierte los datos del formulario en una cadena de texto con formato
            data: $(this).serialize(),

            // Indica que la respuesta esperada del servidor será en formato JSON.
            dataType: "json",

            // Cuando login.php procesa la solicitud, devuelve una respuesta en formato JSON, que se captura en response. La función success maneja esa respuesta
            success: function (response) {

                // $("#alerta"): Selecciona el elemento donde se mostrará un mensaje (puede ser un div o span en el HTML).
                // .html(response.alerta): Cambia el contenido del elemento seleccionado por el mensaje de alerta que se recibe en la respuesta.
                $("#alerta").html(response.alerta);

                // response.success: Se espera que login.php devuelva un JSON con "success": true cuando el inicio de sesión sea exitoso.
                if (response.success) {

                    // Espera 1.5 segundos (1500 ms).
                    // Luego, redirige a la URL especificada en response.redirect (ejemplo: dashboard.php).
                    setTimeout(function () {
                        window.location.href = response.redirect;
                    }, 1500);
                }
            }
        });
    })
});