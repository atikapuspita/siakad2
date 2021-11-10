<?php
  include "../koneksi/config.php";
  include "c_tambahpengajuan.php";

  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIAKAD PNC</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../tampilan/tampilan.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php
      include "header_mahasiswa.php";
      include "sidebar_mahasiswa.php";
      
      $user = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan INNER JOIN tb_mahasiswa ON tb_pengajuan.npm = tb_mahasiswa.npm;");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengajuan Pengunduran Diri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengajuan Pengunduran Diri</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th><center>No</center></th>
                          <th><center>Nama Mahasiswa</center></th>
                          <th><center>Alasan</center></th>
                          <th><center>Tanggal Pengajuan</center></th>
                          <th><center>Nama Orang Tua </center></th>
                          <th><center>Status </center></th>
                          <th><center>Aksi</center></th>
                      </tr>
                    </thead>
                  
                    <tbody>
                      <?php $i = 1; ?>
                      <?php 
                          $username_mhs = $_SESSION['username_mhs'];

                          $sql = "SELECT npm FROM tb_mahasiswa WHERE username_mhs='$username_mhs'"; 
                          $result = mysqli_query($koneksi, $sql);
                          while($row = mysqli_fetch_array($result)) {
                            $npm=$row['npm'];
                          }
                      ?>
                      <?php                                                  
                        $sql = "SELECT * FROM tb_pengajuan INNER JOIN tb_mahasiswa ON tb_pengajuan.npm = tb_mahasiswa.npm WHERE username_mhs='$username_mhs'";
                        $result = mysqli_query($koneksi,$sql);
                        $no= 1;
                        while($d = mysqli_fetch_array($result)) {
                          ?>
                          <tr>
                            <td><center><?= $i ?></center></td>
                            <td><?php echo $d['nama_mhs']; ?></td>
                            <td><?php echo $d['alasan']; ?></td>
                            <td><?php echo $d['tgl_pengajuan']; ?></td>
                            <td><?php echo $d["nama_ortu"]; ?></td>
                            <td><?php echo $d["status_pengajuan"]; ?></td>
                            <td><center>
                                <a data-toggle ="modal" data-target="#modaldetail<?php echo $d['id_pengajuan']; ?>" class ="btn btn-primary"><i class="far fa-eye"></i> Details</a> 
                            </td></center>
                          </tr>
                          
                            <?php $i++ ; ?>
                            <?php
                            }
                          ?>
                    </tbody>
                  </table>
              </div>
            <!-- /.card-body -->
            </div>
          <!-- /.card -->
          </div>
        <!-- /.col -->
        </div>
      <!-- /.row -->
      </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>

  <!-- /.Modals Tambah --> 
<div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Pengajuan Pengunduran Diri</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_pengajuan.php" enctype="multipart/form-data">
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

<!-- Modal Lihat Detail -->
<?php $no = 0;
      foreach ($user as $row) : $no++; ?>
<div class="modal fade" id="modaldetail<?php echo $row['id_pengajuan']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Pengajuan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
              <?php
                $id_pengajuan=$row['id_pengajuan'];
                $result= mysqli_query($koneksi, "SELECT * FROM tb_pengajuan INNER JOIN tb_mahasiswa ON tb_pengajuan.npm = tb_mahasiswa.npm WHERE id_pengajuan = $row[id_pengajuan]");                
                while ($bio= mysqli_fetch_array($result)) {
              ?>

<form>
                <div class="card-body box-profile">
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Id Pengajuan</b> <a class="float-right"><?php echo $row['id_pengajuan'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Nama Mahasiswa</b> <a class="float-right"><?php echo $row['nama_mhs'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Semester</b> <a class="float-right"><?php echo $row['semester'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Tanggal Pengajuan</b> <a class="float-right"><?php echo $row['tgl_pengajuan'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Status Pengajuan</b> <a class="float-right"><?php echo $row['status_pengajuan'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Formulir</b> <a class="float-right"><?php echo $row['berkas'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Surat Keputusan</b> <a class="float-right"><?php echo $row['file_sk'] ?></a>
                          </li>

                          </ul>
                </div>
              
              <?php
                  }
              ?>

            </div>
            <div class="modal-footer justify-content-between">
                <a href="index.php" type="submit" class="btn btn-secondary" data-dismiss="modal">Close</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php endforeach ?>


  <?php
  include "../AdminLTE/footer.php"
  ?>

</div>

<!-- jQuery -->
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
  

<script type="text/javascript">
  $(document).ready(function(){
    $("#npm").on("change", function(){
      var nama_mhs = $("#npm option:selected").attr("nama_mhs");
      $("#nama_mhs").val(nama_mhs);
    });

  });
</script>
</body>
</html>