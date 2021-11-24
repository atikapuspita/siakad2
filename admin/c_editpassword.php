<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../koneksi/config.php";

  if(isset($_GET['edit'])){

    // membuat variabel untuk menampung data dari form
    $nip_npak= $_GET['nip_npak'];
    $passwordLama = $_GET['passwordLama'];

//fungsi if untuk mengecek apakah foto di upload atau tidak 

if($passwordLama != '')
{
  $update = mysqli_query($koneksi, "UPDATE tb_pegawai SET nip_npak='$nip_npak',password='$password' WHERE nip_npak='$nip_npak'");
  if($update) {
    echo "<script> 
          alert ('Data Berhasil di Update'); window.location = 'profile_admin.php' </script> ";
  }
  else 
  {
    echo "<script> 
          alert ('Data Gagal di Update'); window.location = 'profile_admin.php' </script> ";
  }
}
else
{
  $update = mysqli_query($koneksi, "UPDATE tb_pegawai SET nip_npak='$nip_npak',password='$password' WHERE nip_npak='$nip_npak'");
  if($update) {
    echo "<script> 
          alert ('Data Berhasil di Update'); window.location = 'profile_admin.php' </script> ";
  }
  else 
  {
    echo "<script> 
          alert ('Data Gagal di Update'); window.location = 'profile_admin.php' </script> ";
  }
}

$cekPassword = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE password = '$password' ");
if($cekPassword -> num_rows > 0) {
  $password1 = $_GET['password1'];
  $password2 = $_GET['password2'];

  //$password = md5($_GET['password']);

  if(!empty($password1 && $password2)){
    if($password1 == $password2){
      $sql = mysqli_query($koneksi, "UPDATE tb_pegawai SET password ='$password1' WHERE nip_npak='$nip_npak'");
    }
    else {
      echo "<script> 
          alert ('Password Gagal di Update'); window.location = 'profile_admin.php' </script> ";
    }
  }
}
  
  }
?>