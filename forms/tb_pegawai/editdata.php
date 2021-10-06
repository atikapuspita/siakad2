<?php

include "../../koneksi/config.php";

$nip_npak=$_GET['nip_npak'];

$result= mysqli_query($koneksi, "SELECT * FROM tb_pegawai where nip_npak='$nip_npak'");

$bio= mysqli_fetch_array($result);

	$nip_npak = $bio['nip_npak'];
	$username = $bio['username'];
	$password = $bio['password'];
	$nama_pegawai = $bio['nama_pegawai'];
	$jabatan = $bio['jabatan'];
	$no_telp_pegawai = $bio['no_telp_pegawai'];
	$foto_pegawai = $bio['foto_pegawai'];
	$ttd_pegawai = $bio['ttd_pegawai'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Akademik</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../AdminLTE/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <?php
        
        include "../../AdminLTE/header.php";
        include "../../AdminLTE/sidebar.php";
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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pegawai</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="c_editdata.php" method="post" name="form1" id="form1">
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIP / NPAK</label>
                                <input name = "nip_npak" type="text" class="form-control" value="<?= $nip_npak; ?>" placeholder="NIP/NPAK">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input name = "username" type="text" class="form-control" value="<?= $username; ?>" placeholder="Username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input name = "password" type="text" class="form-control" value="<?= $password; ?>" placeholder="password">
                            </div>

                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input name = "nama_pegawai" type="text" class="form-control" value="<?= $nama_pegawai; ?>" placeholder="Nama Pegawai">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <input name = "jabatan" type="text" class="form-control" value="<?= $jabatan; ?>" placeholder="Jabatan">
                            </div>

                            <div class="form-group">
                                <label>No.Telp</label>
                                <input name = "no_telp_pegawai" type="text" class="form-control" value="<?= $no_telp_pegawai; ?>" placeholder="No.Telp">
                            </div>

                            <div class="form-group">
                                <label>Foto Pegawai</label>
                                <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" value="<?= $foto_pegawai; ?>" name='foto_pegawai'>
                                            
                                    <input type="hidden" value="<?= $foto_pegawai; ?>" name='foto_pegawai'>
                                    <label class="custom-file-label" for="foto_pegawai">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label>Tanda Tangan</label>
                                <div class="input-group">
                                <div class="custom-file">
                                        <input type="file" value="<?= $foto_pegawai; ?>" name='foto_pegawai'>
                                            
                                        <input type="hidden" value="<?= $foto_pegawai; ?>" name='foto_pegawai'>
                                    <label class="custom-file-label" for="ttd_pegawai">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                </div>
                            </div>

                        </div>
                            
                        <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>
            <!-- /.card -->
    </div>
</div>

<!-- jQuery -->
<script src="../../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../AdminLTE/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>