<?php
    include '../koneksi/config.php';
    include 'c_editprofile.php';

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}
?>

<?php
 $username = $_SESSION["username"];
 $user = mysqli_query($koneksi, "SELECT * FROM tb_kajur INNER JOIN tb_pegawai ON tb_kajur.nip_npak = tb_pegawai.nip_npak WHERE username = '$username'");
 ?>

<?php
    $data_pengajuan = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan WHERE status_pengajuan = 'Disetujui Dosen Wali'");
    $jumlah_pengajuan = mysqli_num_rows($data_pengajuan);
?>

<?php
    $data_verifikasi = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan");
    $jumlah_verifikasi = mysqli_num_rows($data_verifikasi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/a.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include "header_kajur.php"; ?>
    <?php include "sidebar_kajur.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Selamat Datang, 
            <?php 
                foreach ($user as $row) : 
                echo $row['nama_pegawai']; 
            ?>
             ! 
            </h1>
          </div>
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $jumlah_pengajuan; ?></h3>
                            <p>Pengajuan Pengunduran Diri</p>
                        </div>  
                        <div class="icon">
                            <i class="ion ion-easel"></i>
                        </div>
                        <a href="data_pengajuan.php" class="small-box-footer">More info <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $jumlah_verifikasi; ?></h3>
                            <p>Verifikasi Pengunduran Diri</p>
                        </div>  
                        <div class="icon">
                            <i class="ion ion-easel"></i>
                        </div>
                        <a href="data_verifikasi.php" class="small-box-footer">More info <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row col-12">
                <div class="col-lg-4 col-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Profil</h3>
                        </div> 
                        <div class="card card-secondary card-outline">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>NIP/NPAK</b> <a class="float-right text-secondary"><td><?php echo $row['nip_npak']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Nama Lengkap</b> <a class="float-right text-secondary"><td><?php echo $row['nama_pegawai']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Username</b> <a class="float-right text-secondary"><td><?php echo $row['username']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Password</b> <a class="float-right text-secondary"><td><?php echo $row['password']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>No.Telp</b> <a class="float-right text-secondary"><td><?php echo $row['no_telp_pegawai']; ?></td></a>
                                    </li>
                                </ul>
                                <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_jurusan']; ?>" class="btn btn-secondary btn-block"><b>Edit Profil</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>

             <!-- / modal edit  -->
             <?php $no = 0;
      foreach ($user as $row) : $no++; ?>
      <div class="modal fade" id="myModal<?php echo $row['id_jurusan']; ?>" role="dialog">
        <div class="modal-dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editprofile.php" method="get" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_jurusan=$row['id_jurusan'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_jurusan where id_jurusan='$id_jurusan'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
            
            <div class="form-group">
              <label>Id Ketua Jurusan</label>
              <input name = "id_jurusan" type="text" class="form-control" value="<?php echo $bio['id_jurusan']; ?>" readonly/>
            </div>

            <div class="form-group">
              <label>NIP/NPAK</label>
              <input name = "nip_npak" type="text" class="form-control" value="<?php echo $bio['nip_npak']; ?>" readonly/>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input name = "username_kajur" type="text" class="form-control" value="<?php echo $bio['username_kajur']; ?>">
            </div>

            <div class="form-group ">
                  <label>PasswordLama</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="passwordLama" placeholder="Password" id="myPassword" value="<?php echo $bio['password_kajur']; ?>">
                  <input type="checkbox" onclick="myFunction()"> Lihat Password
              </div>

              <div class="form-group">
                  <label>Password Baru</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="password_kajur1" id="password_kajur1" placeholder="Masukan password baru" >
              </div>

              <div class="form-group">
                  <label>Ulangi Password Baru</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="password_kajur2" id="password_kajur2" placeholder="Ulangi password baru" >
              </div>

            <div class="form-group" hidden>
              <label>Nama Jurusan</label>
              <input name = "nama_jurusan" type="text" class="form-control" value="<?php echo $bio['nama_jurusan']; ?>" >
            </div>

            <div class="form-group" hidden>
              <label>Masa Jabatan</label>
              <input name = "thn_jabatan_kajur" type="text" class="form-control" value="<?php echo $bio['thn_jabatan_kajur']; ?>">
            </div>

            <div class="form-group">
              <label for ="status_kajur">Status</label>
              <select class = "custom-select rounded-0" id ="status_kajur" name ="status_kajur" required>
                <option><?php echo $bio['status_kajur']; ?></option>
                <option value = "Aktif">Aktif</option>
                <option value = "Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name = "edit_data">Save changes</button>
              </div>
              <?php 
                }
              ?>  
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
              </div>
      <?php endforeach ?>

    <?php include "../AdminLTE/footer.php" ?>
</div>

<?php 

endforeach; 

?>
<!-- jQuery -->
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../AdminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../AdminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../AdminLTE/plugins/moment/moment.min.js"></script>
<script src="../AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../AdminLTE/dist/js/pages/dashboard.js"></script>
</body>
</html>