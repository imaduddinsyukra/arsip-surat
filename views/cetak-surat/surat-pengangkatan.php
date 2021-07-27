<?php
    ob_start(); 
    include ("../../assets/conn/koneksi.php");
    $id = $_GET['id_surat_rekomendasi'];
    $queryy = mysql_query("SELECT * FROM tbl_surat_rekomendasi join tbl_user using (id_user) WHERE id_surat_rekomendasi = '$id'"); //get the data that will be updated
    $dt=mysql_fetch_array($queryy);

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

?>

<table style=" width:100%; break-after: auto;">
    <tr>
        <td style="" colspan="8">&nbsp;</td>
        <td colspan="7" style="">Dumai, 27 Juli 2021</td>
    </tr>
    <tr>
        <td colspan="12" style=" ">&nbsp;</td>
    </tr>
    <tr>
        <td style="width: 10%; ">Nomor</td>
        <td style="width:3%;">: </td>
        <td style=" " colspan="4">xxxxxxxxxx</td>
        <td style="width:3%;" colspan="2">&nbsp; </td>
        <td style="text-align:left ;" colspan="7" rowspan="3">
            Kepada Yth : <br/> 
            Kepala Desa <?= $dt['nama_desa'];?> <br/> 
            Kecamatan Talang Muandau <br/>
            di- <br/>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat
        </td>
    </tr>
    <tr>
        <td style="width: 10%; ">Sifat</td>
        <td style="width:3%; ">:</td>
        <td style="  " colspan="4">Penting</td>
        <td style=" text-align: right; " colspan="2">Cq.</td>
    </tr>
    <tr>
        <td style="width: 10%; ">Lampiran</td>
        <td style="width:3%; ">: 
        <td style="  " colspan="4">
            -
        </td>
    </tr>

    <tr>
        <td colspan="15" style=" ">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="15" style=" ">&nbsp;</td>
    </tr>
    
    <tr>
        <td colspan="15" style=" ">&nbsp;</td>
    </tr>
    
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="14" style="text-align: justify;  ">
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan Pasal 16 Peraturan Daerah Kabupaten Bengkalis Nomor 10 Tahun 2016 tentang Pengangkatan dan Pemberhentian Perangkat Desa serta setelah mencermati dan meneliti berkas yang disampaikan berdasarkan surat Saudara Nomor : <?= $dt['no_surat'];?> tanggal <?= tanggal_indo($dt['tgl_surat']);?> hal <?= $dt['perihal'];?>, Desa <?= $dt['nama_desa'];?>.  Bersama ini disampaikan nama-nama yang direkomendasikan untuk diangkat sebagai Perangkat Desa sebagai Berikut :
            
        </td>
    </tr>
<?php
    $detail_surat = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $dt['detail_surat']), true );

?>
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="14" style="text-align: justify;  ">
            1. <?= $detail_surat;?>
        </td>
    </tr>
    <tr>
        <td style=" ">&nbsp;</td>
        <td colspan="14" style="text-align: justify;  ">
            1. cvcvcvvcv
        </td>
    </tr>
        

    <tr>
        <td>&nbsp;</td>
        <td colspan="14" style="text-align: justify;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berkenaan dengan hal tersebut diatas pada prinsipnya kami tidak berkeberatan, sepanjang memenuhi persyaratan dan tidak bertentangan dengan peraturan dan perundang-undangan yang berlaku namun proses selanjutnya kami serahkan sepenuhnya kepada Bapak.
        </td>
    </tr>
    <tr style="break-inside: avoid; break-after: auto;">
        <td>&nbsp;</td>
        <td colspan="14" style="text-align: justify;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikianlah Rekomendasi ini dibuat untuk dapat dipergunakan sebagaimana mestinya. Atas perhatiannya kami ucapkan terimakasih.</p>
        </td>
    </tr>

    <tr>
        <td colspan="15">&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td colspan="14" style="">
            <p style="font-style:italic;" >Wassalamu’alaikum Wr. Wb.</p>
        </td>
    </tr>

    <tr>
        <td colspan="15">&nbsp;</td>
    </tr>

    <tr>
        <td style="  " colspan="8">&nbsp;</td>
        <td style="  text-transform: uppercase; text-align: left; font-weight: bold;" colspan="7" rowspan="3">
                {{$detail->jabatan_ttd_surat_kecamatan}}
        </td>
    </tr>

    <tr>
        <td colspan="15"><br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td colspan="15"><br/><br/><br/></td>
    </tr>

    <tr>
        <td style="  " colspan="8">&nbsp;</td>
        <td style="  text-align: left; font-weight: bold;" colspan="7">
            {{$detail->nama_ttd_surat_kecamatan}}
        </td>
    </tr>
    <tr>
        <td style="  " colspan="8">&nbsp;</td>
        <td style="  text-align: left; " colspan="7" >
        {{$detail->pangkat_ttd_surat_kecamatan}}
        </td>
    </tr>
    <tr>
        <td style="  " colspan="8">&nbsp;</td>
        <td style="  text-align: left; " colspan="7" >
        NIP. {{$detail->nip_ttd_surat_kecamatan}}
        </td>
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
    $mpdf->Output("Surat Pengangkatan No. Surat $no_surat.pdf", 'I');

?>