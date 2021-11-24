<?php 
 
 include "../koneksi/config.php";

function verifikasi($data){
    global $koneksi;
    
    $id_pengajuan = htmlspecialchars($data["id_pengajuan"]);
    $nip_npak = htmlspecialchars($data["nip_npak"]);
    $status_verifikasi = htmlspecialchars($data["status_verifikasi"]);
    $status_pengajuan = htmlspecialchars($data["status_pengajuan"]);
    
    $query = "INSERT INTO 
    `tb_verifikasi`
    ( `id_pengajuan`, `tgl_verifikasi`, `nip_npak`, `status_verifikasi`, `status_pengajuan`) 
    VALUES ('$id_pengajuan',NOW(),'$nip_npak','$status_verifikasi','$status_pengajuan')";

$result = mysqli_query($koneksi,$query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
    } else {
      //tampil alert dan akan redirect ke halaman index.php
      //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Verifikasi Berhasil.');window.location='data_pengajuan.php';</script>";
    }
};