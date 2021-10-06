<?php
  include "../../koneksi/config.php";

  include "c_tambahmhs.php";
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
      include "../../AdminLTE/header.php";
      include "../../AdminLTE/sidebar.php";
      
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
              <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-secondary" style ="width : 10%">Tambah Data</a> </br>
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
                                    <a data-toggle ="modal" data-target="#myModal<?php echo $row['npm']; ?>" class ="btn btn-app"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="hapusmhs.php?npm=<?= $row["npm"]; ?>"class ="btn btn-app"><i class="fas fa-trash-alt"></i></a>                                
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
              <h4 class="modal-title">Tambah Data Mahasiswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method ="post" action ="data_mahasiswa.php" enctype="multipart/form-data">
            <div class="modal-body">

            <div class="form-row">
            <div class="form-group col-6">
                  <label>NPM</label>
                  <input name = "npm" type="text" class="form-control" id="npm" placeholder="npm" required/>
            </div>
            
            <div class="form-group col-6">
                  <label for="nama_mhs">Nama Mahasiswa</label>
                  <input name = "nama_mhs" type="text" class="form-control" id="nama_mhs" placeholder="nama mahasiswa" required/>
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-6">
                  <label>Username</label>
                  <input name = "username_mhs" type="text" class="form-control" id="username_mhs" placeholder="username" required/>
              </div>

              <div class="form-group col-6">
                  <label>Password</label>
                  <input name = "password_mhs" type="text" class="form-control" id="password_mhs" placeholder="password" required/>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label for="exampleSelectRounded0">Nama Jurusan</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="id_jurusan" id="id_jurusan">
                      <option> Pilih Id Jurusan</option>
                        <?php $jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan ");
                          foreach ($jurusan as $jrs) : 
                        ?>
                          <option value="<?php echo $jrs['id_jurusan'] ?>" nama_jurusan="<?php echo $jrs['nama_jurusan'] ?>"><?php echo $jrs['nama_jurusan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>

              <div class="form-group col-6">
                  <label for="exampleSelectRounded0">Nama Kelas</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="id_doswal" id="id_doswal">
                      <option> Pilih Id Dosen Wali</option>
                        <?php $kelas = mysqli_query($koneksi, "SELECT * FROM tb_doswal ");
                          foreach ($kelas as $kls) : 
                        ?>
                          <option value="<?php echo $kls['id_doswal'] ?>" nama_kelas="<?php echo $kls['nama_kelas'] ?>"><?php echo $kls['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
            </div>

            <div class="form-row">
            <div class="form-group col-6">
              <label for ="jk">Jenis Kelamin</label>
              <select class = "custom-select rounded-0" id ="jk" name ="jk" required>
                <option>Pilih Jenis Kelamin</option>
                <option value = "Laki - Laki">Laki - Laki</option>
                <option value = "Perempuan">Perempuan</option>
              </select>
            </div>

              <div class="form-group col-6">
                  <label for="thn_angkatan">Tahun Angkatan</label>
                  <input name = "thn_angkatan" type="number" class="form-control" id="thn_angkatan" placeholder="angkatan" required/>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label for="alamat">Alamat</label>
                  <input name = "alamat" type="text" class="form-control" id="alamat" placeholder="alamat" required/>
              </div>

              <div class="form-group col-6">
                  <label>No.Telp</label>
                  <input name = "no_telp_mhs" type="number" class="form-control" id="no_telp_mhs" placeholder="no telp" required/>
              </div>
            </div> 

              <div class="form-group">
                    <label>Foto Mahasiswa</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="foto_mhs" name = "foto_mhs">
                      </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanda Tangan</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="form-control" id="ttd_mhs" name = "ttd_mhs">
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
      <div class="modal fade" id="myModal<?php echo $row['npm']; ?>" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Mahasiswa</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editmhs.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $npm=$row['npm'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa where npm='$npm'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>
            <div class="form-row">
              <div class="form-group col-6">
                  <label>NPM</label>
                  <input name = "npm" type="text" class="form-control" value="<?php echo $bio['npm']; ?>" readonly>
              </div>

              <div class="form-grou col-6">
                  <label for="nama_mhs">Nama Mahasiswa</label>
                  <input name = "nama_mhs" type="text" class="form-control" value="<?php echo $bio['nama_mhs']; ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label>Username</label>
                  <input name = "username_mhs" type="text" class="form-control" value="<?php echo $bio['username_mhs']; ?>">
              </div>

              <div class="form-grou col-6">
                  <label>Password</label>
                  <input name = "password_mhs" type="text" class="form-control" value="<?php echo $bio['password_mhs']; ?>">
              </div>
            </div>
            

            <div class="form-row">
              <div class="form-group col-6">
                  <label>Id Jurusan</label>
                  <input name = "id_jurusan" type="text" class="form-control" value="<?php echo $bio['id_jurusan']; ?>">
              </div>

            <div class="form-group col-6">
                  <label>Id Dosen Wali</label>
                  <input name = "id_doswal" type="text" class="form-control" value="<?php echo $bio['id_doswal']; ?>">
              </div>
            </div>

            <div class="form-row" hidden>
            <div class="form-group col-6">
              <label for ="jk">Jenis Kelamin</label>
              <select class = "custom-select rounded-0" id ="jk" name ="jk" required>
              <option><?php echo $bio['jk']; ?></option>
                <option value = "Laki - Laki">Laki - Laki</option>
                <option value = "Perempuan">Perempuan</option>
              </select>
            </div>

              <div class="form-group col-6" hidden>
                  <label for="thn_angkatan">Tahun Angkatan</label>
                  <input name = "thn_angkatan" type="number" class="form-control" value="<?php echo $bio['thn_angkatan']; ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-6">
                  <label for="alamat">Alamat</label>
                  <input name = "alamat" type="text" class="form-control" value="<?php echo $bio['alamat']; ?>">
              </div>

              <div class="form-group col-6">
                  <label>No.Telp</label>
                  <input name = "no_telp_mhs" type="number" class="form-control" value="<?php echo $bio['no_telp_mhs']; ?>">
              </div>
            </div> 

           <div class="form-group">
              <label>Foto Mahasiswa</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="hidden" name = "foto_mhs" class="form-control" value="<?php echo $bio['foto_mhs']; ?>" >
                  <input type="file" name = "foto_mhs" id="foto_mhs" class="form-control" />
                </div>
              </div>
                <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak merubah foto</i> <br>
           </div>

            <div class="form-group">
              <label>Tanda Tangan</label>
                <div class="input-group">
                  <div class="custom-file">
                  <input type="hidden" name = "ttd_mhs" class="form-control" value="<?php echo $bio['ttd_mhs']; ?>" >
                  <input type="file" name = "ttd_mhs" id="ttd_mhs" class="form-control" />
                </div>
              </div>
                <i style="float: left;font-size: 14px;color: red">Abaikan jika tidak merubah tanda tangan</i> <br>
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
                  <li class="p-2"><b>Username</b></li>
                  <li class="p-2"><b>Password</b></li>
                  <li class="p-2"><b>Nama Mahasiswa</b></li>
                  <li class="p-2"><b>Jenis Kelamin</b></li>
                  <li class="p-2"><b>Tahun Angkatan</b></li>
                  <li class="p-2"><b>Alamat</b></li>
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
                  <li class="p-2"><b><?php echo $row['username_mhs']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['password_mhs']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['nama_mhs']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['jk']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['thn_angkatan']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['alamat']; ?></b></li>
                  <li class="p-2"><b><?php echo $row['no_telp_mhs']; ?></b></li>
                  <li class="p-2"><b><img src="img/ttd/<?php echo $row['ttd_mhs'];?>"width="100px" height="100px"></b></li>
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