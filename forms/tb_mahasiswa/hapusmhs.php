<?php 

include '../../koneksi/config.php';

$npm = $_GET["npm"];

function hapus($npm){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM tb_mahasiswa WHERE npm=$npm");
    
    return mysqli_affected_rows($koneksi);
}


if (hapus($npm) > 0 ) {
    echo "
            <script>
                alert('Data Berhasil Dihapus!');
                document.location.href = 'data_mahasiswa.php';
            </script>
        ";
}
else {
    echo "
            <script>
                alert('Data Gagal Dihapus!');
                document.location.href = 'data_mahasiswa.php';
            </script>
        ";
}

?>
