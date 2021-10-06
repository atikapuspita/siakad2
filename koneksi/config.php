<?php 
//koneksi ke database
$koneksi = mysqli_connect("localhost","root","","siakad");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>