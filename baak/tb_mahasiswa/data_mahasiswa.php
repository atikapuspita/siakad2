<?php
  include "../../koneksi/config.php";
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
  <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../tampilan/tampilan.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">


</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php
      include "../header.php";
      include "../sidebar.php";
      
      $user = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa INNER JOIN tb_jurusan ON tb_mahasiswa.id_jurusan = tb_jurusan.id_jurusan 
                          INNER JOIN tb_doswal ON tb_mahasiswa.id_doswal = tb_doswal.id_doswal");
  ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                      <th><center>NPM</center></th>
                      <th><center>Nama Mahasiswa</center></th>
                      <th><center>Jurusan</center></th>
                      <th><center>Tahun Angkatan</center></th>
                      <th><center>No.Telp</center></th>
                      <th><center>Foto</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><center><?= $i ?></center></td>
                                <td><?php echo $row['npm']; ?></td>
                                <td><?php echo $row['nama_mhs']; ?></td>
                                <td><?php echo $row['nama_jurusan']; ?></td>
                                <td><center><?php echo $row['thn_angkatan']; ?></center></td>
                                <td><?php echo $row['no_telp_mhs']; ?></td>
                                <td><img src="img/foto/<?php echo $row['foto_mhs'];?>"width="100px" height="100px"></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['npm']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a>                             
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

      <!-- Modal Lihat Detail -->
      <?php $no = 0;
      foreach ($user as $row) : $no++; ?>
<div class="modal fade" id="modaldetail<?php echo $row['npm']; ?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Biodata Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            <?php
              $npm=$row['npm'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa where npm='$npm'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
            <form>
            <div class="row text-center">
              <div class="col-1"></div>
              <div class="col-3 text-center">
                <div class="p-2"> </div>
                <img src="img/foto/<?php echo $row['foto_mhs'];?>" alt="Foto" width="200px" height="300px" class="pt-5">
              </div>
              <div class="col-3 text-left">
                <ul>
                  <li class="p-2"><b>NPM</b></li>
                  <li class="p-2"><b>Id Jurusan</b></li>
                  <li class="p-2"><b>Jurusan</b></li>
                  <li class="p-2"><b>Id Dosen Wali</b></li>
                  <li class="p-2"><b>Kelas</b></li>
                  <li class="p-2"><b>Nama Mahasiswa</b></li>
                  <li class="p-2"><b>Jenis Kelamin</b></li>
                  <li class="p-2"><b>Tahun Angkatan</b></li>
                  <li class="p-2"><b>Alamat</b></li>
                  <li class="p-2"><b>No.Telp</b></li>
                </ul>
              </div>
              
              <ul>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                  <li class="p-2"><b>:</b></li>
                </ul>

              <div class="col text-left">
                <ul>
                  <li class="p-2"><b><?php echo $row['npm']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['id_jurusan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['nama_jurusan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['id_doswal']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['nama_kelas']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['nama_mhs']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['jk']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['thn_angkatan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['alamat']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['no_telp_mhs']; ?></b></li>
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
include "../../AdminLTE/footer.php"
?>

</div>

<!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
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
    $("#id_jurusan").on("change", function(){
      var nama_jurusan = $("#id_jurusan option:selected").attr("nama_jurusan");
      $("#nama_jurusan").val(nama_jurusan);
    });

  });

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#id_doswal").on("change", function(){
      var nama_kelas = $("#id_doswal option:selected").attr("nama_kelas");
      $("#nama_kelas").val(nama_kelas);
    });

  });

</script>

</body>
</html>