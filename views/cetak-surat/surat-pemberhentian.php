<?php
// error_reporting(0);
    ob_start(); 
    include ("../../assets/conn/koneksi.php");
    $id = $_GET['id_surat_pemberhentian'];
    $queryy = mysql_query("SELECT * FROM tbl_surat_rekomendasi_pemberhentian join tbl_user using (id_user) WHERE id_surat_pemberhentian = '$id'"); //get the data that will be updated
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
<table style=" width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
    <tr>
        <td style="" colspan="4">&nbsp;</td>
        <td  style="">Beringin, <?= tanggal_indo($tgl_surat_terbit);?></td>
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
        <td style="">Penting</td>
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
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Peraturan Daerah Kabupaten Bengkalis Nomor 10 Tahun 2016 tentang Pengangkatan dan Pemberhentian Perangkat Desa Pasal 18 ayat (4) dan ayat (5) yang dinyatakan bahwa :
            
        </td>
    </tr>
    
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="4" style="text-align: justify;  ">
        
            (4) Pemberhentian Perangkat Desa sebagaimana dimaksud pada ayat (1) huruf c wajib dikonsultasikan terlebih dahulu kepada Camat dan Camat menerbitkan rekomendasi tertulis menerima atau menolak usulan pemberhentian dimaksud.
            
        </td>
    </tr>
    
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="4" style="text-align: justify;  ">
        
            (5) Rekomendasi tertulis Camat sebagaimana dimaksud pada ayat (4) Didasarkan pada persyaratan pemberhentian perangkat Desa.
            
        </td>
    </tr>
    
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="4" style="text-align: justify;  ">
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berkenaan hal tersebut di atas setelah dilakukan penelitian terhadap berkas dan alasan yang disampaikan bahwa pengajuan pemberhentian Perangkat Desa dimaksud telah memenuhi syarat sesuai dengan aturan yang berlaku dan memberikan rekomendasi kepada :
            
        </td>
    </tr>

    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="4" style="text-align: justify;  ">
            <table width="100%">
                <?php
                    $no = 1;
                    $datanya = json_decode($dt['detail_surat'], true);
                    foreach($datanya as $values)
                    {
                ?>
                <tr>
                    <td>-</td>
                    <td>Nama</td>
                    <td>:</td>
                    <td style="text-transform: uppercase;"><?= $values['nama'];?></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Tempat/Tanggal Lahir</td>
                    <td>:</td>
                    <td style="text-transform: capitalize;"><?= $values['tempat_lahir'];?>, <?= tanggal_indo($values['tgl_lahir']);?></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td style="text-transform: capitalize;"><?= $values['jabatan'];?></td>
                </tr>
                <tr>
                    <td>-</td>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td style="text-transform: capitalize;"><?= $values['keterangan'];?></td>
                </tr>
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="4">Untuk Diberhentikan</td>
                </tr>
            </table>
        </td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td colspan="4" style="text-align: justify;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sehubungan hal tersebut di atas disampaikan kepada Saudara untuk segera menerbitkan Surat Keputusan Pemberhentian Perangkat Desa dimaksud sesuai dengan ketentuan yang berlaku dan untuk mengisi kekosongan agar menunjuk pelaksana tugas sementara dari Perangkat Desa sebelum melakukan penjaringan dan penyaringan.
        </td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td colspan="4" style="text-align: justify;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian disampaikan untuk dapat ditindaklanjuti.
        </td>
    </tr>

    <tr>
        <td style="  " colspan="4" >&nbsp;</td>
        <td style="  text-transform: uppercase; text-align: left; " rowspan="3">
                CAMAT TALANG MUANDAU
        </td>
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
        <td colspan="5">1.  Dinas Pemberdayaan Masyarakat Desa Kabupaten Bengkalis</td>
    </tr>
    <tr>
        <td colspan="5">2.	Inspektorat Kabupaten Bengkalis</td>
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
    $mpdf->Output("Surat Pengangkatan No. $no_surat Tanggal $tgl_surat.pdf", 'I');

?>