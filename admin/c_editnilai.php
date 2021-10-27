<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include "../koneksi/config.php";

  if(isset($_POST['edit_data'])){

    // membuat variabel untuk menampung data dari form
    $npm= $_POST['npm'];

    //semester 1
    $lokasi_nilai_smt1=$_FILES['nilai_smt1']['tmp_name'];
    $nama_nilai_smt1=$_FILES['nilai_smt1']['name'];
    $tipe_nilai_smt1=$_FILES['nilai_smt1']['type'];
    $error=$_FILES['nilai_smt1']['error'];
    $ukuranFile=$_FILES['nilai_smt1']['size'];
    $folder="img/smt1/";

    $ekstensiValid = ['pdf'];
    $ekstensi = explode('.',$nama_nilai_smt1);
    $ekatensi = strtolower(end($ekstensi));
    if (in_array($ekstensi, $ekstensiValid)){
        echo "<script> 
            alert('Input file proposal dalam bentuk PDF');
            </script>";
        return false;
    }

    if ($ukuranFile > 5000000){
        echo "<script> 
        alert('Ukuran file terlalu besar (Maksimal 5 Mb)');
        </script>";
        return false; 
    }
    if($nama_nilai_smt1 != ' '){
        move_uploaded_file($lokasi_nilai_smt1, $folder.$nama_nilai_smt1);
      }

    //semester 2
    $lokasi_nilai_smt2=$_FILES['nilai_smt2']['tmp_name'];
    $nama_nilai_smt2=$_FILES['nilai_smt2']['name'];
    $tipe_nilai_smt2=$_FILES['nilai_smt2']['type'];
    $error=$_FILES['nilai_smt2']['error'];
    $ukuranFile=$_FILES['nilai_smt2']['size'];
    $folder="img/smt2/";

    $ekstensiValid = ['pdf'];
    $ekstensi = explode('.',$nama_nilai_smt2);
    $ekatensi = strtolower(end($ekstensi));
    if (in_array($ekstensi, $ekstensiValid)){
        echo "<script> 
            alert('Input file proposal dalam bentuk PDF');
            </script>";
        return false;
    }

    if ($ukuranFile > 5000000){
        echo "<script> 
        alert('Ukuran file terlalu besar (Maksimal 5 Mb)');
        </script>";
        return false; 
    }
    if($nama_nilai_smt2 != ' '){
        move_uploaded_file($lokasi_nilai_smt2, $folder.$nama_nilai_smt2);
      }

    //semester 3
    $lokasi_nilai_smt3=$_FILES['nilai_smt3']['tmp_name'];
    $nama_nilai_smt3=$_FILES['nilai_smt3']['name'];
    $tipe_nilai_smt3=$_FILES['nilai_smt3']['type'];
    $error=$_FILES['nilai_smt3']['error'];
    $ukuranFile=$_FILES['nilai_smt3']['size'];
    $folder="img/smt3/";

    $ekstensiValid = ['pdf'];
    $ekstensi = explode('.',$nama_nilai_smt3);
    $ekatensi = strtolower(end($ekstensi));
    if (in_array($ekstensi, $ekstensiValid)){
        echo "<script> 
            alert('Input file proposal dalam bentuk PDF');
            </script>";
        return false;
    }

    if ($ukuranFile > 5000000){
        echo "<script> 
        alert('Ukuran file terlalu besar (Maksimal 5 Mb)');
        </script>";
        return false; 
    }
    if($nama_nilai_smt3 != ' '){
        move_uploaded_file($lokasi_nilai_smt3, $folder.$nama_nilai_smt3);
      }

    //semester 4
    $lokasi_nilai_smt4=$_FILES['nilai_smt4']['tmp_name'];
    $nama_nilai_smt4=$_FILES['nilai_smt4']['name'];
    $tipe_nilai_smt4=$_FILES['nilai_smt4']['type'];
    $error=$_FILES['nilai_smt4']['error'];
    $ukuranFile=$_FILES['nilai_smt4']['size'];
    $folder="img/smt4/";

    $ekstensiValid = ['pdf'];
    $ekstensi = explode('.',$nama_nilai_smt4);
    $ekatensi = strtolower(end($ekstensi));
    if (in_array($ekstensi, $ekstensiValid)){
        echo "<script> 
            alert('Input file proposal dalam bentuk PDF');
            </script>";
        return false;
    }

    if ($ukuranFile > 5000000){
        echo "<script> 
        alert('Ukuran file terlalu besar (Maksimal 5 Mb)');
        </script>";
        return false; 
    }
    if($nama_nilai_smt4 != ' '){
        move_uploaded_file($lokasi_nilai_smt4, $folder.$nama_nilai_smt4);
      }

    //semester 5
    $lokasi_nilai_smt5=$_FILES['nilai_smt5']['tmp_name'];
    $nama_nilai_smt5=$_FILES['nilai_smt5']['name'];
    $tipe_nilai_smt5=$_FILES['nilai_smt5']['type'];
    $error=$_FILES['nilai_smt5']['error'];
    $ukuranFile=$_FILES['nilai_smt5']['size'];
    $folder="img/smt5/";

    $ekstensiValid = ['pdf'];
    $ekstensi = explode('.',$nama_nilai_smt5);
    $ekatensi = strtolower(end($ekstensi));
    if (in_array($ekstensi, $ekstensiValid)){
        echo "<script> 
            alert('Input file proposal dalam bentuk PDF');
            </script>";
        return false;
    }

    if ($ukuranFile > 5000000){
        echo "<script> 
        alert('Ukuran file terlalu besar (Maksimal 5 Mb)');
        </script>";
        return false; 
    }
    if($nama_nilai_smt5 != ' '){
        move_uploaded_file($lokasi_nilai_smt5, $folder.$nama_nilai_smt5);
      }


    //mengecek apakah mengupdate file atau tidak 

    if($nama_nilai_smt1 AND $nama_nilai_smt2 AND $nama_nilai_smt3 AND $nama_nilai_smt4 AND $nama_nilai_smt5 != '')
{
	$update = mysqli_query($koneksi, "UPDATE tb_nilai SET npm='$npm', nilai_smt1='$nama_nilai_smt1', nilai_smt2='$nama_nilai_smt2', nilai_smt3='$nama_nilai_smt3', nilai_smt4 ='$nama_nilai_smt4', nilai_smt5='$nama_nilai_smt5'
		WHERE id_nilai='$id_nilai'");
	if($update){
		echo "<script>alert('Data Berhasil di Ubah'); window.location = 'data_nilai.php'</script>";
	}else {
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_nilai.php'</script>";
	}
}
else
{
		echo "<script>alert('Data Gagal di Ubah'); window.location = 'data_nilai.php'</script>";
}

  }
?>