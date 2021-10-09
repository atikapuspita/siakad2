<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
  	$nip_npak = $_POST['nip_npak'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama_pegawai = $_POST['nama_pegawai'];
	$jabatan = $_POST['jabatan'];
	$no_telp_pegawai = $_POST['no_telp_pegawai'];

  //Membuat Variabel untuk menyimpan Foto atau Gambar
	$lokasi_foto_pegawai=$_FILES['foto_pegawai']['tmp_name'];
	$foto_pegawai=$_FILES['foto_pegawai']['name'];
	$tipe_foto_pegawai=$_FILES['foto_pegawai']['type'];
	$folder="img/foto/$foto_pegawai";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_foto_pegawai))
	{
		move_uploaded_file($lokasi_foto_pegawai,$folder);
	}

    //Membuat Variabel untuk menyimpan Foto atau Gambar
	$lokasi_ttd_pegawai=$_FILES['ttd_pegawai']['tmp_name'];
	$ttd_pegawai=$_FILES['ttd_pegawai']['name'];
	$tipe_ttd_pegawai=$_FILES['ttd_pegawai']['type'];
	$folder="img/ttd/$ttd_pegawai";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_ttd_pegawai))
	{
		move_uploaded_file($lokasi_ttd_pegawai,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_pegawai (`nip_npak`,`username`,`password`,`nama_pegawai`,`jabatan`,`no_telp_pegawai`,`foto_pegawai`,`ttd_pegawai`) 
VALUES ('$nip_npak', '$username', '$password', '$nama_pegawai', '$jabatan',
'$no_telp_pegawai', '$foto_pegawai', '$ttd_pegawai')";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Tambah Data Berhasil.');window.location='index.php';</script>";
    }

  }
  ?>