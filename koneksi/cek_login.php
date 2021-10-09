<?php
session_start();

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

$login2 = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE username_mhs = '$username' AND password_mhs = '$password'");
$cek2 = mysqli_num_rows($login2);

if ($cek2 > 0) {
    $data2 = mysqli_fetch_assoc($login2);
        $_SESSION['username_mhs'] = $username;
        $_SESSION['password_mhs'] = $password;

        header("location:../mahasiswa/tb_pengajuan/index.php");
    } 
    
    elseif($cek > 0 ){
        $data = mysqli_fetch_assoc($login);

    if ($data['jabatan'] == 'Admin') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama_pegawai'] = $nama_pegawai;

        header("location:../admin/tb_pegawai/index.php");
    } 
    elseif ($data['jabatan'] == 'BAAK') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama_pegawai'] = $nama_pegawai;

        header("location:../baak/tb_pegawai/index.php");
    } elseif ($data['jabatan'] == 'Dosen Wali') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama_pegawai'] = $nama_pegawai;

        header("location:../doswal/tb_doswal/index.php");
    } elseif ($data['jabatan'] == 'Ketua Jurusan') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama_pegawai'] = $nama_pegawai;

        header("location:../kajur/tb_kajur/index.php");
    } else {
        header("location:../index.php?pesan=gagal");
    }
}
else {
    header("location:../index.php?pesan=gagal");
}