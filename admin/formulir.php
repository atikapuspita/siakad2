<?php 

    include "../koneksi/config.php";

    $id_pengajuan = $_GET['id_pengajuan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan INNER JOIN tb_mahasiswa ON tb_pengajuan.npm = tb_mahasiswa.npm WHERE id_pengajuan = '$id_pengajuan'");
    $data  = mysqli_fetch_array($query);

    $t = substr($data['tgl_pengajuan'],0,4);
    $b = substr($data['tgl_pengajuan'],5,2);
    $h = substr($data['tgl_pengajuan'],8,2);

        if($b == "01"){
            $nm = "Januari";
        } elseif($b == "02"){
            $nm = "Februari";
        } elseif($b == "03"){
            $nm = "Maret";
        } elseif($b == "04"){
            $nm = "April";
        } elseif($b == "05"){
            $nm = "Mei";
        } elseif($b == "06"){
            $nm = "Juni";
        } elseif($b == "07"){
            $nm = "Juli";
        } elseif($b == "08"){
            $nm = "Agustus";
        } elseif($b == "09"){
            $nm = "September";
        } elseif($b == "10"){
            $nm = "Oktober";
        } elseif($b == "11"){
            $nm = "November";
        } elseif($b == "12"){
            $nm = "Desember";
        }

    $jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan INNER JOIN tb_mahasiswa ON tb_jurusan.id_jurusan = tb_mahasiswa.id_jurusan");
    $j = mysqli_fetch_array($jurusan);

    $doswal = mysqli_query($koneksi, "SELECT * FROM tb_doswal INNER JOIN tb_mahasiswa ON tb_doswal.id_doswal = tb_mahasiswa.id_doswal");
    $d = mysqli_fetch_array($doswal);

    $pegawai = mysqli_query($koneksi, "SELECT * FROM tb_jurusan INNER JOIN tb_pegawai ON tb_jurusan.nip_npak = tb_pegawai.nip_npak");
    $p = mysqli_fetch_array($pegawai);

    $dosen = mysqli_query($koneksi, "SELECT * FROM tb_doswal INNER JOIN tb_pegawai ON tb_doswal.nip_npak = tb_pegawai.nip_npak");
    $s = mysqli_fetch_array($dosen);


?>

<!DOCTYPE html>
<html>

<head>
    <script src="https://kit.fontawesome.com/bd293d113e.js" crossorigin="anonymous"></script>
    <title></title>
    <style type="text/css">
        /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;

            font: 12pt "Tahoma";
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 210mm;
            min-height: 297mm;

            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;

            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .subpage {
            padding: 1cm;

            height: 297mm;
            outline: 2cm white;
        }

        @page {
            size: A4;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

<!-- Halaman Pertama -->
    <div class="book">
        <div class="page">
            <div class="subpage">

                <!-- HASIL KONVERT PASTE DI SINI !! -->
                <div>
                <div style="clear:both;">
                    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:36pt; line-height:normal; font-size:14pt;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-1.png" width="95" height="95" alt="logo-150x150" style="float: left; display: inline-block; text-align:left;"></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:.19pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:115.67pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;">POLITEKNIK NEGERI CILACAP</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:55.02pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Jalan: Dr. Soetomo No.1 Sidakaya, Cilacap 53212 Cilacap Tengah</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:90.1pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Telepon: (0282) 533329, Fax: (0282) 537992</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><a href="http://www.pnc.ac.id" style="text-decoration:none;"><span style="width:90.86pt; display:inline-block;">&nbsp;</span><u><span style="font-family:'Times New Roman'; color:#0563c1;">www.pnc.ac.id</span></u></a><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Email:&nbsp;</span><a href="mailto:sekretariat@pnc.ac.id" style="text-decoration:none;"><u><span style="font-family:'Times New Roman'; color:#0563c1;">sekretariat@pnc.ac.id</span></u></a></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="height:0pt; display:block; position:absolute; z-index:-65536;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-3.png" width="719" height="1" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span><span style="height:0pt; display:block; position:absolute; z-index:-65535;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-2.png" width="720" height="2" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span>&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">&nbsp;</p>
                </div>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">PERMOHONAN PENGUNDURAN DIRI</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kepada Yth.&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Direktur Politeknik Negeri Cilacap</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Yang bertanda tangan di bawah ini:</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Nama</span><span style="width:7.35pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $data['nama_mhs']; ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">NPM</span><span style="width:9.99pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $data['npm']; ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kelas / Semester</span><span style="width:27.36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $d['nama_kelas']; ?></span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">/ 5</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Jurusan</span><span style="width:35.34pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: Teknik Informatika</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">No.Telp /HP</span><span style="width:10.67pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $data['no_telp_mhs']; ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Alamat Lengkap</span><span style="width:27.7pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $data['alamat']; ?>&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Dengan ini mengajuakan permohonan pengunduran diri sebagai mahasiswa Politeknik Negeri Cilacap karena <?php echo $data['alasan']; ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Demikian permohonan kami, atas perhatian dan kebijaksanaannya kami ucapkan terima kasih.</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-left:288pt; margin-bottom:8pt; text-indent:36pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Cilacap, <?php echo  "<a>". $h." ". $nm. " ". $t. "</a>" ?></span></p>
                    <table cellpadding="0" cellspacing="0" style="width:469pt; border-collapse:collapse;">
                        <tbody>
                            <tr style="height:155.6pt;">
                                <td style="width:223.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Mengetahui</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">OrangTua/Wali</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><img src="img/ttd_orangtua/<?php echo $data['ttd_ortu'];?>"width="100px" height="100px"></span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><?php echo $data['nama_ortu']; ?></span></p>
                                </td>
                                <td style="width:223.7pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Pemohon</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><img src="img/ttd_mahasiswa/<?php echo $data['ttd_mhs'];?>"width="100px" height="100px"></span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><?php echo $data['nama_mhs']; ?></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
            
            </div>
        </div>
    </div>

    <!-- Halaman Kedua -->
    <div class="book">
        <div class="page">
            <div class="subpage">


                <!-- HASIL KONVERT PASTE DI SINI !! -->
                <div style="clear:both;">
                    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:36pt; line-height:normal; font-size:14pt;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-1.png" width="95" height="95" alt="logo-150x150" style="float: left; display: inline-block; text-align:left;"></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:.19pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:115.67pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;">POLITEKNIK NEGERI CILACAP</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:55.02pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Jalan: Dr. Soetomo No.1 Sidakaya, Cilacap 53212 Cilacap Tengah</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:90.1pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Telepon: (0282) 533329, Fax: (0282) 537992</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><a href="http://www.pnc.ac.id" style="text-decoration:none;"><span style="width:90.86pt; display:inline-block;">&nbsp;</span><u><span style="font-family:'Times New Roman'; color:#0563c1;">www.pnc.ac.id</span></u></a><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Email:&nbsp;</span><a href="mailto:sekretariat@pnc.ac.id" style="text-decoration:none;"><u><span style="font-family:'Times New Roman'; color:#0563c1;">sekretariat@pnc.ac.id</span></u></a></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="height:0pt; display:block; position:absolute; z-index:-65536;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-3.png" width="719" height="1" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span><span style="height:0pt; display:block; position:absolute; z-index:-65535;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-2.png" width="720" height="2" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span>&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">&nbsp;</p>
                </div>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Menyetujui</span></p>
                    <table cellpadding="0" cellspacing="0" style="width:469.8pt; border-collapse:collapse;">
                        <tbody>
                            <tr style="height:19.9pt;">
                                <td style="width:224.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Ketua Jurusan</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><?php echo $j['nama_jurusan']; ?></span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><?php echo $p['nama_pegawai']; ?></span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">NPAK.<?php echo $j['nip_npak']; ?></span></p>
                                </td>
                                <td style="width:224.1pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Wali Kelas</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';"><?php echo $d['nama_pegawai']; ?>&nbsp;</span></p>
                                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">NPAK.<?php echo $d['nip_npak']; ?></span></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Tembusan Yth.</span></p>
                    <ol style="margin:0pt; padding-left:0pt;" type="1">
                        <li style="margin-left:32pt; text-align:justify; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Wakil Direktur I</li>
                        <li style="margin-left:32pt; text-align:justify; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Ketua Jurusan</li>
                        <li style="margin-left:32pt; text-align:justify; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Bagian Keuangan</li>
                        <li style="margin-left:32pt; text-align:justify; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Yang Bersangkutan</li>
                        <li style="margin-left:32pt; margin-bottom:8pt; text-align:justify; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Arsip</li>
                    </ol>
                </div>

            </div>

        </div>



    </div>
    <script>
        window.print();
    </script>
</body>

</html>