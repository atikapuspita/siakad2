<?php
session_start();

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi, "SELECT * FROM tb_pegawai WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

$data = mysqli_fetch_assoc($login);
$nip_npak = $data['nip_npak'];

$login2 = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa WHERE username_mhs = '$username' AND password_mhs = '$password'");
$cek2 = mysqli_num_rows($login2);

if ($cek2 > 0) {
    $data2 = mysqli_fetch_assoc($login2);
        $_SESSION['username_mhs'] = $username;
        $_SESSION['password_mhs'] = $password;

        header("location:../mahasiswa/index.php");
    } 
    
    elseif($cek > 0 ){

    if ($data['jabatan'] == 'Admin') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nip_npak'] = $nip_npak;

        header("location:../admin/index.php");
    } elseif ($data['jabatan'] == 'Dosen Wali') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nip_npak'] = $nip_npak;
        
        header("location:../doswal/index.php");
    } elseif ($data['jabatan'] == 'Ketua Jurusan') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nip_npak'] = $nip_npak;
        
        header("location:../kajur/index.php");
    } elseif ($data['jabatan'] == 'Ketua Jurusan dan Dosen Wali') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nip_npak'] = $nip_npak;
        
        header("location:../kajur dan doswal/index.php");
    }elseif ($data['jabatan'] == 'Wakil DIrektur I') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nip_npak'] = $nip_npak;
        
        header("location:../wadir/index.php");
    } else {
        header("location:login.php?pesan=gagal");
    }
}
else {
    header("location:login.php?pesan=gagal");
}