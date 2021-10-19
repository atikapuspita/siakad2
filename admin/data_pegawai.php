<?php
  include "../koneksi/config.php";

  include "c_tambahpegawai.php";
  include "c_editpegawai.php";

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
    
    $user = mysqli_query($koneksi, "SELECT * FROM tb_pegawai");
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
              <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-success" style ="width : 10%"><i class="fas fa-plus-circle"></i>  Tambah Data</a> 
              <br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th><center>No</center></th>
                      <th><center>NIP/NPAK</center></th>
                      <th><center>Nama Pegawai</center></th>
                      <th><center>Jabatan</center></th>
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
                                <td><?php echo $row['nip_npak']; ?></td>
                                <td><?php echo $row['nama_pegawai']; ?></td>
                                <td><?php echo $row["jabatan"]; ?></td>
                                <td><?php echo $row["no_telp_pegawai"]; ?></td>
                                <td><center><img src="img/foto_pegawai/<?php echo $row['foto_pegawai'];?>"width="100px" height="100px"></center></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['nip_npak']; ?>" class ="btn btn-primary"><i class="far fa-eye"></i> Details</a> 
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['nip_npak']; ?>" class ="btn btn-success"><i class="nav-icon fas fa-edit"></i> Update</a>
                                    <a href="hapus_pegawai.php?nip_npak=<?= $row["nip_npak"]; ?>"class ="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>                                
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
              <h4 class="modal-title">Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_pegawai.php" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="form-row">
              <div class="form-group  col-6">
                  <label>NIP / NPAK</label>
                  <input name = "nip_npak" type="text" class="form-control" id="nip_npak" placeholder="Ex : 1901020290393456" required/>
              </div>

              <div class="form-group col-6">
                  <label for="nama_pegawai">Nama Pegawai</label>
                  <input name = "nama_pegawai" type="text" class="form-control" id="nama_pegawai" placeholder="nama pegawai" required/>
              </div>
            </div>

            <div class="form-row">
            <div class="form-group  col-6">
                  <label>Username</label>
                  <input name = "username" type="text" class="form-control" id="username" placeholder="username" required/>
              </div>

              <div class="form-group col-6">
                  <label>Password</label>
                  <input name = "password" type="password" class="form-control" id="password" placeholder="password" required/>
              </div>
            </div>

            <div class="form-row col-12">
              <div class="form-group col-6">
                <label for ="status_doswal">Jabatan</label>
                <select class = "custom-select rounded-0" id ="jabatan" name ="jabatan" required>
                  <option>--- Pilih Jabatan ---</option>
                  <option value = "Admin">Admin</option>
                  <option value = "Ketua Jurusan">Ketua Jurusan</option>
                  <option value = "Dosen Wali">Dosen Wali</option>
                  <option value = "Ketua Jurusan dan Dosen Wali">Ketua Jurusan dan Dosen Wali</option>
                  <option value = "Wadir I">Wakil Direktur I</option>
                  <option value = "Direktur">Direktur</option>
                  </select>
              </div>

              <div class="form-group col-6">
                  <label>No.Telp</label>
                  <input name = "no_telp_pegawai" type="number" class="form-control" id="no_telp_pegawai" placeholder="Ex : 0856xxx" required/>
              </div>
            </div> 

              <div class="form-group">
                    <label>Foto Pegawai</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="foto_pegawai" name = "foto_pegawai">
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file JPEG/JPG/PNG dengan batas max 5 mb</i> <br>
                </div>

                <div class="form-group">
                    <label>Tanda Tangan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control" id="ttd_pegawai" name = "ttd_pegawai">
                    </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: black">Tipe file JPEG/JPG/PNG dengan batas max 5 mb</i> <br>
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
      <div class="modal fade" id="myModal<?php echo $row['nip_npak']; ?>" role="dialog">
        <div class="modal-dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editpegawai.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $nip_npak=$row['nip_npak'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_pegawai where nip_npak='$nip_npak'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
            
            <div class="form-row">
            <div class="form-group col-6">
                  <label>NIP/NPAK</label>
                  <input name = "nip_npak" type="text" class="form-control" value="<?php echo $bio['nip_npak']; ?>" readonly>
              </div>

              <div class="form-group col-6">
                  <label>Nama Pegawai</label>
                  <input name = "nama_pegawai" type="text" class="form-control" value="<?php echo $bio['nama_pegawai']; ?>">
              </div>
              </div>

              <div class="form-row">
              <div class="form-group col-6">
                  <label>Username</label>
                  <input name = "username" type="text" class="form-control" value="<?php echo $bio['username']; ?>">
              </div>
              
              <div class="form-group col-6">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" id="myPassword" value="<?php echo $bio['password']; ?>">
                  <input type="checkbox" onclick="myFunction()"> Lihat Password
              </div>
              </div>

              <div class="form-row">
                <div class="form-group col-6">
                <label for ="jabatan">Jabatan</label>
                <select class = "custom-select rounded-0" id ="jabatan" name ="jabatan" required>
                  <option><?php echo $bio['jabatan']; ?></option>
                  <option value = "Admin">Admin</option>
                  <option value = "Ketua Jurusan">Ketua Jurusan</option>
                  <option value = "Dosen Wali">Dosen Wali</option>
                  <option value = "Ketua Jurusan dan Dosen Wali">Ketua Jurusan dan Dosen Wali</option>
                  <option value = "Wadir I">Wakil Direktur I</option>
                  <option value = "Direktur">Direktur</option>
                </select>
             </div>

              <div class="form-group col-6">
                  <label>No.Telp</label>
                  <input name = "no_telp_pegawai" type="number" class="form-control" value="<?php echo $bio['no_telp_pegawai']; ?>">
              </div>
              </div>

              <div class="form-group">
                    <label>Foto Pegawai</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" name = "foto_pegawai" class="form-control" value="<?php echo $bio['foto_pegawai']; ?>" >
                        <input type="file" name = "foto_pegawai" id="foto_pegawai" class="form-control" />
                      </div>
                    </div>
                    <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak merubah tanda tangan</i> <br>
                    </div>

              <div class="form-group">
                <label>Tanda Tangan</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="hidden" name = "ttd_pegawai" class="form-control" value="<?php echo $bio['ttd_pegawai']; ?>" >
                      <input type="file" name = "ttd_pegawai" id="ttd_pegawai" class="form-control" />
                    </div>
                  </div>
                  <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak merubah tanda tangan</i>
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

      <!-- Modal Lihat Detail -->
      <?php $no = 0;
      foreach ($user as $row) : $no++; ?>
<div class="modal fade" id="modaldetail<?php echo $row['nip_npak']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Biodata Pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            <?php
              $nip_npak=$row['nip_npak'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_pegawai where nip_npak='$nip_npak'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
                <form>
                <div class="card-body box-profile">
                  <div class="text-center"></div>
                  <center>
                  <img src="img/foto_pegawai/<?php echo $row['foto_pegawai'];?>" alt="Foto" width="150" class="rounded-circle"></center><br>
                    <h3 class="profile-username text-center"><?php echo $row['nama_pegawai'] ?></h3>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>NIP/NPAK</b> <a class="float-right"><?php echo $row['nip_npak'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Username</b> <a class="float-right"><?php echo $row['username'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Password</b> <a class="float-right"><?php echo $row['password'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>No.Telp</b> <a class="float-right"><?php echo $row['no_telp_pegawai'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Jabatan</b> <a class="float-right"><?php echo $row['jabatan'] ?></a>
                          </li>

                          <li class="list-group-item">
                            <b>Tanda Tangan</b> <img src="img/ttd_pegawai/<?php echo $row['ttd_pegawai'];?>" alt="Foto" width="100px" height="100px" class="float-right">
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