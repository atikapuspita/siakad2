<?php
  include "../koneksi/config.php";

  include "c_tambahpengajuan.php";
  include "c_editpengajuan.php";
  include "function_verifikasi.php";

  session_start();
  $nip_npak = $_SESSION['nip_npak'];
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
        
      $user = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan INNER JOIN tb_mahasiswa ON tb_pengajuan.npm = tb_mahasiswa.npm ;");
      $data = mysqli_query($koneksi, "SELECT * FROM tb_verifikasi INNER JOIN tb_pengajuan ON tb_verifikasi.id_pengajuan = tb_pengajuan.id_pengajuan");
      $jabatan = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE nip_npak = '$nip_npak'");
      $result = mysqli_fetch_array($jabatan);
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

    <?php 
    if( isset($_POST["verifikasi"]) ){
    verifikasi($_POST);
};?>

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
                <a data-toggle ="modal" data-target ="#modal-tambah" class = "btn btn-block btn-success" style ="width : 12%"><i class="fas fa-plus-circle"></i>  Tambah Data</a><br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                          <th><center>No</center></th>
                          <th><center>Nama Mahasiswa</center></th>
                          <th><center>Alasan</center></th>
                          <th><center>Tanggal Pengajuan</center></th>
                          <th><center>Nama Orang Tua </center></th>
                          <th><center>Status </center></th>
                          <th width="16%"><center>Verifikasi </center></th>
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
                            <?php 
                              if ($row['status_pengajuan'] == "0") {
                                  $status_pengajuan = "Belum diverifikasi";
                                  $warna = 'warning';
                              } else {
                                  if ($row['status_pengajuan'] == "1") {
                                      $status_pengajuan = "Diiverifikasi Dosen Wali";
                                      $warna = 'info';
                                  } elseif ($row['status_pengajuan'] == "2") {
                                      $status_pengajuan = "Diiverifikasi Ketua Jurusan";
                                      $warna = 'secondary';
                                  } elseif ($row['status_pengajuan'] == "3") {
                                      $status_pengajuan = "Selesai diverifikasi";
                                      $warna = 'success';
                                  } elseif ($row['status_pengajuan'] == "4") {
                                      $status_pengajuan = "Ditolak";
                                      $warna = 'danger';
                                  } else {
                                      $status_pengajuan = "Status not found";
                                      $warna = '';
                                  }
                              } ?>
                              <td><center><?php echo "<a class='badge badge-".$warna."'>".$status_pengajuan."</a>"; ?></center></td>
                              <td><center>
                              <?php
                                  if ($row['status_pengajuan'] == "2") { ?>
                              <div class="row text-center d-flex justify-content-center">
                                <div class="col">
                              <form action="" method="post">
                                <input type="hidden" name="id_pengajuan" value="<?= $row['id_pengajuan']; ?>">
                                <input type="hidden" name="nip_npak" value="<?= $nip_npak; ?>">
                                <input type="hidden" name="status_verifikasi" value="Diverifikasi">
                                  <button type ="submit" class = "btn btn-outline-success btn-block btn-sm" name="verifikasi" value="verifikasi"  onclick="return confirm('Anda yakin menerima pengajuan ini?')" >
                                        <i class = "fa fa-check-circle"></i> Terima</button>
                              </form>
                                </div>

                              <div class="col">
                              <form action="" method="post">
                                <input type="hidden" name="id_pengajuan" value="<?= $row['id_pengajuan']; ?>">
                                <input type="hidden" name="nip_npak" value="<?= $nip_npak; ?>">
                                <input type="hidden" name="status_verifikasi" value="Ditolak">
                                <button type ="submit" class = "btn btn-outline-danger btn-block btn-sm" name="verifikasi" value="verifikasi"  onclick="return confirm('Anda yakin menolak pengajuan ini?')" >
                                        <i class = "fa fa-check-circle"></i> Tolak</button>
                              </form>
                              </div>
                              </div>
                                  <?php } else {
                                      echo "<a class = 'badge badge-info'>Terverifikasi</a>";
                                  }
                                  ?>
                            </td></center>
                            <td><center>
                              <div class="row">
                                <div class="col-3">
                                  <a data-toggle ="modal" data-target="#modaldetail<?php echo $row['id_pengajuan']; ?>" class = "btn btn-default"><i class="far fa-eye"></i></h6></a> 
                                </div>

                                <div class="col-3">
                                  <a data-toggle ="modal" data-target="#myModal<?php echo $row['id_pengajuan']; ?>" class = "btn btn-default"><i class="nav-icon fas fa-edit"></i></a>                              
                                </div>
                                
                                <div class="col-3">
                                  <a href="formulir.php?id_pengajuan=<?= $row["id_pengajuan"]; ?>" class = "btn btn-default"><i  class="fas fa-file-download"></i></a>
                                </div>

                                <div class="col-3">
                                  <a href="hapus_pengajuan.php?id_pengajuan=<?= $row["id_pengajuan"]; ?>" class = "btn btn-default"><i class="fas fa-trash-alt"></i></a>  
                                  </div>
                                </div>
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
            <form method ="post" action ="data_pengajuan.php" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="form-group">
                  <label for="exampleSelectRounded0">Nama Mahasiswa</label>
                    <select type="text" class="form-control" aria-describedby="emailHelp" name="npm" id="npm">
                      <option> Silahkan Pilih</option>
                        <?php $tb_mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa ");
                          foreach ($tb_mahasiswa as $mhs) : 
                        ?>
                          <option value="<?php echo $mhs['npm'] ?>" nama_pegawai="<?php echo $mhs['nama_mhs'] ?>"><?php echo $mhs['nama_mhs'] ?></option>
                        <?php endforeach; ?>
                    </select>
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

         <!-- / modal edit  -->
         <?php $no = 0;
      foreach ($user as $row) : $no++; ?>
      <div class="modal fade" id="myModal<?php echo $row['id_pengajuan']; ?>" role="dialog">
        <div class="modal-dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Pengajuan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="c_editpengajuan.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
              $id_pengajuan=$row['id_pengajuan'];
              $result= mysqli_query($koneksi, "SELECT * FROM tb_pengajuan where id_pengajuan='$id_pengajuan'");                
              while ($bio= mysqli_fetch_array($result)) {
            ?>

            <div class="form-group">
                  <label>Id Pengajuan</label>
                  <input name = "id_pengajuan" type="text" class="form-control" value="<?php echo $bio['id_pengajuan']; ?>" readonly/>
              </div>

              <div class="form-group">
                  <label>NPM</label>
                  <input name = "npm" type="text" class="form-control" value="<?php echo $bio['npm']; ?>" readonly/>
              </div>

              <div class="form-group">
                  <label>Alasan</label>
                  <input name = "alasan" type="text" class="form-control" value="<?php echo $bio['alasan']; ?>" readonly/>
              </div>

              <div class="form-group">
                  <label>Tanggal Pengajuan</label>
                  <input name = "tgl_pengajuan" type="date" class="form-control" value="<?php echo $bio['tgl_pengajuan']; ?>" readonly/>
              </div>

              <div class="form-group">
                  <label>Nama Orang Tua</label>
                  <input name = "nama_ortu" type="text" class="form-control" value="<?php echo $bio['nama_ortu']; ?>" readonly/>
              </div>

              <div class="form-group">
                <label for="ttd_ortu">Tanda Tangan Orang Tua</label>
                  <div class="input-group">
                    <div class="custom-file">
                    <input type="hidden" name = "ttd_ortu" class="form-control" value="<?php echo $bio['ttd_ortu']; ?>" >
                        <input type="file" name = "ttd_ortu" id="ttd_ortu" class="form-control" />
                    </div>
                  </div>
              </div>

              <div class="form-group">
              <label for ="status">Status</label>
              <select class = "custom-select rounded-0" id ="status_pengajuan" name ="status_pengajuan" required>
                <option><?php echo $bio['status_pengajuan']; ?></option>
                <option value = "0">Ditolak</option>
                <option value = "1">Disetujui Dosen Wali</option>
                <option value = "2">Disetujui Ketua Jurusan</option>
              </select>
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