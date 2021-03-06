<?php
  include "../koneksi/config.php";

  include "c_tambahdoswal.php";
  include "c_editdoswal.php";

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
      
      $user = mysqli_query($koneksi, "SELECT * FROM tb_doswal INNER JOIN tb_pegawai ON tb_doswal.nip_npak = tb_pegawai.nip_npak");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Dosen Wali</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Dosen Wali</li>
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
                <!-- <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-success" style ="width : 10%"><i class="fas fa-plus-circle"></i>  Tambah Data</a> <br>-->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th><center>No</center></th>
                          <th><center>NIP/NPAK</center></th>
                          <th><center>Nama Pegawai</center></th>
                          <th><center>Kelas</center></th>
                          <th><center>Masa Jabatan</center></th>
                          <th><center>Status</center></th>
                          <th><center>Aksi</center></th>
                      </tr>
                    </thead>
                  
                    <tbody>
                      <?php $i = 1; ?>
                      
                      <?php foreach ($user as $row) : ?>
                          <tr>
                            <td><center><?= $i ?></center></td>
                            <td><?php echo $row['nip_npak']; ?></td>
                            <td><?php echo $row['nama_pegawai']; ?></td>
                            <td><?php echo $row['nama_kelas']; ?></td>
                            <td><center><?php echo $row["thn_jabatan"]; ?></center></td>
                            <td><?php echo $row["status_doswal"]; ?></td>
                            <td><center>
                                <a data-toggle ="modal" data-target="#modaldetail<?php echo $row["id_doswal"]; ?>" class = "btn btn-default"><i class="far fa-eye"></i></a>
                                <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_doswal']; ?>" class = "btn btn-default"><i class="nav-icon fas fa-edit"></i></a>
                                <a href="hapus_doswal.php?id_doswal=<?= $row["id_doswal"]; ?>" class = "btn btn-default"><i class="fas fa-trash-alt"></i></a>                                
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
          <h4 class="modal-title">Tambah Data Dosen Wali</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form method ="post" action ="data_doswal.php">
          <div class="modal-body">
          <div class="form-group">
                  <label for="exampleSelectRounded0">Nama Pegawai</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="nip_npak" id="nip_npak">
                      <option> Silahkan Pilih</option>
                        <?php $tb_pegawai = mysqli_query($koneksi, "SELECT * FROM tb_pegawai ");
                          foreach ($tb_pegawai as $dtg) : 
                        ?>
                          <option value="<?php echo $dtg['nip_npak'] ?>" nama_pegawai="<?php echo $dtg['nama_pegawai'] ?>"><?php echo $dtg['nama_pegawai'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>

            <div class="form-group">
              <label>Username</label>
              <input name = "username_doswal" type="text" class="form-control" id="username_doswal" placeholder="username" required/>
            </div>

            <div class="form-group">
              <label>Password</label>
              <input name = "password_doswal" type="password" class="form-control" id="password_doswal" placeholder="password" required/>
            </div>

            <div class="form-group">
              <label for="nama_kelas">Kelas</label>
              <input name = "nama_kelas" type="text" class="form-control" id="nama_kelas" placeholder="Jabatan" required/>
            </div>

            <div class="form-group">
              <label>Masa Jabatan</label>
              <input name = "thn_jabatan" type="text" class="form-control" id="thn_jabatan" placeholder="Ex : 2015-2020" required/>
            </div>

            <div class="form-group">
              <label for ="status_doswal">Status</label>
              <select class = "custom-select rounded-0" id ="status_doswal" name ="status_doswal" required>
                <option>--- Pilih Salah Satu ---</option>
                <option value = "Aktif">Aktif</option>
                <option value = "Tidak Aktif">Tidak Aktif</option>
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
  <div class="modal fade" id="myModal<?php echo $row['id_doswal']; ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Dosen Wali</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <form role="form" action="c_editdoswal.php" method="get">
            <div class="modal-body">
              <?php
                $id_doswal=$row['id_doswal'];
                $result= mysqli_query($koneksi, "SELECT * FROM tb_doswal where id_doswal='$id_doswal'");                
                while ($bio= mysqli_fetch_array($result)) {
              ?>

            <div class="form-group">
              <label>Id Dosen Wali</label>
              <input name = "id_doswal" type="text" class="form-control" value="<?php echo $bio['id_doswal']; ?>" readonly/>
            </div>

            <div class="form-group" hidden>
              <label>NIP/NPAK</label>
              <input name = "nip_npak" type="text" class="form-control" value="<?php echo $bio['nip_npak']; ?>" readonly/>
            </div>

            
            <div class="form-group">
              <label>Nama Kelas</label>
              <input name = "nama_kelas" type="text" class="form-control" value="<?php echo $bio['nama_kelas']; ?>" >
            </div>
 
            <div class="form-group">
              <label>Username</label>
              <input name = "username_doswal" type="text" class="form-control" value="<?php echo $bio['username_doswal']; ?>">
            </div>

            <div class="form-group">
              <label>Password</label><span class="text-red">*</span></label>
                  <input type="password" class="form-control" name="password_doswal" placeholder="Password" id="myPassword" value="<?php echo $bio['password_doswal']; ?>">
                  <input type="checkbox" onclick="myFunction()"> Lihat Password
            </div>

            <div class="form-group">
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
        <?php endforeach ?>

<!-- Modal Lihat Detail -->
<?php $no = 0;
    foreach ($user as $row) : $no++; 
?>
      <div class="modal fade" id="modaldetail<?php echo $row["id_doswal"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Biodata Dosen Wali</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <?php
                $id_doswal=$row['id_doswal'];
                $result= mysqli_query($koneksi, "SELECT * FROM tb_doswal INNER JOIN tb_pegawai ON tb_doswal.nip_npak = tb_pegawai.nip_npak WHERE id_doswal = $row[id_doswal]");                
                while ($bio= mysqli_fetch_array($result)) {
              ?>

              <form>
                <div class="card-body box-profile">
                  <div class="text-center"></div>
                    <h3 class="profile-username text-center"><?php echo $row['nama_pegawai'] ?></h3>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>ID</b> <a class="float-right"><?php echo $row['id_doswal'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>NIP/NPAK</b> <a class="float-right"><?php echo $row['nip_npak'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Username</b> <a class="float-right"><?php echo $row['username_doswal'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Password</b> <a class="float-right"><?php echo $row['password_doswal'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Nama Kelas</b> <a class="float-right"><?php echo $row['nama_kelas'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Tahun Jabatan</b> <a class="float-right"><?php echo $row['thn_jabatan'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Status</b> <a class="float-right"><?php echo $row['status_doswal'] ?></a>
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