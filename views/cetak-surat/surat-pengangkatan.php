<?php
    ob_start(); 
    include ("../../assets/conn/koneksi.php");
    $id = $_GET['id_surat_pengangkatan'];
    $queryy = mysql_query("SELECT * FROM tbl_surat_rekomendasi_pengangkatan join tbl_user using (id_user) WHERE id_surat_pengangkatan = '$id'"); //get the data that will be updated
    $dt=mysql_fetch_array($queryy);

    $no_surat = $dt['no_surat'];
    $tgl_surat = $dt['tgl_surat'];

    function tanggal_indo($tanggal)
    {
        //y-m-d
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0];
    }

    
    function get_string_between($string, $start, $end)
    {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

?>

<table width="100%" border="0">
    <tbody>
        <tr>
        <td width="100" align="center"><img src="../../assets/acc/gambar/bengkalis.png" width="80px"></td>
            <td align="center">
                    <span style="font-weight: bold;font-size: 20px; text-transform: uppercase;font-family:times new roman">
                    pemerintah kabupaten bengkalis
                    </span><br><br>
                    <span style="font-weight: bold;font-size: 28px; text-transform: uppercase; font-family:times new roman">
                    kecamatan talang muandau
                    </span><br><br>
                    <span style="font-size: 14px; font-family:times new roman">
                    Jalan Jend. Sudirman RT.02 RW.01 Desa Beringin
                    </span><br>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<hr style="height: 3px; solid black; color:black">

<?php
    $tgl_surat_terbit = date("Y-m-d", strtotime($dt['created_at']));
?>
<table style=" width:100%; break-after: auto; font-family:times new roman">
    <tr>
        <td style="" colspan="4">&nbsp;</td>
        <td  style="">Beringin, <?= tanggal_indo($tgl_surat_terbit);?></td>
    </tr>
    <tr>
        <td colspan="5" style=" ">&nbsp;</td>
    </tr>
    <tr>
        <td style="" colspan="4">&nbsp;</td>
        <td  style="">Kepada</td>
    </tr>
    <tr>
        <td style="width: 15%; ">Nomor</td>
        <td style="width:3%;">: </td>
        <td style=" " ><?= $dt['no_surat'];?></td>
        <td style="width:8%;" rowspan="3">Yth. <br/><br/> &nbsp;&nbsp;&nbsp;&nbsp;Di-</td>
        <td style="text-align:left ;" rowspan="3">
            <!-- Kepala Desa  -->
            <font style="text-transform: capitalize;"><?= $dt['tujuan_surat'];?> </font><br/> 
            Kecamatan Talang Muandau <br/>
            <br/><br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat
        </td>
    </tr>
    <tr>
        <td style="width: 15%; ">Sifat</td>
        <td style="width:3%; ">:</td>
        <td style="text-transform: capitalize;"><?= $dt['sifat'];?></td>
    </tr>
    <tr>
        <td style="width: 15%; ">Lampiran</td>
        <td style="width:3%; ">: 
        <td style="  " colspan="2">
            -
        </td>
    </tr>
    <tr>
        <td style="width: 15%; ">Hal</td>
        <td style="width:3%;">: </td>
        <td style=" " ><font style="text-transform: capitalize;"><?= $dt['perihal'];?></font></td>
    </tr>
    
    <tr>
        <td colspan="5" style=" ">&nbsp;</td>
    </tr>
    
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="4" style="text-align: justify;  ">
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Pasal 16 Peraturan Daerah Kabupaten Bengkalis Nomor 10 Tahun 2016 tentang Pengangkatan dan Pemberhentian Perangkat Desa serta setelah mencermati dan meneliti berkas yang disampaikan berdasarkan surat Saudara Nomor : <?= $dt['no_surat_lampiran'];?> tanggal <?= tanggal_indo($dt['tgl_surat_lampiran']);?> hal <?= $dt['perihal_surat_lampiran'];?>, Desa <?= $dt['tujuan_surat'];?>.  Bersama ini disampaikan nama-nama yang direkomendasikan untuk diangkat sebagai Perangkat Desa sebagai Berikut :
            
        </td>
    </tr>
    
    <?php
        $no = 1;
        $datanya = json_decode($dt['detail_surat'], true);
        foreach($datanya as $values)
        {
    ?>
        <tr>
            <td style=" ">&nbsp;</td>
            <td colspan="4" style="text-align: justify;  ">
                <?= $no++;?>. Formasi <?= $values['jabatan'];?> adalah Saudara <font style="text-transform: uppercase;"><?= $values['nama'];?></font>
            </td>
        </tr>
        <!-- <tr>
            <td>{{$no++}}.</td>
            <td>{{substr($ex_acara[$i], 9, -2)}}</td>
        </tr> -->
    <?php } ?>
    
    <tr>
        <td colspan="5" style=" ">&nbsp;</td>
    </tr>

</table>
<table style=" width:100%; font-family:times new roman; page-break-inside: avoid">
    <tr style="">
        <td style="width: 15%; ">&nbsp;</td>
        <td colspan="4" style="text-align: justify;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan hal tersebut di atas disampaikan kepada Saudara untuk segera menerbitkan Surat Keputusan Pengangkatan Perangkat Desa dimaksud sesuai dengan ketentuan yang berlaku.
        </td>
    </tr>
    
    <tr>
        <td colspan="5" style=" ">&nbsp;</td>
    </tr>

    <tr style="break-inside: avoid; break-after: auto;">
        <td>&nbsp;</td>
        <td colspan="4" style="text-align: justify;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan untuk dapat ditindaklanjuti dan menjadi perhatiannya.</p>
        </td>
    </tr>


    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>

    <tr>
        <td style="  " colspan="4" >&nbsp;</td>
        <td style="  text-transform: uppercase; text-align: left; " rowspan="3">
                CAMAT TALANG MUANDAU
        </td>
    </tr>

    <tr>
        <td colspan="5"><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td colspan="5"><br/><br/><br/></td>
    </tr>
    <tr>
        <td colspan="5"><br/><br/><br/></td>
    </tr>

    <tr>
        <td style="  " colspan="4">&nbsp;</td>
        <td style="  text-align: left; font-weight: bold;" >
            Drs. NASRIZAL
        </td>
    </tr>
    <tr>
        <td style="  " colspan="4">&nbsp;</td>
        <td style="  text-align: left; ">
        Pembina
        </td>
    </tr>
    <tr>
        <td style="  " colspan="4">&nbsp;</td>
        <td style="  text-align: left; ">
        NIP. 19640824 199512 1 001
        </td>
    </tr>
    <tr>
        <td colspan="5">Tembusan:</td>
    </tr>
    <tr>
        <td colspan="5">1.	Yth. Kepala Dinas PMD Kabupaten Bengkalis</td>
    </tr>
    <tr>
        <td colspan="5">2.	Yth. Ketua BPD Desa Tasik Serai</td>
    </tr>

</table>


<?php
    $out = ob_get_contents();
    ob_end_clean();
	require_once "../../assets/acc/mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
    $mpdf->SetTitle("Surat Rekomendasi Pengangkatan");
    $mpdf->SetDisplayMode('fullpage');
	$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
	// $mpdf->WriteHTML($content);
    $mpdf->WriteHTML($out);
    $mpdf->Output("Surat Pengangkatan No. $no_surat Tanggal $tgl_surat.pdf", 'D');

?>