<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../koneksi/config.php";

  if(isset($_GET['edit'])){

    // membuat variabel untuk menampung data dari form
    $id_doswal= $_GET['id_doswal'];
    $passwordLama = $_GET['passwordLama'];

//fungsi if untuk mengecek apakah foto di upload atau tidak 

if($passwordLama != '')
{
  $update = mysqli_query($koneksi, "UPDATE tb_doswal SET id_doswal='$id_doswal',password_doswal='$password_doswal' WHERE id_doswal='$id_doswal'");
  if($update) {
    echo "<script> 
          alert ('Data Berhasil di Update'); window.location = 'index.php' </script> ";
  }
  else 
  {
    echo "<script> 
          alert ('Data Gagal di Update'); window.location = 'index.php' </script> ";
  }
}
else
{
  $update = mysqli_query($koneksi, "UPDATE tb_doswal SET id_doswal='$id_doswal',password_doswal='$password_doswal' WHERE id_doswal='$id_doswal'");
  if($update) {
    echo "<script> 
          alert ('Data Berhasil di Update'); window.location = 'index.php' </script> ";
  }
  else 
  {
    echo "<script> 
          alert ('Data Gagal di Update'); window.location = 'index.php' </script> ";
  }
}

$cekPassword = mysqli_query($koneksi, "SELECT * FROM tb_doswal WHERE password_doswal = '$password_doswal' ");
if($cekPassword -> num_rows > 0) {
  $password1 = $_GET['password1'];
  $password2 = $_GET['password2'];

  //$password = md5($_GET['password']);

  if(!empty($password1 && $password2)){
    if($password1 == $password2){
      $sql = mysqli_query($koneksi, "UPDATE tb_doswal SET password_doswal ='$password1' WHERE id_doswal='$id_doswal'");
    }
    else {
      echo "<script> 
          alert ('Password Gagal di Update'); window.location = 'index.php' </script> ";
    }
  }
}
  
  }
?>