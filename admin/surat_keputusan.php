<?php 

    include "../koneksi/config.php";

    $id_pengajuan = $_GET['id_pengajuan'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengajuan INNER JOIN tb_mahasiswa ON tb_pengajuan.npm = tb_mahasiswa.npm WHERE id_pengajuan = '$id_pengajuan';");
    $data  = mysqli_fetch_array($query);

    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_mahasiswa INNER JOIN tb_prodi ON tb_mahasiswa.id_prodi = tb_prodi.id_prodi");
    $mhs  = mysqli_fetch_array($mahasiswa);

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
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:.19pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;"><b>KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:115.67pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;">POLITEKNIK NEGERI CILACAP</b></span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:55.02pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Jalan: Dr. Soetomo No.1 Sidakaya, Cilacap 53212 Cilacap Tengah</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:90.1pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Telepon: (0282) 533329, Fax: (0282) 537992</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><a href="http://www.pnc.ac.id" style="text-decoration:none;"><span style="width:90.86pt; display:inline-block;">&nbsp;</span><u><span style="font-family:'Times New Roman'; color:#0563c1;">www.pnc.ac.id</span></u></a><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Email:&nbsp;</span><a href="mailto:sekretariat@pnc.ac.id" style="text-decoration:none;"><u><span style="font-family:'Times New Roman'; color:#0563c1;">sekretariat@pnc.ac.id</span></u></a></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="height:0pt; display:block; position:absolute; z-index:-65536;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-3.png" width="719" height="1" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span><span style="height:0pt; display:block; position:absolute; z-index:-65535;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-2.png" width="720" height="2" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span>&nbsp;</p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">&nbsp;</p>
                    </div>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Keputusan Direktur Politeknik Negeri Cilacap</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Nomor : &hellip;&hellip;&hellip;&hellip;&hellip;..</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Tentang</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Pengunduran Diri Mahasiswa a.n <?php echo $mhs['nama_mhs']; ?> </span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Program Studi <?php echo $mhs['nama_prodi']; ?> </span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Tahun Akademik <?php echo $mhs['thn_angkatan']; ?></span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Direktur &hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Menimbang :&nbsp;</span></p>
    <ol style="margin:0pt; padding-left:0pt;" type="a">
        <li style="margin-left:31.33pt; line-height:150%; padding-left:4.67pt; font-family:'Times New Roman'; font-size:12pt;">Bahwa surat permohonan pengunduran diri &hellip;&hellip;&hellip; NPM &hellip;&hellip;&hellip;&hellip;. mahasiswa Program Studi &hellip;&hellip;&hellip;&hellip;&hellip;..&nbsp; ;</li>
        <li style="margin-left:32pt; margin-bottom:8pt; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Bahwa sehubung dengan butir a di atas, maka perlu diterbitkan Keputusan &hellip;&hellip;&hellip;.</li>
    </ol>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Mengingat :</span></p>
    <ol style="margin:0pt; padding-left:0pt;" type="1">
        <li style="margin-left:32pt; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Undang &ndash; Undang Republik Indonesia Nomor &hellip;&hellip;&hellip;.. tentang &hellip;&hellip;&hellip;&hellip; ;</li>
        <li style="margin-left:32pt; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Peraturan Pemerintah Nomor &hellip;&hellip;&hellip;&hellip;.. tentang &hellip;&hellip;&hellip;.. ;</li>
        <li style="margin-left:32pt; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Peraturan Menteri Pendidikan dan Kebudayaan Nomor &hellip;&hellip;&hellip;.. tahun &hellip;. Tentang &hellip;&hellip;;</li>
        <li style="margin-left:32pt; margin-bottom:8pt; line-height:150%; padding-left:4pt; font-family:'Times New Roman'; font-size:12pt;">Peraturan Menteri Riset, Teknologi dan Pendidikan Tinggi Nomor &hellip;&hellip;. Tahun .. tentang &hellip;&hellip;&hellip;&hellip;.</li>
    </ol>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Memutuskan :</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Menetapkan : Keputusan Direktur Politeknik Negeri Cilacap Tentang Pengunduran Diri Mahasiswa a.n &hellip;&hellip;&hellip;&hellip;&hellip; Program Studi &hellip;&hellip;.. Tahun Akademik &hellip;&hellip;&hellip;.</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kesatu : Kepada mahasiswa di bawah ini:</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Nama</span><span style="width:7.35pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $mhs['nama_mhs']; ?>&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">NPM</span><span style="width:9.99pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $mhs['npm']; ?></span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Program Studi&nbsp;</span><span style="width:35.33pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $mhs['nama_prodi']; ?></span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Tingkat/Semester</span><span style="width:23.36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $data['semester']; ?></span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="width:36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Tahun Akademik</span><span style="width:24.36pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">: <?php echo $mhs['thn_angkatan']; ?></span></p>
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Diperkenankan mengundurkan diri sebagai mahasiswa Politeknik Negeri Cilacap.</span></p>
    
            </div>
        </div>
    </div>

    <!-- Halaman Pertama -->
<div class="book">
        <div class="page">
            <div class="subpage">


                <!-- HASIL KONVERT PASTE DI SINI !! -->
                <div style="clear:both;">
    <p style="margin-top:0pt; margin-left:36pt; margin-bottom:0pt; text-indent:36pt; line-height:normal; font-size:14pt;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-1.png" width="95" height="95" alt="logo-150x150" style="float: left; display: inline-block; text-align:left;"></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:.19pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;"><b>KEMENTRIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal; font-size:14pt;"><span style="width:115.67pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman'; font-size:12pt;">POLITEKNIK NEGERI CILACAP</b></span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:55.02pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Jalan: Dr. Soetomo No.1 Sidakaya, Cilacap 53212 Cilacap Tengah</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="width:90.1pt; display:inline-block;">&nbsp;</span><span style="font-family:'Times New Roman';">Telepon: (0282) 533329, Fax: (0282) 537992</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><a href="http://www.pnc.ac.id" style="text-decoration:none;"><span style="width:90.86pt; display:inline-block;">&nbsp;</span><u><span style="font-family:'Times New Roman'; color:#0563c1;">www.pnc.ac.id</span></u></a><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Email:&nbsp;</span><a href="mailto:sekretariat@pnc.ac.id" style="text-decoration:none;"><u><span style="font-family:'Times New Roman'; color:#0563c1;">sekretariat@pnc.ac.id</span></u></a></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;"><span style="height:0pt; display:block; position:absolute; z-index:-65536;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-3.png" width="719" height="1" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span><span style="height:0pt; display:block; position:absolute; z-index:-65535;"><img src="https://myfiles.space/user_files/101828_3d498f4d43cab83c/1634544123_formulir-permohonan-pengunduran-diri/1634544123_formulir-permohonan-pengunduran-diri-2.png" width="720" height="2" alt="" style="margin: 0 auto 0 0; display: block; text-align:left;"></span>&nbsp;</p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">&nbsp;</p>
                    </div>
                <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Kedua : Mahasiswa yang dimaksud pada diktum kesatu &hellip;&hellip;&hellip;.</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Ketiga : Keputusan Direktur ini mulai &hellip;&hellip;&hellip;</span></p>
    <table cellpadding="0" cellspacing="0" style="width: 36%; margin-right: 9pt; margin-left: calc(62%); border-collapse: collapse; float: left;">
        <tbody>
            <tr style="height:144.6pt;">
                <td style="width: 9.746%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width: 89.9365%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Ditetapkan &hellip;&hellip;&hellip;..</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Pada Tanggal &hellip;&hellip;&hellip;..</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">Direktur &hellip;.</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;..</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; line-height:150%; font-size:12pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
</div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>