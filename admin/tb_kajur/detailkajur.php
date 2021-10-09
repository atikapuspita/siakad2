<?php

include "../../koneksi/config.php";

$id_jurusan=$_GET['id_jurusan'];
$result= mysqli_query($koneksi, "SELECT * FROM tb_jurusan where id_jurusan='$id_jurusan'");

$bio= mysqli_fetch_array($result);

    $id_jurusan = $bio['id_jurusan'];
    $nip_npak = $bio['nip_npak'];
    $nama_kajur = $bio['nama_kajur'];
    $nama_jurusan = $bio['nama_jurusan'];
	$username = $bio['username'];
	$password = $bio['password'];
	$thn_jabatan_kajur = $bio['thn_jabatan_kajur'];
	$status = $bio['status'];
	
// $id_jurusan=$bio["id_jurusan"];
?>

<div class="main">
    <div class="jumbotron p-5">
        <div class="container p-3">
            <h3 class="text-center p-4">Detail Data</h3>
            <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">Id Jurusan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['id_jurusan']; ?></td>
            </tr>

            <tr>
                <td width="20%">NIP/NIDN</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nip_npak']; ?></td>
            </tr>
            
            <tr>
                <td width="20%">Nama Pegawai</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nama_kajur']; ?></td>
            </tr>
            
            <tr>
                <td width="20%">Jabatan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nama_jurusan']; ?></td>
            </tr>
            <tr>
                <td width="20%">Username</td>
                <td width="1%">:</td>
                <td><?php echo $bio['username']; ?></td>
            </tr>

            <tr>
                <td width="20%">Password</td>
                <td width="1%">:</td>
                <td><?php echo $bio['password']; ?></td>
            </tr>

            <tr>
                <td width="20%">Masa Jabatan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['thn_jabatan_kajur']; ?></td>
            </tr>

            <tr>
                <td width="20%">Status</td>
                <td width="1%">:</td>
                <td><?php echo $bio['status']; ?></td>
            </tr>

        </table>
        <a class="btn btn-secondary" href="index.php">Kembali</a>
            </div>
        </div>
    </div>