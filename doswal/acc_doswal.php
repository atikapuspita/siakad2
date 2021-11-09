<?php
require 'function_verifikasi.php';

$id_pengajuan =$_GET["id_pengajuan"];
if (acc_doswal($id_pengajuan)>0){
		echo "
			<script>
			alert('Data Berhasil di Verifikasi');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}else {
		echo "
			<script>
			alert('Data Gagal di Verifikasi');
			document.location.href='tb_verifikasi.php';
			</script>
			";
		}
?>