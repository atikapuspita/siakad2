<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
  	$npm = $_POST['npm'];
    $id_jurusan = $_POST['id_jurusan'];
    $id_doswal = $_POST['id_doswal'];
    $username_mhs = $_POST['username_mhs'];
    $password_mhs = $_POST['password_mhs'];
    $nama_mhs = $_POST['nama_mhs'];
    $jk = $_POST['jk'];
    $thn_angkatan = $_POST['thn_angkatan'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp_mhs = $_POST['no_telp_mhs'];
	

  //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_foto_mhs=$_FILES['foto_mhs']['tmp_name'];
	$nama_foto_mhs=$_FILES['foto_mhs']['name'];
	$tipe_foto_mhs=$_FILES['foto_mhs']['type'];
	$folder="img/foto/$nama_foto_mhs";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_foto_mhs))
	{
		move_uploaded_file($lokasi_foto_mhs,$folder);
	}

    //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_ttd_mhs=$_FILES['ttd_mhs']['tmp_name'];
	$nama_ttd_mhs=$_FILES['ttd_mhs']['name'];
	$tipe_ttd_mhs=$_FILES['ttd_mhs']['type'];
	$folder="img/ttd/$nama_ttd_mhs";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_ttd_mhs))
	{
		move_uploaded_file($lokasi_ttd_mhs,$folder);
	}

// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_mahasiswa (`npm`, `id_jurusan`, `id_doswal`, `username_mhs`, `password_mhs`, `nama_mhs`, `jk`, `thn_angkatan`, 
         `alamat`, `no_telp_mhs`, `foto_mhs`,`ttd_mhs`) 
         VALUES ('$npm', '$id_jurusan', '$id_doswal', '$username_mhs', '$password_mhs', '$nama_mhs', '$jk', '$thn_angkatan', 
         '$alamat', '$no_telp_mhs','$nama_foto_mhs', '$nama_ttd_mhs')";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_mahasiswa.php';</script>";
    }

  }
  ?>