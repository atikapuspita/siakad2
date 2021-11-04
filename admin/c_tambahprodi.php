<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
    $nama_prodi = $_POST['nama_prodi'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_prodi (`nama_prodi`) 
VALUES ('$nama_prodi')";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_prodi.php';</script>";
    }

  }
  ?>