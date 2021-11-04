<?php

include "../AdminLTE/rel.html";
include "../AdminLTE/script.html";


$username = $_SESSION["username"];
$user = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE username = '$username'")
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
            echo $row['jabatan']; 
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data_pegawai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pegawai</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data_kajur.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Ketua Jurusan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data_doswal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Dosen Wali</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data_prodi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Program Studi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data_mahasiswa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mahasiswa</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="data_nilai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Nilai</p>
                </a>
              </li>
            </ul>
          </li>
          
            <li class="nav-item">
            <a href="data_pengajuan.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Pengajuan</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="data_verifikasi.php" class="nav-link">
              <i class="nav-icon far fa-check-square"></i>
              <p>Verifikasi</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="laporan_pengajuan.php" class="nav-link">
              <i class="nav-icon fas fa-list-ol"></i>
              <p>Laporan Pengajuan</p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="../koneksi/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          </li>
            </ul>
          </li>
      </nav>
  </div>
</aside>
