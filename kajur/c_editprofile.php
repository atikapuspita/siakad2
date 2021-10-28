<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../koneksi/config.php";

  if(isset($_GET['edit_data'])){

    // membuat variabel untuk menampung data dari form
    $id_jurusan = $_GET['id_jurusan'];
    $nip_npak= $_GET['nip_npak'];
    $username_kajur = $_GET['username_kajur'];
    $passwordLama = $_GET['passwordLama'];
    $nama_jurusan = $_GET['nama_jurusan'];
    $thn_jabatan_kajur = $_GET['thn_jabatan_kajur'];
    $status_kajur = $_GET['status_kajur'];
    
    //(id tidak perlu karena dibikin otomatis)
    $query = "UPDATE tb_jurusan SET id_jurusan='$id_jurusan', nip_npak='$nip_npak',nama_jurusan='$nama_jurusan',username_kajur='$username_kajur',password_kajur='$password_kajur',
    thn_jabatan_kajur='$thn_jabatan_kajur',status_kajur='$status_kajur' WHERE id_jurusan='$id_jurusan'";

    if (mysqli_query($koneksi,$query) == true) {
    echo "
    <script>
    alert('Data Berhasil Diupdate!');
    document.location.href = 'data_kajur.php';
    </script>
    ";
    } else {
    echo "
    <script>
        alert('Data Gagal Diupdate!');
        document.location.href = 'data_kajur.php';
    </script>
    ";
    }

    $cekPassword = mysqli_query($koneksi, "SELECT * FROM tb_jurusan WHERE username_kajur = '$username_kajur' AND password_kajur = '$password_kajur' ");
    if($cekPassword -> num_rows > 0) {
    $password_kajur1 = $_GET['password_kajur1'];
    $password_kajur2 = $_GET['password_kajur2'];

    //$password = md5($_GET['password']);

    if(!empty($password_kajur1 && $password_kajur2)){
        if($password_kajur1 == $password_kajur2){
        $sql = mysqli_query($koneksi, "UPDATE tb_jurusan SET password_kajur ='$password_kajur1' WHERE nip_npak='$nip_npak'");
        }
        else {
        echo "<script> 
            alert ('Password Gagal di Update'); window.location = 'index.php' </script> ";
        }
    }
}
  
  }
?>