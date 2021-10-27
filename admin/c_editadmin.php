<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../koneksi/config.php";

  if(isset($_GET['edit_data'])){

    // membuat variabel untuk menampung data dari form
    $nip_npak= $_GET['nip_npak'];
    $username = $_GET['username'];
    $passwordLama = $_GET['passwordLama'];
    $nama_pegawai = $_GET['nama_pegawai'];
    $jabatan = $_GET['jabatan'];
    $no_telp_pegawai = $_GET['no_telp_pegawai'];
    
    //Membuat Variabel untuk menyimpan Foto atau Gambar
    $nama_file = $_FILES['foto_pegawai']['name'];
	  $source = $_FILES['foto_pegawai']['tmp_name'];
		$folder = "img/foto_pegawai/";

    if($nama_file != ' '){
      move_uploaded_file($source, $folder.$nama_file);
    }
	
    $nama_file1 = $_FILES['ttd_pegawai']['name'];
	  $source = $_FILES['ttd_pegawai']['tmp_name'];
		$folder = "img/ttd_pegawai/";

    if($nama_file1 != ' '){
      move_uploaded_file($source, $folder.$nama_file1);
    }

//fungsi if untuk mengecek apakah foto di upload atau tidak 

if($nama_file AND $nama_file1 != '')
{
  $update = mysqli_query($koneksi, "UPDATE tb_pegawai SET nip_npak='$nip_npak',username='$username',password='$password',
            nama_pegawai='$nama_pegawai',jabatan='$jabatan',no_telp_pegawai='$no_telp_pegawai',
            foto_pegawai='$nama_file',ttd_pegawai='$nama_file1' WHERE nip_npak='$nip_npak'");
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
  $update = mysqli_query($koneksi, "UPDATE tb_pegawai SET nip_npak='$nip_npak',username='$username',password='$password',
            nama_pegawai='$nama_pegawai',jabatan='$jabatan',no_telp_pegawai='$no_telp_pegawai' WHERE nip_npak='$nip_npak'");
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

$cekPassword = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE username = '$username' AND password = '$password' ");
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
          alert ('Password Gagal di Update'); window.location = 'index.php' </script> ";
    }
  }
}
  
  }
?>