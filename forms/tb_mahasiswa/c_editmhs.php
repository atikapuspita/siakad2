<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../../koneksi/config.php";

  if(isset($_POST['edit_data'])){

    // membuat variabel untuk menampung data dari form
    $npm = $_POST['npm'];
    $id_jurusan = $_POST['id_jurusan'];
    $id_doswal = $_POST['id_doswal'];
    $username_mhs = $_POST['username_mhs'];
    $password_mhs = $_POST['password_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $jk = $_POST['jk'];
    $thn_angkatan = $_POST['thn_angkatan'];
    $alamat = $_POST['alamat'];
    $no_telp_mhs = $_POST['no_telp_mhs'];
    
     //Membuat Variabel untuk menyimpan Foto atau Gambar
     $nama_file = $_FILES['foto_mhs']['name'];
     $source = $_FILES['foto_mhs']['tmp_name'];
     $folder = "img/foto/";
 
     if($nama_file != ' '){
       move_uploaded_file($source, $folder.$nama_file);
     }
   
     $nama_file1 = $_FILES['ttd_mhs']['name'];
     $source = $_FILES['ttd_mhs']['tmp_name'];
     $folder = "img/ttd/";
 
     if($nama_file1 != ' '){
       move_uploaded_file($source, $folder.$nama_file1);
     }
 
 //fungsi if untuk mengecek apakah foto di upload atau tidak 
 
 if($nama_file AND $nama_file1 != '')
 {
   $update = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET npm='$npm',id_jurusan='$id_jurusan',id_doswal='$id_doswal',username_mhs='$username_mhs',password_mhs='$password_mhs',
             nama_mhs='$nama_mhs',jk='$jk',thn_angkatan='$thn_angkatan',alamat='$alamat',no_telp_mhs='$no_telp_mhs',
             foto_mhs='$nama_file',ttd_mhs='$nama_file1' WHERE npm='$npm'");
   if($update) {
     echo "<script> 
           alert ('Data Berhasil di Update'); window.location = 'data_mahasiswa.php' </script> ";
   }
   else 
   {
     echo "<script> 
           alert ('Data Gagal di Update'); window.location = 'data_mahasiswa.php' </script> ";
   }
 }
 else
 {
   $update = mysqli_query($koneksi, "UPDATE tb_mahasiswa SET npm='$npm',id_jurusan='$id_jurusan',id_doswal='$id_doswal',username_mhs='$username_mhs',password_mhs='$password_mhs',
             nama_mhs='$nama_mhs',jk='$jk',thn_angkatan='$thn_angkatan',alamat='$alamat',no_telp_mhs='$no_telp_mhs' WHERE npm='$npm'");
   if($update) {
     echo "<script> 
           alert ('Data Berhasil di Update'); window.location = 'data_mahasiswa.php' </script> ";
   }
   else 
   {
     echo "<script> 
           alert ('Data Gagal di Update'); window.location = 'data_mahasiswa.php' </script> ";
   }
 }
  }
?>