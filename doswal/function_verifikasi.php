<?php 

include "../koneksi/config.php";

function acc_doswal($id_pengajuan) {
	global $koneksi;
	$tgl = date('Y-m-d');
	
	$query ="UPDATE tb_pengajuan SET status = 'Disetujui Dosen Wali', tgl_doswal= '$tgl' WHERE id_pengajuan = $id_pengajuan";

	mysqli_query($koneksi,$query);
	return mysqli_affected_rows($koneksi);	
}
function dec_doswal($id_pengajuan) {
	global $koneksi;
	

		//insert data
	$query ="UPDATE tb_pengajuan SET status = 'Ditolak' WHERE id_pengajuan = $id_pengajuan
	";

	mysqli_query($koneksi,$query);
	return mysqli_affected_rows($koneksi);	
}
?>