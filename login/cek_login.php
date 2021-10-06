<?php
session_start();


include "../koneksi/config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$login = mysqli_query($koneksi, "select * from tb_pegawai  where username = '$username' and password = '$password'");

$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

        header("location:../forms/?tb_pegawai=index");
} else {
    header("location:../forms/tb_pegawai/index.php?pesan=gagal");
}
