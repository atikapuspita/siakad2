<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
    $id_nilai = $_POST['id_nilai'];
  	$npm = $_POST['npm'];

  //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_nilai_smt1=$_FILES['nilai_smt1']['tmp_name'];
	$nama_nilai_smt1=$_FILES['nilai_smt1']['name'];
	$tipe_nilai_smt1=$_FILES['nilai_smt1']['type'];
	$folder="img/smt1/$nama_nilai_smt1";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_nilai_smt1))
	{
		move_uploaded_file($lokasi_nilai_smt1,$folder);
	}

    //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_nilai_smt2=$_FILES['nilai_smt2']['tmp_name'];
	$nama_nilai_smt2=$_FILES['nilai_smt2']['name'];
	$tipe_nilai_smt2=$_FILES['nilai_smt2']['type'];
	$folder="img/smt2/$nama_nilai_smt2";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_nilai_smt2))
	{
		move_uploaded_file($lokasi_nilai_smt2,$folder);
	}

    //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_nilai_smt3=$_FILES['nilai_smt3']['tmp_name'];
	$nama_nilai_smt3=$_FILES['nilai_smt3']['name'];
	$tipe_nilai_smt3=$_FILES['nilai_smt3']['type'];
	$folder="img/smt3/$nama_nilai_smt3";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_nilai_smt3))
	{
		move_uploaded_file($lokasi_nilai_smt3,$folder);
	}

    //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_nilai_smt4=$_FILES['nilai_smt4']['tmp_name'];
	$nama_nilai_smt4=$_FILES['nilai_smt4']['name'];
	$tipe_nilai_smt4=$_FILES['nilai_smt4']['type'];
	$folder="img/smt4/$nama_nilai_smt4";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_nilai_smt4))
	{
		move_uploaded_file($lokasi_nilai_smt4,$folder);
	}

    //Membuat Variabel untuk menyimpan Foto atau Gambar
  
	$lokasi_nilai_smt5=$_FILES['nilai_smt5']['tmp_name'];
	$nama_nilai_smt5=$_FILES['nilai_smt5']['name'];
	$tipe_nilai_smt5=$_FILES['nilai_smt5']['type'];
	$folder="img/smt5/$nama_nilai_smt5";
	
	//Membuat Nofitikasi upload Foto atau Gambar
	if(!empty($lokasi_nilai_smt5))
	{
		move_uploaded_file($lokasi_nilai_smt5,$folder);
	}


// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
$query = "INSERT INTO tb_nilai (`npm`, `nilai_smt1`, `nilai_smt2`, `nilai_smt3`, `nilai_smt4`, `nilai_smt5`) 
         VALUES ('$npm','$nama_nilai_smt1', '$nama_nilai_smt2','$nama_nilai_smt3', '$nama_nilai_smt4', '$nama_nilai_smt5')";

$result = mysqli_query($koneksi, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
          " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Tambah Data Berhasil.');window.location='data_nilai.php';</script>";
    }

  }
  ?>