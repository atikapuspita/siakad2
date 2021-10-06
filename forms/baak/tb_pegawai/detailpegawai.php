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
// $nip_npak=$bio["nip_npak"];
?>

<div class="main">
    <div class="jumbotron p-5">
        <div class="container p-3">
            <h3 class="text-center p-4">Detail Data</h3>
            <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">NIP/NIDN</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nip_npak']; ?></td>
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
                <td width="20%">Nama Pegawai</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nama_pegawai']; ?></td>
            </tr>

            <tr>
                <td width="20%">Jabatan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['jabatan']; ?></td>
            </tr>

            <tr>
                <td width="20%">No. Telp</td>
                <td width="1%">:</td>
                <td><?php echo $bio['no_telp_pegawai']; ?></td>
            </tr>

            <tr>
                <td width="20%">Foto</td>
                <td width="1%">:</td>
                <td><img src="img/foto/<?php echo $row['foto_pegawai'];?>"width="100px" height="100px"></td>
            </tr>

            <tr>
                <td width="20%">Tanda Tangan</td>
                <td width="1%">:</td>
                <td><img src="img/ttd/<?php echo $row['ttd_pegawai'];?>"width="100px" height="100px"></td>
</tr>
        </table>
        <a class="btn btn-secondary" href="index.php">Kembali</a>
            </div>
        </div>
    </div>