<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../controller/consultas/empleadoServicio.php'; ?>

<main>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark text-white vh-100 p-3">
            <h4 class="text-center">Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link text-white"><i class="fa-solid fa-chart-line"></i>
                        Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="servicios.php" class="nav-link text-white"><i class="fa-solid fa-scissors"></i>
                        Servicios</a>
                </li>
                <li class="nav-item">
                    <a href="citas.php" class="nav-link text-white"><i class="fa-solid fa-calendar-check"></i> Citas</a>
                </li>
                <li class="nav-item">
                    <a href="empleados.php" class="nav-link text-white"><i class="fa-solid fa-user-plus"></i>
                        Empleados</a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar -->

        <!-- Main -->
        <div class="flex-grow-1 p-3">
            <div class="container-fluid mt-4">

                <!-- Card -->
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Empleados</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modalRegistro">Nuevo
                            empleado</button>
                    </div>
                </div>

                <div id="alertaEliminar"></div>
                <!-- Tabla -->
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Contraseña</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaEmpleados">
                            <?php
                           while($row = $resultEmpleados->fetch_assoc()) {
                               echo "<tr>
                                   <td>{$row['id']}</td>
                                   <td>{$row['username']}</td>
                                   <td>{$row['password']}</td>
                                   <td>{$row['role']}</td>
                                   <td>
                                        <button class='btn btn-warning btn-sm btnEditar'
                                            data-id='{$row['id']}'
                                            data-username='{$row['username']}'
                                            data-password='{$row['password']}'
                                            data-role='{$row['role']}'>
                                            <i class='fa-solid fa-pen-to-square'></i> 
                                        </button>
                                        <button class='btn btn-danger btn-sm btnEliminar'
                                            data-id='{$row['id']}'>
                                            <i class='fa-solid fa-trash'></i>
                                        </button>                                        
                                   </td>
                               </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Main -->
    </div>
</main>

<!-- Modal para el registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistroLabel">Registrar empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alerta"></div>
                <form id="formRegistro">
                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Ingrese el usuario">
                    </div>
                    <!-- Contraseña -->
                    <div class="form-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="text" class="form-control" id="contraseña" placeholder="Ingrese la contraseña">
                    </div>
                    <!-- Rol -->
                    <div class="form-group">
                        <label for="contraseña">Rol</label>
                        <select class="form-control" id="rol">
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para la edicion -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alertaEditar"></div>
                <form id="formEditar">
                    <input type="hidden" id="idEmpleado">
                    <!-- Username -->
                    <div class="form-group">
                        <label for="usernameEditar">Usuario</label>
                        <input type="text" class="form-control" id="usernameEditar" placeholder="Ingrese el usuario">
                    </div>
                    <!-- Contraseña -->
                    <div class="form-group">
                        <label for="contraseñaEditar">Contraseña</label>
                        <input type="text" class="form-control" id="contraseñaEditar"
                            placeholder="Ingrese la contraseña">
                    </div>
                    <!-- Rol -->
                    <div class="form-group">
                        <label for="rolEditar">Rol</label>
                        <select class="form-control" id="rolEditar">
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!--------------------------- Script ----------------------------->
<!-- jQuery 3.5.1 -->
<script src="../../assets/vendor/jQuery/jquery-3.7.1.min.js"></script>
<!-- Empleados -->
<script src="../../assets/js/empleados/empleado.js"></script>

<?php include '../../includes/footer.php'; ?>