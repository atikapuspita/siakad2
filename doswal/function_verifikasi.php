<?php 

	include "../koneksi/config.php";

	$id = $row["id_pengajuan"];

	function acc_doswal(){
		global $koneksi;

		$query = mysqli_query($koneksi, "INSERT INTO tb_verifikasi (`id_pengajuan`, `tgl_verifikasi`, `nip_npak`,`status_verifikasi`)
		VALUES ($id, NOW(), '$nip_npak','Disetujui')");
	}

	function tolak_doswal(){
		global $koneksi;

		$query = mysqli_query($koneksi, "INSERT INTO tb_verifikasi (`id_pengajuan`, `tgl_verifikasi`, `nip_npak`,`status_verifikasi`)
		VALUES ('$id_pengajuan', NOW(), '$nip_npak','Ditolak')");
	}
?>