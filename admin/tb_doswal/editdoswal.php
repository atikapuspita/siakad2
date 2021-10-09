<?php

include "../../koneksi/config.php";

$id_doswal=$_GET['id_doswal'];

$result= mysqli_query($koneksi, "SELECT * FROM tb_doswal where id_doswal='$id_doswal'");

$bio= mysqli_fetch_array($result);

    $id_doswal = $bio['id_doswal'];
	$nip_npak = $bio['nip_npak'];
	$username = $bio['username'];
	$password = $bio['password'];
	$nama_doswal = $bio['nama_doswal'];
    $nama_kelas = $bio['nama_kelas'];
	$thn_jabatan = $bio['thn_jabatan'];
	$status = $bio['status'];

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
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Dosen Wali</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="c_editdoswal.php" method="post" name="form1" id="form1">
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
                                <label>Nama Dosen Wali</label>
                                <input name = "nama_doswal" type="text" class="form-control" value="<?= $nama_doswal; ?>" placeholder="Nama Dosen Wali">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <input name = "nama_kelas" type="text" class="form-control" value="<?= $nama_kelas; ?>" placeholder="Jabatan">
                            </div>

                            <div class="form-group">
                                <label>Masa Jabatan</label>
                                <input name = "thn_jabatan" type="text" class="form-control" value="<?= $thn_jabatan; ?>" placeholder="Masa Jabatan">
                            </div>

                            <div class="form-group">
                                <label for ="status">Status</label>
                                <select class = "custom-select rounded-0" id ="status" name ="status" required>
                                        <option><?= $thn_jabatan; ?></option>
                                        <option value = "aktif">Aktif</option>
                                        <option value = "tidak aktif">Tidak Aktif</option>
                                    </select>
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