
<?php
    include "../koneksi/config.php";
    include "c_editprofile_doswal.php";

session_start();

 $username = $_SESSION["nip_npak"];
 $user = mysqli_query($koneksi, "SELECT * FROM tb_doswal WHERE nip_npak = '$username'");
 $tik = mysqli_fetch_array($user);
 echo $nama = $tik['nama_pegawai'];
                foreach ($user as $row) :
                echo $row['nama_pegawai'];
                echo $row['id_doswal'];
                echo $row['username_doswal'];
                endforeach; ?>