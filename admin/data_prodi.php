<?php
  include "../koneksi/config.php";

  include "c_tambahprodi.php";
  include "c_editprodi.php";

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
      include "header_admin.php";
      include "sidebar_admin.php";
      
      $user = mysqli_query($koneksi, "SELECT * FROM tb_prodi");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Program Studi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Program Studi</li>
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
                <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 12%"><i class="fas fa-plus-circle"></i>  Tambah Data</a> <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th><center>No</center></th>
                          <th><center>Nama Prodi</center></th>
                          <th><center>Aksi</center></th>
                      </tr>
                    </thead>
                  
                    <tbody>
                      <?php $i = 1; ?>
                      
                      <?php foreach ($user as $row) : ?>
                          <tr>
                            <td><center><?= $i ?></center></td>
                            <td><?php echo $row['nama_prodi']; ?></td>
                            <td><center>
                                <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_prodi']; ?>" class = "btn btn-default"><i class="fas fa-edit"></i> </a>
                                <a href="hapus_prodi.php?id_prodi=<?= $row["id_prodi"]; ?>" class = "btn btn-default"><i class="fas fa-trash-alt"></i> </a>                                
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
          <h4 class="modal-title">Tambah Data Program Studi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method ="post" action ="data_prodi.php">
          <div class="modal-body">

            <div class="form-group">
              <label for ="nama_prodi">Nama Program Studi</label>
              <select class = "custom-select rounded-0" id ="nama_prodi" name ="nama_prodi" required>
                <option>--- Pilih Salah Satu ---</option>
                <option value = "D3 - Teknik Informatika">D3 - Teknik Informatika</option>
                <option value = "D3 - Teknik Mesin">D3 - Teknik Mesin</option>
                <option value = "D3 - Teknik Elektro">D3 - Teknik Elektro</option>
                <option value = "D3 - Teknik Listrik">D3 - Teknik Listrik</option>
                <option value = "D4 - Teknik Pengendalian Pencemaran Lingkungan">D4 - Teknik Pengendalian Pencemaran Lingkungan</option>
                <option value = "D4 - Teknik Pengembangan Produk Agroindustri">D4 - Teknik Pengembangan Produk Agroindustri</option>
                </select>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name = "tambah">Save changes</button>
            </div>
          </div>
        </form>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

<!-- / modal edit  -->
<?php $no = 0;
foreach ($user as $row) : $no++; ?>
  <div class="modal fade" id="myModal<?php echo $row['id_prodi']; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Program Studi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <form role="form" action="c_editprodi.php" method="get">
            <div class="modal-body">
              <?php
                $id_prodi=$row['id_prodi'];
                $result= mysqli_query($koneksi, "SELECT * FROM tb_prodi where id_prodi='$id_prodi'");                
                while ($bio= mysqli_fetch_array($result)) {
              ?>

            <div class="form-group">
              <label>Id Program Studi</label>
              <input name = "id_prodi" type="text" class="form-control" value="<?php echo $bio['id_prodi']; ?>" readonly/>
            </div>

            <div class="form-group">
              <label for ="nama_prodi">Nama Program Studi</label>
              <select class = "custom-select rounded-0" id ="nama_prodi" name ="nama_prodi" required>
                <option><?php echo $bio['nama_prodi']; ?></option>
                <option value = "D3 - Teknik Informatika">D3 - Teknik Informatika</option>
                <option value = "D3 - Teknik Mesin">D3 - Teknik Mesin</option>
                <option value = "D3 - Teknik Elektro">D3 - Teknik Elektro</option>
                <option value = "D3 - Teknik Listrik">D3 - Teknik Listrik</option>
                <option value = "D4 - Teknik Pengendalian Pencemaran Lingkungan">D4 - Teknik Pengendalian Pencemaran Lingkungan</option>
                <option value = "D4 - Teknik Pengembangan Produk Agroindustri">D4 - Teknik Pengembangan Produk Agroindustri</option>
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
    $("#nip_npak").on("change", function(){
      var nama_pegawai = $("#nip_npak option:selected").attr("nama_pegawai");
      $("#nama_pegawai").val(nama_pegawai);
    });

  });
</script>
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