<?php
  include "../koneksi/config.php";

  include "c_tambahnilai.php";

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
              <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 12%"><i class="fas fa-plus-circle"></i>  Tambah Data</a>
              <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th><center>No</center></th>
                      <th><center>Nama Mahasiswa</center></th>
                      <th><center>Semester I</center></th>
                      <th><center>Semester II</center></th>
                      <th><center>Semester III</center></th>
                      <th><center>Semester IV</center></th>
                      <th><center>Semester V</center></th>
                      <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                
                  <tbody>
                    <?php $i = 1; ?>
                    
                    <?php foreach ($user as $row) : ?>
                            <tr>
                                <td><center><?= $i ?></center></td>
                                <td><?php echo $row['nama_mhs']; ?></td>
                                <td><center><a href="img/smt1/<?php echo $row['nilai_smt1'];?>" class ="badge badge-success">Unduh KHS Semester I</center></td>
                                <td><center><a href="img/smt2/<?php echo $row['nilai_smt2'];?>" class ="badge badge-success">Unduh KHS Semester II</center></center></td>
                                <td><center><a href="img/smt3/<?php echo $row['nilai_smt3'];?>" class ="badge badge-success">Unduh KHS Semester III</center></center></td>
                                <td><center><a href="img/smt4/<?php echo $row['nilai_smt4'];?>" class ="badge badge-success">Unduh KHS Semester IV</center></td>
                                <td><center><a href="img/smt5/<?php echo $row['nilai_smt5'];?>" class ="badge badge-success">Unduh KHS Semester V</center></center></td>
                                <td><center>
                                  <!-- <a data-toggle ="modal" data-target ="#myModal<?php echo $row['id_nilai']; ?>" class = "btn btn-primary"><i class="nav-icon fas fa-edit"></i>Update</a> -->
                                  <a href="hapus_nilai.php?id_nilai=<?= $row["id_nilai"]; ?>"class ="btn btn-default"><i class="fas fa-trash-alt"></i></a>                                
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
              <h4 class="modal-title">Tambah Data Nilai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_nilai.php" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                  <label for="exampleSelectRounded0">Nama Mahasiswa</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="npm" id="npm">
                      <option> Pilih Nama Mahasiswa</option>
                        <?php $mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa ");
                          foreach ($mahasiswa as $mhs) : 
                        ?>
                          <option value="<?php echo $mhs['npm'] ?>" nama_mhs="<?php echo $mhs['nama_mhs'] ?>"><?php echo $mhs['nama_mhs'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Nilai Semester I</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="nilai_smt1" name = "nilai_smt1">
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file PDF dengan batas max 5 mb</i> <br>
                </div>

                <div class="form-group">
                    <label>Nilai Semester II</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="nilai_smt2" name = "nilai_smt2">
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file PDF dengan batas max 5 mb</i> <br>
                </div>

                <div class="form-group">
                    <label>Nilai Semester III</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="nilai_smt3" name = "nilai_smt3">
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file PDF dengan batas max 5 mb</i> <br>
                </div>

                <div class="form-group">
                    <label>Nilai Semester IV</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="nilai_smt4" name = "nilai_smt4">
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file PDF dengan batas max 5 mb</i> <br>
                </div>

                <div class="form-group">
                    <label>Nilai Semester V</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="nilai_smt5" name = "nilai_smt5">
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file PDF dengan batas max 5 mb</i> <br>
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

            <!-- / modal edit  -->
            <?php $no = 0;
      foreach ($user as $row) : $no++; ?>
      <div class="modal fade" id="myModal<?php echo $row['id_nilai']; ?>" role="dialog">
        <div class="modal-dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Nilai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editnilai.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_nilai=$row['id_nilai'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_nilai where id_nilai='$id_nilai'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
        
              <div class="form-group">
                  <label>NPM</label>
                  <input name = "npm" type="text" class="form-control" value="<?php echo $bio['npm']; ?>" readonly>
              </div>

              <div class="form-group">
                    <label>Nilai Semester I</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name = "nilai_smt1" class="form-control" value="<?php echo $bio['nilai_smt1']; ?>" >
                        <input type="file" name = "nilai_smt1" id="nilai_smt1" class="form-control" />
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak mengupdate</i> <br>
              </div>

              <div class="form-group">
                    <label>Nilai Semester II</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name = "nilai_smt2" class="form-control" value="<?php echo $bio['nilai_smt2']; ?>" >
                        <input type="file" name = "nilai_smt2" id="nilai_smt2" class="form-control" />
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak mengupdate</i> <br>
              </div>

              <div class="form-group">
                    <label>Nilai Semester III</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name = "nilai_smt3" class="form-control" value="<?php echo $bio['nilai_smt3']; ?>" >
                        <input type="file" name = "nilai_smt3" id="nilai_smt3" class="form-control" />
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak mengupdate</i> <br>
              </div>

              <div class="form-group">
                    <label>Nilai Semester IV</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name = "nilai_smt4" class="form-control" value="<?php echo $bio['nilai_smt4']; ?>" >
                        <input type="file" name = "nilai_smt4" id="nilai_smt4" class="form-control" />
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak mengupdate</i> <br>
              </div>

              <div class="form-group">
                    <label>Nilai Semester V</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name = "nilai_smt5" class="form-control" value="<?php echo $bio['nilai_smt5']; ?>" >
                        <input type="file" name = "nilai_smt5" id="nilai_smt5" class="form-control" />
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak mengupdate</i> <br>
              </div>
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
  $(document).ready(function(){
    $("#npm").on("change", function(){
      var nama_mhs = $("#npm option:selected").attr("nama_mhs");
      $("#nama_mhs").val(nama_mhs);
    });

  });

</script>
</body>
</html>