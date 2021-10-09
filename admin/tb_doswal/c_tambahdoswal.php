<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
    $id_doswal= $_POST['id_doswal'];
    $nip_npak = $_POST['nip_npak'];
    $username_doswal = $_POST['username_doswal'];
    $password_doswal = $_POST['password_doswal'];
    $nama_kelas = $_POST['nama_kelas'];
    $thn_jabatan = $_POST['thn_jabatan'];
    $status_doswal = $_POST['status_doswal'];

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_doswal (`id_doswal`,`nip_npak`,`username_doswal`,`password_doswal`,`nama_kelas`,`thn_jabatan`,`status_doswal`) 
VALUES ('$id_doswal','$nip_npak', '$username_doswal', '$password_doswal', '$nama_kelas', '$thn_jabatan',
'$status_doswal')";

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