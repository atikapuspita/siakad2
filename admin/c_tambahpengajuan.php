<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
  	$id_pengajuan = $_POST['id_pengajuan'];
    $npm = $_POST['npm'];
    $alasan = $_POST['alasan'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $nama_ortu = $_POST['nama_ortu'];
    $semester = $_POST['semester'];
    $status_pengajuan = $_POST['0'];

  //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_ttd_ortu=$_FILES['ttd_ortu']['tmp_name'];
	$nama_ttd_ortu=$_FILES['ttd_ortu']['name'];
	$tipe_ttd_ortu=$_FILES['ttd_ortu']['type'];
	$folder="img/ttd_orangtua/$nama_ttd_ortu";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_ttd_ortu))
	{
		move_uploaded_file($lokasi_ttd_ortu,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_pengajuan (`id_pengajuan`, `npm`, `alasan`, `tgl_pengajuan`, `nama_ortu`,`status_pengajuan`,`ttd_ortu`,`semester`) 
         VALUES ('$id_pengajuan', '$npm', '$alasan', '$tgl_pengajuan', '$nama_ortu','0', '$nama_ttd_ortu', '$semester')";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_pengajuan.php';</script>";
    }

  }
  ?>