<?php
    include "../koneksi/config.php";
    include "c_editprofile_doswal.php";

session_start();

?>

<?php
 $username = $_SESSION["nip_npak"];

 $user = mysqli_query($koneksi, "SELECT * FROM tb_doswal WHERE nip_npak = '$username'");
 $tik = mysqli_fetch_array($user);

 ?>

<?php
    $data_pengajuan = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan WHERE status_pengajuan = '0'");
    $jumlah_pengajuan = mysqli_num_rows($data_pengajuan);
?>

<?php
    $data_verifikasi = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan WHERE status_pengajuan = '1'");
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
    <?php include "header_doswal.php"; ?>
    <?php include "sidebar_doswal.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Selamat Datang, 
            <?php 
               
                echo $tik['nama_pegawai'];
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
                <div class="col-6">
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

                <div class="col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $jumlah_verifikasi; ?></h3>
                            <p>Verifikasi</p>
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
                            <h3 class="card-title">Profil </h3>
                        </div> 
                        <div class="card card-secondary card-outline">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <b>NIP/NPAK</b> <a class="float-right text-secondary"><td><?php echo $tik['nip_npak']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Nama Lengkap</b> <a class="float-right text-secondary"><td><?php echo $tik['nama_pegawai']; ?></td></a>
                                    </li>
                                    
                                    <li class="list-group-item">
                                        <b>Nama Kelas</b> <a class="float-right text-secondary"><td><?php echo $tik['nama_kelas']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Tahun Jabatan</b> <a class="float-right text-secondary"><td><?php echo $tik['thn_jabatan']; ?></td></a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Status</b> <a class="float-right text-secondary"><td><?php echo $tik['status_doswal']; ?></td></a>
                                    </li>
                                </ul>
                                <a data-toggle ="modal" data-target="#myModal<?php echo $tik['id_doswal']; ?>" class="btn btn-secondary"><b>Edit Profil</b></a>
                                <a data-toggle ="modal" data-target="#editpw<?php echo $tik['id_doswal']; ?>" class="btn btn-secondary"><b>Ubah Password</b></a>
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
  <div class="modal fade" id="myModal<?php echo $tik['id_doswal']; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Dosen Wali</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <form role="form" action="c_editprofile_doswal.php" method="get">
            <div class="modal-body">
              <?php
                $id_doswal=$tik['id_doswal'];
                $result= mysqli_query($koneksi, "SELECT * FROM tb_doswal where id_doswal='$id_doswal'");                
                while ($bio= mysqli_fetch_array($result)) {
              ?>

            <div class="form-group" hidden>
              <label>Id Dosen Wali</label>
              <input name = "id_doswal" type="text" class="form-control" value="<?php echo $bio['id_doswal']; ?>" readonly/>
            </div>

            <div class="form-group" hidden>
              <label>NIP/NPAK</label>
              <input name = "nip_npak" type="text" class="form-control" value="<?php echo $bio['nip_npak']; ?>" readonly/>
            </div>

            
            <div class="form-group" hidden>
              <label>Nama Kelas</label>
              <input name = "nama_kelas" type="text" class="form-control" value="<?php echo $bio['nama_kelas']; ?>" >
            </div>

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input name = "nama_pegawai" type="text" class="form-control" value="<?php echo $bio['nama_pegawai']; ?>" >
            </div>
 
            <div class="form-group">
              <label>Username</label>
              <input name = "username_doswal" type="text" class="form-control" value="<?php echo $bio['username_doswal']; ?>">
            </div>

            <div class="form-group"hidden>
              <label>Password</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="password_doswal" placeholder="Password" id="myPassword" value="<?php echo $bio['password_doswal']; ?>">
                  <input type="checkbox" onclick="myFunction()"> Lihat Password
            </div>

            <div class="form-group">
              <label>No Telp</label>
              <input name = "no_telp_pegawai" type="text" class="form-control" value="<?php echo $bio['no_telp_pegawai']; ?>">
            </div>

            <div class="form-group" hidden>
              <label>Masa Jabatan</label>
              <input name = "thn_jabatan" type="text" class="form-control" value="<?php echo $bio['thn_jabatan']; ?>">
            </div>

            <div class="form-group">
              <label for ="status_doswal">Status</label>
              <select class = "custom-select rounded-0" id ="status_doswal" name ="status_doswal" required>
                <option><?php echo $bio['status_doswal']; ?></option>
                <option value = "Aktif">Aktif</option>
                <option value = "Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>

                </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="edit" id ="edit" class="btn btn-primary" name = "edit">Save changes</button>
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
</div>
        <?php endforeach; ?>


        <!-- edit password -->
        <!-- / modal edit  -->
<?php $no = 0;
foreach ($user as $row) : $no++; ?>
  <div class="modal fade" id="editpw<?php echo $tik['id_doswal']; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Dosen Wali</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <form role="form" action="c_editpassword.php" method="get">
            <div class="modal-body">
              <?php
                $id_doswal=$tik['id_doswal'];
                $result= mysqli_query($koneksi, "SELECT * FROM tb_doswal where id_doswal='$id_doswal'");                
                while ($bio= mysqli_fetch_array($result)) {
              ?>

            <div class="form-group" hidden>
              <label>Id Dosen Wali</label>
              <input name = "id_doswal" type="text" class="form-control" value="<?php echo $bio['id_doswal']; ?>" readonly/>
            </div>

              <div class="form-group">
                  <label>Password Lama</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="passwordLama" placeholder="Password" id="myPassword" value="<?php echo $bio['password_doswal']; ?>">
                  <input type="checkbox" onclick="myFunction()"> Lihat Password
              </div>

              <div class="form-group">
                  <label>Password Baru</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="password1" id="password1" placeholder="Masukan password baru" >
              </div>

              <div class="form-group">
                  <label>Ulangi Password Baru</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi password baru" >
              </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name = "edit">Save changes</button>
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
              </div>
      <?php endforeach ?>



    <?php include "../AdminLTE/footer.php" ?>
</div>

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