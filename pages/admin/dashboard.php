<?php include '../../includes/header.php'; ?>
<?php include '../../includes/navbar.php'; ?>

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

            <!-- Items -->
            <div class="container-fluid mt-4">
                <h2>Bienvenido
                    <?php echo $_SESSION['usuario']; ?>
                </h2>
                <div class="row">

                    <!-- Card 1 -->
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow-sm border-1">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-scissors fa-3x text-success"></i>
                                <h5 class="card-title mt-2">Servicios</h5>
                                <p class="card-text">Administra tus servicios.</p>
                                <a href="servicios.php" class="btn btn-success">Ingresar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow-sm border-1">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-calendar-check fa-3x text-warning"></i>
                                <h5 class="card-title mt-2">Citas</h5>
                                <p class="card-text">Consulta las citas de los clientes.</p>
                                <a href="citas.php" class="btn btn-warning">Ingresar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card shadow-sm border-1">
                            <div class="card-body text-center">
                                <i class="fa-solid fa-user-plus fa-3x text-danger"></i>
                                <h5 class="card-title mt-2">Empleados</h5>
                                <p class="card-text">Gestiona los empleados de la empresa.</p>
                                <a href="empleados.php" class="btn btn-danger">Ingresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main -->
    </div>
</main>

<?php include '../../includes/footer.php'; ?>