<?php

include "../AdminLTE/rel.html";
include "../AdminLTE/script.html";


$username_mhs = $_SESSION["username_mhs"];
$user = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE username_mhs = '$username_mhs'")
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../AdminLTE/dist/img/logo_pnc.png" alt="SIAKAD" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIAKAD PNC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../AdminLTE/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">
            <?php foreach ($user as $row) :
            echo $row ['nama_mhs']; 
            endforeach; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                  <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                  </a>
              </li> 

                <li class="nav-item">
                  <a href="profile.php" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                    <p> Profile Mahasiswa</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="data_nilai.php" class="nav-link">
                  <i class="nav-icon fas fa-file-download"></i>
                    <p>Nilai Mahasiswa</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="data_pengajuan.php" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                    <p> Pengajuan</p>
                  </a>
                </li>

            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
            </li>
        </ul>
      </nav>
  </div>
</aside>
