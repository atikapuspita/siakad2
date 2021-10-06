<?php
  include "../../../koneksi/config.php";

  include "c_tambahpengajuan.php";
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
  <link rel="stylesheet" href="../../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../tampilan/tampilan.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../AdminLTE/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php
      include "../header.php";
      include "../sidebar.php";
      
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
                <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 15%">Tambah Data</a><br>
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
                      
                      <?php foreach ($user as $row) : ?>
                          <tr>
                            <td><center><?= $i ?></center></td>
                            <td><?php echo $row['nama_mhs']; ?></td>
                            <td><?php echo $row['alasan']; ?></td>
                            <td><?php echo $row['tgl_pengajuan']; ?></td>
                            <td><?php echo $row["nama_ortu"]; ?></td>
                            <td><?php echo $row["status_pengajuan"]; ?></td>
                            <td><center>
                                <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['id_pengajuan']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>                                
                            </td></center>
                          </tr>
                          
                            <?php $i++ ; ?>
  
                      <?php endforeach; ?>
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
            <form method ="post" action ="index.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                  <label>NPM</label>
                  <input name = "npm" type="text" class="form-control" id="npm" placeholder="npm" required/>
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
                    <label>Tanda Tangan</label>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pengajuan Pengunduran Diri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            <?php
              $id_pengajuan=$row['id_pengajuan'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_pengajuan where id_pengajuan='$id_pengajuan'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
            <form>
            <div class="row text-center">
              <div class="col-1"></div>
              <div class="col-1 text-center">
              </div>

              <div class=" text-left">
                <ul>
                  <li class="p-2"><b>Id Pengajuan</b></li>
                  <li class="p-2"><b>NPM</b></li>
                  <li class="p-2"><b>Nama Mahasiswa</b></li>
                  <li class="p-2"><b>Tanggal Pengajuan</b></li>
                  <li class="p-2"><b>Berkas</b></li>
                </ul>
              </div>

              <ul>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                </ul>
              
              <div class="col text-left">
                <ul>
                  <li class="p-2"><b><?php echo $row['id_pengajuan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['npm']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['nama_mhs']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['tgl_pengajuan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['berkas']; ?></b></li>
                </ul>
               </div>
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
  include "../../../AdminLTE/footer.php"
  ?>

</div>

<!-- jQuery -->
<script src="../../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../../../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../AdminLTE/dist/js/demo.js"></script>
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

</body>
</html>