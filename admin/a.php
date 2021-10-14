<?php
    include "../koneksi/config.php";
    $username = "admin";
    $password = "admin";
$login = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE username = '$username' AND password = '$password'");
$cek = mysqli_fetch_array($login);
   $nip_npak = $cek['nip_npak']; 
echo   $nip_npak;

?>