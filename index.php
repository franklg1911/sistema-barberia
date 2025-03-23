<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!------------------ Icono pestaña ------------------>
    <link
      rel="icon"
      href="assets/image/icons/icono-pestaña.png"
      type="image/png"
    >

    <!-------------------- Custom css ------------------->
    <link rel="stylesheet" href="assets/css/custom.css" />

    <!---------------- Boostrap v4.5.3 ------------------>
    <link
      rel="stylesheet"
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
    />

    <title>Inicio</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mt-5">
            <div class="card-header text-center">
              <img
                src="assets/image/logos/logo-barberia.png"
                alt="Logo empresa"
                class="logo img-fluid"
              />
              <!-- <h3 class="mt-3">Iniciar sesión</h3> -->
            </div>
            <div class="card-body">


              <form id="loginForm">
              <!-- Alertas -->
              <div id="alerta"></div>  

                <!-- Usuario -->
                <div class="form-group">
                  <label for="usuario">Usuario</label>
                  <input
                    type="text"
                    name="usuario"
                    id="usuario"
                    class="form-control"
                    placeholder="Ingresa tu usuario"
                    autocomplete="username"
                  />
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Ingresa tu contraseña"
                    autocomplete="current-password"
                  />
                </div>
                <button type="submit" class="btn btn-dark btn-block">Ingresar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--------------------------- Script ----------------------------->
    <!-- jQuery 3.5.1 -->
    <script src="assets/vendor/jQuery/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 4.5.3 -->
    <script src="assets/vendor/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Auth login -->
    <script src="assets/js/auth/login.js"></script>
  </body>
</html>
