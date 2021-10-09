<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../../koneksi/config.php";

  if(isset($_GET['edit'])){

    // membuat variabel untuk menampung data dari form
    $id_doswal = $_GET['id_doswal'];
    $nip_npak= $_GET['nip_npak'];
    $nama_kelas = $_GET['nama_kelas'];
    $username_doswal = $_GET['username_doswal'];
    $password_doswal = $_GET['password_doswal'];
    $thn_jabatan = $_GET['thn_jabatan'];
    $status_doswal = $_GET['status_doswal'];

  //(id tidak perlu karena dibikin otomatis)
  $query = "UPDATE tb_doswal SET id_doswal='$id_doswal', nip_npak='$nip_npak',nama_kelas='$nama_kelas',username_doswal='$username_doswal',password_doswal='$password_doswal',
            thn_jabatan='$thn_jabatan',status_doswal='$status_doswal' WHERE id_doswal='$id_doswal'";

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