<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>
<?php include '../../controller/consultas/citas.php'; ?>

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
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Empleados</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#modalRegistro">Nueva
                            cita</button>
                    </div>
                </div>

                <div id="alertaEliminar"></div>
                <!-- Tabla -->
                <div class="mt-4">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Servicio</th>
                                <th>Empleado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaCitas">
                            <?php
                            while ($row = $resultCitas->fetch_assoc()) {

                                // Definimos las alertas
                                // $estadoClass → Variable que almacena la clase de la alerta.
                                // $row['estado'] → Obtiene el estado de la cita.
                                $estadoClass = "";
                                if ($row['estado'] == "pendiente") {
                                    $estadoClass = "alert alert-warning";
                                } elseif ($row['estado'] == "cancelada") {
                                    $estadoClass = "alert alert-danger";
                                } elseif ($row['estado'] == "completa") {
                                    $estadoClass = "alert alert-success";
                                }

                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['cliente_nombre']}</td>
                                    <td>{$row['fecha']}</td>
                                    <td>{$row['hora']}</td>
                                    <td>{$row['servicio']}</td>
                                    <td>{$row['empleado']}</td>
                                    <td>
                                        <div class='$estadoClass' role='alert'>
                                            
                                            ".ucfirst($row['estado'])."
                                        </div>
                                    </td>
                                    <td>
                                        <button class='btn btn-warning btn-sm btnEditar'
                                        data-id='{$row['id']}' 
                                        data-cliente='{$row['cliente_nombre']}'
                                        data-fecha='{$row['fecha']}'
                                        data-hora='{$row['hora']}'
                                        data-servicio='{$row['servicio_id']}'
                                        data-empleado='{$row['usuario_id']}'
                                        data-estado='{$row['estado']}'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                        </button>
                                        <button class='btn btn-danger btn-sm btnEliminar' data-id='{$row['id']}'>
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
                <h5 class="modal-title" id="modalRegistroLabel">Registrar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alerta"></div>
                <form id="formRegistro">
                    <!-- Cliente -->
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <input type="text" class="form-control" id="cliente" placeholder="Ingrese el cliente">
                    </div>
                    <!-- Fecha -->
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha">
                    </div>
                    <!-- Hora -->
                    <div class="form-group">
                        <label for="hora">Hora</label>
                        <input type="time" class="form-control" id="hora">
                    </div>
                    <!-- Servicio -->
                    <div class="form-group">
                        <label for="servicio">Servicio</label>
                        <select class="form-control" id="servicio">
                            <option value="">Seleccione un servicio</option>
                            <?php 
                            $resultServicios = $conn->query("SELECT * FROM servicios");
                            while ($row = $resultServicios->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Empleado -->
                    <div class="form-group">
                        <label for="empleado">Empleado</label>
                        <select class="form-control" id="empleado">
                            <option value="">Seleccione un empleado</option>
                            <?php 
                            $resultEmpleados = $conn->query("SELECT * FROM usuarios");
                            while ($row = $resultEmpleados->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Estado -->
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado">
                            <option value="pendiente">Pendiente</option>
                            <option value="cancelada">Cancelada</option>
                            <option value="completa">Completa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Guardar</button>
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
                <h5 class="modal-title" id="modalEditarLabel">Actualizar citas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alertaEditar"></div>
                <form id="formEditar">
                    <input type="hidden" id="idCita">
                    <!-- Cliente -->
                    <div class="form-group">
                        <label for="clienteEditar">Cliente</label>
                        <input type="text" class="form-control" id="clienteEditar">
                    </div>
                    <!-- Fecha -->
                    <div class="form-group">
                        <label for="fechaEditar">Fecha</label>
                        <input type="date" class="form-control" id="fechaEditar">
                    </div>
                    <!-- Hora -->
                    <div class="form-group">
                        <label for="horaEditar">Hora</label>
                        <input type="time" class="form-control" id="horaEditar">
                    </div>
                    <!-- Servicio -->
                    <div class="form-group">
                        <label for="servicioEditar">Servicio</label>
                        <select class="form-control" id="servicioEditar">
                            <option value="">Seleccione un servicio</option>
                            <?php 
                            $resultServicios = $conn->query("SELECT * FROM servicios");
                            while ($row = $resultServicios->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Empleado -->
                    <div class="form-group">
                        <label for="empleadoEditar">Empleado</label>
                        <select class="form-control" id="empleadoEditar">
                            <option value="">Seleccione un empleado</option>
                            <?php 
                            $resultEmpleados = $conn->query("SELECT * FROM usuarios");
                            while ($row = $resultEmpleados->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Estado -->
                    <div class="form-group">
                        <label for="estadoEditar">Estado</label>
                        <select class="form-control" id="estadoEditar">
                            <option value="pendiente">Pendiente</option>
                            <option value="cancelada">Cancelada</option>
                            <option value="completa">Completa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!--------------------------- Script ----------------------------->
<!-- jQuery 3.5.1 -->
<script src="../../assets/vendor/jQuery/jquery-3.7.1.min.js"></script>
<!-- Empleados -->
<script src="../../assets/js/citas/cita.js"></script>

<?php include '../../includes/footer.php'; ?>