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
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Servicios</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success" data-toggle="modal" data-target="#modalRegistro">Nuevo
                            servicio</button>
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
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaServicios">
                            <?php
                            while ($row = $resultServicios->fetch_assoc()) {
                                echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nombre']}</td>
                                    <td>S/ {$row['precio']}</td>
                                    <td>
                                        <button class='btn btn-warning btn-sm btnEditar'
                                        data-id='{$row['id']}' 
                                        data-nombre='{$row['nombre']}'
                                        data-precio='{$row['precio']}'>
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
                <h5 class="modal-title" id="modalRegistroLabel">Registrar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alerta"></div>
                <form id="formRegistro">
                    <div class="form-group">
                        <label for="nombreServicio">Nombre</label>
                        <input type="text" class="form-control" id="nombreServicio" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label for="precioServicio">Precio</label>
                        <input type="number" class="form-control" id="precioServicio" placeholder="Ingrese el precio">
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para la edición -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Registrar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alertaEditar"></div>
                <form id="formEditar">
                    <input type="hidden" id="idServicio">
                    <div class="form-group">
                        <label for="nombreEditar">Nombre</label>
                        <input type="text" class="form-control" id="nombreEditar" placeholder="Ingrese el nombre">
                    </div>
                    <div class="form-group">
                        <label for="precioEditar">Precio</label>
                        <input type="number" class="form-control" id="precioEditar" placeholder="Ingrese el precio">
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--------------------------- Script ----------------------------->
<!-- jQuery 3.5.1 -->
<script src="../../assets/vendor/jQuery/jquery-3.7.1.min.js"></script>
<!-- Servicios -->
<script src="../../assets/js/servicios/servicio.js"></script>

<?php include '../../includes/footer.php'; ?>