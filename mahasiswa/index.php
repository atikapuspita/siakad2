<?php
    include "../koneksi/config.php";
    include "c_tambahpengajuan.php";

session_start();

?>

<?php
 $username_mhs = $_SESSION["npm"];
 $user = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE npm = '$username_mhs'");
 ?>

<?php
    $data_pengajuan = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan");
    $jumlah_pengajuan = mysqli_num_rows($data_pengajuan);
?>

<?php
    $data_verifikasi = mysqli_query($koneksi, "SELECT * FROM tb_verifikasi");
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
    <?php include "header_mahasiswa.php"; ?>
    <?php include "sidebar_mahasiswa.php"; ?>

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
                echo $row['nama_mhs']; 
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
            <div class="row col-12">
                <div class="col-lg-6 col-6">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item col-12"><a class="nav-link active" href="#activity" data-toggle="tab"><center>Syarat dan Ketentuan Pengajuan Pengunduran Diri</center></a></li>
                            <ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="post">
                                        <p><ol>
                                            <li>Formulir yang di ajukan telah mendapat tanda tangan</li>
                                        </ol></p>
                                    </div>
                                </div>
                            <div>
                         </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
          <div class="col-2 float-sm-left">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <p><center>Ajukan Permohonan</center></p>
                        </div>  
                        <div class="icon">
                            <i class="ion ion-easel"></i>
                        </div>
                        <a data-toggle ="modal" data-target ="#modal-tambah" class="small-box-footer">Klik Here <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
    </section>
    </div>

<!-- /.Modals Tambah --> 
<div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Pengajuan Pengunduran Diri</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="c_tambahpengajuan.php" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="form-group">
                <label for="">NPM</label>
                       <?php
                      include "../koneksi/config.php";

                      $username_mhs = $_SESSION['username_mhs'];

                      $result= mysqli_query($koneksi, "SELECT npm FROM tb_mahasiswa WHERE username_mhs='$username_mhs'");                
                      while ($row= mysqli_fetch_array($result)) { 
                        ?>
                        <input type="text" class="form-control" id="npm" name='npm' value="<?php echo $row['npm'];?>" readonly>
                      <?php
                      }
                      ?>
                  </div>

              <div class="form-group">
                  <label>Semester</label>
                  <input name = "semester" type="text" class="form-control" id="semester" placeholder="Ex: 3 (Tiga)" required/>
              </div>

              <div class="form-group">
                  <label>Alasan</label>
                  <input name = "alasan" type="text" class="form-control" id="alasan" placeholder="alasan" required/>
              </div>

            <div class="form-group">
                  <label>Tanggal Pengajuan</label>
                  <input name = "tgl_pengajuan" type="date" class="form-control" id="tgl_pengajuan" placeholder="tgl_pengajuan" required/>
              </div>

              <div class="form-group">
                  <label>Nama Orang Tua</label>
                  <input name = "nama_ortu" type="text" class="form-control" id="nama_ortu" placeholder="nama ortu" required/>
              </div>

                <div class="form-group">
                    <label>Tanda Tangan Orang Tua</label>
                    <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="form-control" id="ttd_ortu" name = "ttd_ortu">
                    </div>
                    </div>
                </div>
                </div>

              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name = "tambah">Save changes</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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

<script>
  function myFunction() {
  var x = document.getElementById("myPassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
    x.type = "password";
    }
  }
</script>

</body>
</html>