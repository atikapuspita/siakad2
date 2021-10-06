<?php

include "../../koneksi/config.php";

$id_doswal=$_GET['id_doswal'];
$result= mysqli_query($koneksi, "SELECT * FROM tb_doswal where id_doswal='$id_doswal'");

$bio= mysqli_fetch_array($result);

    $id_doswal = $bio['id_doswal'];
    $nip_npak = $bio['nip_npak'];
    $nama_doswal = $bio['nama_doswal'];
    $nama_kelas = $bio['nama_kelas'];
	$username = $bio['username'];
	$password = $bio['password'];
	$thn_jabatan = $bio['thn_jabatan'];
	$status = $bio['status'];
	
// $id_doswal=$bio["id_doswal"];
?>

<div class="main">
    <div class="jumbotron p-5">
        <div class="container p-3">
            <h3 class="text-center p-4">Detail Data</h3>
            <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">Id Dosen Wali</td>
                <td width="1%">:</td>
                <td><?php echo $bio['id_doswal']; ?></td>
            </tr>

            <tr>
                <td width="20%">NIP/NIDN</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nip_npak']; ?></td>
            </tr>
            
            <tr>
                <td width="20%">Nama Pegawai</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nama_doswal']; ?></td>
            </tr>
            
            <tr>
                <td width="20%">Jabatan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nama_kelas']; ?></td>
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
                <td><?php echo $bio['thn_jabatan']; ?></td>
            </tr>

            <tr>
                <td width="20%">Status</td>
                <td width="1%">:</td>
                <td><?php echo $bio['status']; ?></td>
            </tr>

        </table>
        <br>
        <a class="btn btn-secondary" href="index.php">Kembali</a>
            </div>
        </div>
    </div>