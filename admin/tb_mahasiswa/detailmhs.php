<?php

include "../../koneksi/config.php";

$npm=$_GET['npm'];
$result= mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa where npm='$npm'");

$bio= mysqli_fetch_array($result);

    $npm = $bio['npm'];
    $id_jurusan = $bio['id_jurusan'];
    $id_doswal = $bio['id_doswal'];
    $username = $bio['username'];
    $password = $bio['password'];
    $nama_mhs = $bio['nama_mhs'];
    $jk = $bio['jk'];
    $thn_angkatan = $bio['thn_angkatan'];
    $kelas = $bio['kelas'];
    $alamat = $bio['alamat'];
    $no_telp_mhs = $bio['no_telp_mhs'];
	$foto_mhs = $bio['foto_mhs'];
	$ttd_mhs = $bio['ttd_mhs'];
// $nip_npak=$bio["nip_npak"];
?>

<div class="main">
    <div class="jumbotron p-5">
        <div class="container p-3">
            <h3 class="text-center p-4">Detail Data</h3>
            <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">NPM</td>
                <td width="1%">:</td>
                <td><?php echo $bio['npm']; ?></td>
            </tr>
            
            <tr>
                <td width="20%">Id Jurusan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['id_jurusan']; ?></td>
            </tr>

            <tr>
                <td width="20%">Id Dosen Wali</td>
                <td width="1%">:</td>
                <td><?php echo $bio['id_doswal']; ?></td>
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
                <td width="20%">Nama Mahasiswa</td>
                <td width="1%">:</td>
                <td><?php echo $bio['nama_mhs']; ?></td>
            </tr>

            <tr>
                <td width="20%">Jenis Kelamin</td>
                <td width="1%">:</td>
                <td><?php echo $bio['jk']; ?></td>
            </tr>

            <tr>
                <td width="20%">Tahun Angkatan</td>
                <td width="1%">:</td>
                <td><?php echo $bio['thn_angkatan']; ?></td>
            </tr>

            <tr>
                <td width="20%">Kelas</td>
                <td width="1%">:</td>
                <td><?php echo $bio['kelas']; ?></td>
            </tr>

            <tr>
                <td width="20%">Alamat</td>
                <td width="1%">:</td>
                <td><?php echo $bio['alamat']; ?></td>
            </tr>

            <tr>
                <td width="20%">No. Telp</td>
                <td width="1%">:</td>
                <td><?php echo $bio['no_telp_mhs']; ?></td>
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
        <a class="btn btn-secondary" href="data_mahasiswa.php">Kembali</a>
            </div>
        </div>
    </div>