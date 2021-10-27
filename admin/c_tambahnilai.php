<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "../koneksi/config.php";

if(isset($_POST['tambah'])){
  // membuat variabel untuk menampung data dari form
  	$npm = $_POST['npm'];

  //membuat variabel untuk menampung file pdf
  
    function upload_nilai_smt1()
    {
      $namaFile   = $_FILES['nilai_smt1']['name'];
      $ukuranFile = $_FILES['nilai_smt1']['size'];
      $error      = $_FILES['nilai_smt1']['error'];
      $tmpName    = $_FILES['nilai_smt1']['tmp_name'];

      // cek apakah tidak ada gambar yang di upload
      if($error === 4) {
        echo "<script> 
        alert ('Pilih File Terlebih Dahulu');
        </script>";
        return false;
      }

      //cek apa yang boleh di upload
      $ekstensiValid = ['pdf'];
      $ekstensi      = explode('.', $namaFile);
      $ekstensi      = strtolower(end($ekstensi));
      if(!in_array($ekstensi, $ekstensiValid)) {
        echo "<script> 
        alert ('Tolong upload file dengan format (pdf)');
        </script>";
        return false;
      }

      //cek ukuran file
      if($ukuranFile > 50000000) {
        echo "<script> 
        alert ('Ukuran File Terlalu Besar (Max 5 mb)');
        </script>";
        return false;
      }

      //berhasil dengan pemberian nama baru
      $nama = uniqid();
      $namaFileBaru = ("nilai_smt1_baru" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;

      move_uploaded_file($tmpName, 'img/smt1/' . $namaFileBaru);
      return $namaFileBaru;
    }

	function upload_nilai_smt2()
    {
      $namaFile   = $_FILES['nilai_smt2']['name'];
      $ukuranFile = $_FILES['nilai_smt2']['size'];
      $error      = $_FILES['nilai_smt2']['error'];
      $tmpName    = $_FILES['nilai_smt2']['tmp_name'];

      // cek apakah tidak ada gambar yang di upload
      if($error === 4) {
        echo "<script> 
        alert ('Pilih File Terlebih Dahulu');
        </script>";
        return false;
      }

      //cek apa yang boleh di upload
      $ekstensiValid = ['pdf'];
      $ekstensi      = explode('.', $namaFile);
      $ekstensi      = strtolower(end($ekstensi));
      if(!in_array($ekstensi, $ekstensiValid)) {
        echo "<script> 
        alert ('Tolong upload file dengan format (pdf)');
        </script>";
        return false;
      }

      //cek ukuran file
      if($ukuranFile > 50000000) {
        echo "<script> 
        alert ('Ukuran File Terlalu Besar (Max 5 mb)');
        </script>";
        return false;
      }

      //berhasil dengan pemberian nama baru
      $nama = uniqid();
      $namaFileBaru = ("nilai_smt2_baru" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;

      move_uploaded_file($tmpName, 'img/smt2/' . $namaFileBaru);
      return $namaFileBaru;
    }

	function upload_nilai_smt3()
    {
      $namaFile   = $_FILES['nilai_smt3']['name'];
      $ukuranFile = $_FILES['nilai_smt3']['size'];
      $error      = $_FILES['nilai_smt3']['error'];
      $tmpName    = $_FILES['nilai_smt3']['tmp_name'];

      // cek apakah tidak ada gambar yang di upload
      if($error === 4) {
        echo "<script> 
        alert ('Pilih File Terlebih Dahulu');
        </script>";
        return false;
      }

      //cek apa yang boleh di upload
      $ekstensiValid = ['pdf'];
      $ekstensi      = explode('.', $namaFile);
      $ekstensi      = strtolower(end($ekstensi));
      if(!in_array($ekstensi, $ekstensiValid)) {
        echo "<script> 
        alert ('Tolong upload file dengan format (pdf)');
        </script>";
        return false;
      }

      //cek ukuran file
      if($ukuranFile > 50000000) {
        echo "<script> 
        alert ('Ukuran File Terlalu Besar (Max 5 mb)');
        </script>";
        return false;
      }

      //berhasil dengan pemberian nama baru
      $nama = uniqid();
      $namaFileBaru = ("nilai_smt3_baru" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;

      move_uploaded_file($tmpName, 'img/smt3/' . $namaFileBaru);
      return $namaFileBaru;
    }

	function upload_nilai_smt4()
    {
      $namaFile   = $_FILES['nilai_smt4']['name'];
      $ukuranFile = $_FILES['nilai_smt4']['size'];
      $error      = $_FILES['nilai_smt4']['error'];
      $tmpName    = $_FILES['nilai_smt4']['tmp_name'];

      // cek apakah tidak ada gambar yang di upload
      if($error === 4) {
        echo "<script> 
        alert ('Pilih File Terlebih Dahulu');
        </script>";
        return false;
      }

      //cek apa yang boleh di upload
      $ekstensiValid = ['pdf'];
      $ekstensi      = explode('.', $namaFile);
      $ekstensi      = strtolower(end($ekstensi));
      if(!in_array($ekstensi, $ekstensiValid)) {
        echo "<script> 
        alert ('Tolong upload file dengan format (pdf)');
        </script>";
        return false;
      }

      //cek ukuran file
      if($ukuranFile > 50000000) {
        echo "<script> 
        alert ('Ukuran File Terlalu Besar (Max 5 mb)');
        </script>";
        return false;
      }

      //berhasil dengan pemberian nama baru
      $nama = uniqid();
      $namaFileBaru = ("nilai_smt4_baru" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;

      move_uploaded_file($tmpName, 'img/smt4/' . $namaFileBaru);
      return $namaFileBaru;
    }

	function upload_nilai_smt5()
    {
      $namaFile   = $_FILES['nilai_smt5']['name'];
      $ukuranFile = $_FILES['nilai_smt5']['size'];
      $error      = $_FILES['nilai_smt5']['error'];
      $tmpName    = $_FILES['nilai_smt5']['tmp_name'];

      // cek apakah tidak ada gambar yang di upload
      if($error === 4) {
        echo "<script> 
        alert ('Pilih File Terlebih Dahulu');
        </script>";
        return false;
      }

      //cek apa yang boleh di upload
      $ekstensiValid = ['pdf'];
      $ekstensi      = explode('.', $namaFile);
      $ekstensi      = strtolower(end($ekstensi));
      if(!in_array($ekstensi, $ekstensiValid)) {
        echo "<script> 
        alert ('Tolong upload file dengan format (pdf)');
        </script>";
        return false;
      }

      //cek ukuran file
      if($ukuranFile > 50000000) {
        echo "<script> 
        alert ('Ukuran File Terlalu Besar (Max 5 mb)');
        </script>";
        return false;
      }

      //berhasil dengan pemberian nama baru
      $nama = uniqid();
      $namaFileBaru = ("nilai_smt5_baru" . $nama);
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensi;

      move_uploaded_file($tmpName, 'img/smt5/' . $namaFileBaru);
      return $namaFileBaru;
    }
	

	$nilai_smt1 = upload_nilai_smt1();
    if (!$nilai_smt1) {
        return false;
    }

	$nilai_smt2 = upload_nilai_smt2();
    if (!$nilai_smt2) {
        return false;
    }

	$nilai_smt3 = upload_nilai_smt3();
    if (!$nilai_smt3) {
        return false;
    }

	$nilai_smt4 = upload_nilai_smt4();
    if (!$nilai_smt4) {
        return false;
    }

	$nilai_smt5 = upload_nilai_smt5();
    if (!$nilai_smt5) {
        return false;
    }
	// jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
		$query = "INSERT INTO tb_nilai (`npm`, `nilai_smt1`, `nilai_smt2`, `nilai_smt3`, `nilai_smt4`, `nilai_smt5`) 
				VALUES ('$npm','$nilai_smt1','$nilai_smt2','$nilai_smt3','$nilai_smt4','$nilai_smt5')";
		$result = mysqli_query($koneksi, $query);
			if(!$result){
				die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
				" - ".mysqli_error($koneksi));
			} else {
			//tampil alert dan akan redirect ke halaman data nilai.php

			echo "<script>alert('Tambah Data Berhasil.');window.location='data_nilai.php';</script>";
			}
  }
  ?>