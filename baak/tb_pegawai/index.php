<?php
  include "../../koneksi/config.php";

  include "c_tambahdata.php";
  include "c_editdata.php";

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
              <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 15%">Tambah Data</a> 
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
                                <td><img src="img/foto/<?php echo $row['foto_pegawai'];?>"width="100px" height="100px"></td>
                                <td><center>
                                    <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['nip_npak']; ?>" class ="btn btn-app"><i class="far fa-eye"></i></a> 
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['nip_npak']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="hapusdata.php?nip_npak=<?= $row["nip_npak"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
            <form method ="post" action ="index.php" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="form-row">
              <div class="form-group  col-6">
                  <label>NIP / NPAK</label>
                  <input name = "nip_npak" type="text" class="form-control" id="nip_npak" placeholder="NIP/NPAK" required/>
              </div>

              <div class="form-group col-6">
                  <label for="nama_pegawai">Nama Pegawai</label>
                  <input name = "nama_pegawai" type="text" class="form-control" id="nama_pegawai" placeholder="nama pegawai" required/>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label>Password</label>
                  <input name = "password" type="text" class="form-control" id="password" placeholder="password" required/>
              </div>

              <div class="form-group  col-6">
                  <label>Username</label>
                  <input name = "username" type="text" class="form-control" id="username" placeholder="username" required/>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label>Jabatan</label>
                  <input name = "jabatan" type="text" class="form-control" id="jabatan" placeholder="jabatan" required/>
              </div>

              <div class="form-group col-6">
                  <label>No.Telp</label>
                  <input name = "no_telp_pegawai" type="number" class="form-control" id="no_telp_pegawai" placeholder="no telp" required/>
              </div>
            </div> 

              <div class="form-group">
                    <label>Foto Pegawai</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="foto_pegawai" name = "foto_pegawai">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanda Tangan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control" id="ttd_pegawai" name = "ttd_pegawai">
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
            <form role="form" action="c_editdata.php" method="post" enctype="multipart/form-data">
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
                  <input name = "nama_pegawai" type="text" class="form-control" value="<?php echo $bio['nama_pegawai']; ?>" readonly>
              </div>
              </div>

              <div class="form-row">
              <div class="form-group col-6">
                  <label>Password</label>
                  <input name = "password" type="text" class="form-control" value="<?php echo $bio['password']; ?>">
              </div>

              <div class="form-group col-6">
                  <label>Username</label>
                  <input name = "username" type="text" class="form-control" value="<?php echo $bio['username']; ?>">
              </div>
              </div>

              <div class="form-row">
              <div class="form-group col-6">
                  <label>Jabatan</label>
                  <input name = "jabatan" type="text" class="form-control" value="<?php echo $bio['jabatan']; ?>">
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
    <div class="modal-dialog modal-lg">
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
            <div class="row text-center">
              <div class="col-1"></div>
              <div class="col-3 text-center">
                <div class="p-2"> </div>
                <img src="img/foto/<?php echo $row['foto_pegawai'];?>" alt="Foto" width="150px" height="150px" class="pt-5">
              </div>
              <div class="col-3 text-left">
                <ul>
                  <li class="p-2"><b>NIP/NPAK</b></li>
                  <li class="p-2"><b>Nama Pegawai</b></li>
                  <li class="p-2"><b>Username</b></li>
                  <li class="p-2"><b>Password</b></li>
                  <li class="p-2"><b>Jabatan</b></li>
                  <li class="p-2"><b>No.Telp</b></li>
                  <li class="p-2"><b>Tanda Tangan</b></li>
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
                </ul>
              
              <div class="col text-left">
                <ul>
                  <li class="p-2"><b><?php echo $row['nip_npak']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['nama_pegawai']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['username']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['password']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['jabatan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['no_telp_pegawai']; ?></b></li>
                  <li class="p-2"><b><img src="img/ttd/<?php echo $row['ttd_pegawai'];?>"width="100px" height="100px"></b></li>
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
</body>
</html>