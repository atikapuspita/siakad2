<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
    $id_jurusan= $_POST['id_jurusan'];
    $nip_npak = $_POST['nip_npak'];
	  $username_kajur = $_POST['username_kajur'];
	  $password_kajur = $_POST['password_kajur'];
    $nama_jurusan = $_POST['nama_jurusan'];
	  $thn_jabatan_kajur = $_POST['thn_jabatan_kajur'];
	  $status_kajur = $_POST['status_kajur'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_jurusan (`id_jurusan`,`nip_npak`,`username_kajur`,`password_kajur`,`nama_jurusan`,`thn_jabatan_kajur`,`status_kajur`) 
VALUES ('$id_jurusan','$nip_npak', '$username_kajur', '$password_kajur', '$nama_jurusan', '$thn_jabatan_kajur','$status_kajur')";

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