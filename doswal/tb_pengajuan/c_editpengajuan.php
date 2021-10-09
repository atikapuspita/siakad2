<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../../koneksi/config.php";

  if(isset($_POST['edit_data'])){

    // membuat variabel untuk menampung data dari form
    $id_pengajuan= $_POST['id_pengajuan'];
    $npm = $_POST['npm'];
    $alasan = $_POST['alasan'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $nama_ortu = $_POST['nama_ortu'];
    $status_pengajuan = $_POST['status_pengajuan'];
    
    //(id tidak perlu karena dibikin otomatis)
  $query = "UPDATE tb_pengajuan SET status_pengajuan = '$status_pengajuan' WHERE id_pengajuan='$id_pengajuan'";

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