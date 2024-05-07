<?php
session_start();
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:puskesmas/index.html");
}

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../data/admin.php" class="brand-link">
        <i class="bi bi-hospital ml-3"></i>
        <span class="brand-text font-weight-light ml-2">Admin Puskema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Ilham Arifin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ms-1">
                            <a href="data_pasien.php" class="nav-link d-flex align-items-center">
                                <i class="bi bi-file-earmark-person fs-4 mr-2"></i>
                                <p>Data Pasien</p>
                            </a>
                        </li>

                        <li class="nav-item ms-1">
                            <a href="data_paramedik.php" class="nav-link d-flex align-items-center">
                                <i class="bi bi-clipboard-plus fs-4 mr-2"></i>
                                <p>Data Paramedik</p>
                            </a>
                        </li>

                        <li class="nav-item ms-1">
                            <a href="data_periksa.php" class="nav-link d-flex align-items-center">
                                <i class="bi bi-card-checklist fs-4 mr-2"></i>
                                <p>Data Pemeriksaan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link d-flex align-items-center">
                        <i class="bi bi-box-arrow-left fs-4 mr-2 "></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>