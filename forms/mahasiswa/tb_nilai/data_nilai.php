<?php
  include "../../../koneksi/config.php";

  include "c_tambahnilai.php";

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
      
      $user = mysqli_query($koneksi, "SELECT * FROM tb_nilai INNER JOIN tb_mahasiswa ON tb_nilai.npm = tb_mahasiswa.npm");
  ?>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Nilai Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Nilai Mahasiswa</li>
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
                      <th><center>Nilai Semester I</center></th>
                      <th><center>Nilai Semester II</center></th>
                      <th><center>Nilai Semester III</center></th>
                      <th><center>Nilai Semester IV</center></th>
                      <th><center>Nilai Semester V</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><center><?= $i ?></center></td>
                                <td><?php echo $row['nama_mhs']; ?></td>
                                <td><center><img src="img/smt1/<?php echo $row['nilai_smt1'];?>"width="100px" height="100px"></center></td>
                                <td><center><img src="img/smt2/<?php echo $row['nilai_smt2'];?>"width="100px" height="100px"></center></td>
                                <td><center><img src="img/smt3/<?php echo $row['nilai_smt3'];?>"width="100px" height="100px"></center></td>
                                <td><center><img src="img/smt4/<?php echo $row['nilai_smt4'];?>"width="100px" height="100px"></center></td>
                                <td><center><img src="img/smt5/<?php echo $row['nilai_smt5'];?>"width="100px" height="100px"></center></td>
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