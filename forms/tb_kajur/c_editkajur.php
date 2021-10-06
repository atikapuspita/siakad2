<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../../koneksi/config.php";

  if(isset($_GET['edit'])){

    // membuat variabel untuk menampung data dari form
    $id_jurusan = $_GET['id_jurusan'];
    $nip_npak= $_GET['nip_npak'];
    $nama_jurusan = $_GET['nama_jurusan'];
    $username_kajur = $_GET['username_kajur'];
    $password_kajur = $_GET['password_kajur'];
    $thn_jabatan_kajur = $_GET['thn_jabatan_kajur'];
    $status_kajur = $_GET['status_kajur'];

  //(id tidak perlu karena dibikin otomatis)
  $query = "UPDATE tb_jurusan SET id_jurusan='$id_jurusan', nip_npak='$nip_npak',nama_jurusan='$nama_jurusan',username_kajur='$username_kajur',password_kajur='$password_kajur',
            thn_jabatan_kajur='$thn_jabatan_kajur',status_kajur='$status_kajur' WHERE id_jurusan='$id_jurusan'";

  if (mysqli_query($koneksi,$query) == true) {
    echo "
          <script>
              alert('Data Berhasil Diupdate!');
              document.location.href = 'index.php';
          </script>
        ";
  } else {
    echo "
            <script>
                alert('Data Gagal Diupdate!');
                document.location.href = 'index.php';
            </script>
        ";
  }
  }
?>