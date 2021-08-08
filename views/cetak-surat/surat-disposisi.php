<?php
    ob_start(); 
    include ("../../assets/conn/koneksi.php");
    $id_disposisi = $_GET['id_disposisi'];
    $queryy_awal = mysql_query("SELECT * FROM tbl_disposisi WHERE id_disposisi = '$id_disposisi'"); //get the data that will be updated
    $dt_awal=mysql_fetch_array($queryy_awal);

    $kategori_surat = $dt_awal['kategori_surat']; 

    if($kategori_surat=="Surat Masuk"){
    $queryy = mysql_query("SELECT *, tbl_disposisi.updated_at as tgl_terbit FROM tbl_disposisi join tbl_surat_masuk join tbl_jenis_surat join tbl_user where tbl_disposisi.no_surat = tbl_surat_masuk.no_surat and tbl_surat_masuk.id_jenis_surat = tbl_jenis_surat.id_jenis_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'"); 
    }
    elseif($kategori_surat=="Surat Keluar"){
    $queryy = mysql_query("SELECT *, tbl_disposisi.updated_at as tgl_terbit FROM tbl_disposisi join tbl_surat_keluar join tbl_jenis_surat join tbl_user where tbl_disposisi.no_surat = tbl_surat_keluar.no_surat and tbl_surat_keluar.id_jenis_surat = tbl_jenis_surat.id_jenis_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'");
    }
    elseif($kategori_surat=="Surat Pengangkatan"){
    $queryy = mysql_query("SELECT *, tbl_disposisi.updated_at as tgl_terbit FROM tbl_disposisi join tbl_surat_rekomendasi_pengangkatan join tbl_user where tbl_disposisi.no_surat = tbl_surat_rekomendasi_pengangkatan.no_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'");
    }
    elseif($kategori_surat=="Surat Pemberhentian"){
    $queryy = mysql_query("SELECT *, tbl_disposisi.updated_at as tgl_terbit FROM tbl_disposisi join tbl_surat_rekomendasi_pemberhentian join tbl_user where tbl_disposisi.no_surat = tbl_surat_rekomendasi_pemberhentian.no_surat and tbl_disposisi.id_user = tbl_user.id_user and id_disposisi = '$id_disposisi'");
    }
    $dt=mysql_fetch_array($queryy);
    $no_suratnya = $dt['no_surat'];
    $tgl_suratnya = $dt['tgl_surat'];


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
    $tgl_surat_terbit = date("Y-m-d", strtotime($dt['tgl_terbit']));
?>
<table style="width:25%; break-after: auto; font-family:times new roman; font-size: 12px" align="right">
    <tr>
        <td style="" colspan="4">&nbsp;</td>
        <td style=" border: 2px solid black; padding-left: 10px;padding-top: 3px;padding-bottom: 12px "><b> FR-ADUM-02.00 <br/> <?= tanggal_indo($tgl_surat_terbit);?></b></td>
    </tr>
</table>

<table style=" border: 2px solid black; border-bottom: 1px solid black; width:100%; break-after: auto; font-family:times new roman; font-size: 14px">
    <tr>
        <td style="text-align: center" colspan="6"><b>LEMBAR DISPOSISI</b></td>
    </tr>
</table>

<table style=" border: 2px solid black; border-bottom: 1px solid black; width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
    <tr>
        <?php if($kategori_surat=="Surat Masuk"){ ?>
            <td style="font-weight: bold; text-transform: uppercase; width: 15%;">surat dari</td>
        <?php } else { ?>
            <td style="font-weight: bold; text-transform: uppercase; width: 15%;">surat untuk</td>
        <?php } ?>
        <td style="font-weight: bold; text-transform: uppercase; width: 3%;">:</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;"><?= $dt['surat_dari_lanjutan'];?></td>
        <td style="font-weight: bold; text-transform: uppercase;">diterima tgl</td>
        <td style="font-weight: bold; text-transform: uppercase;; width: 3%;">:</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;"><?= tanggal_indo($dt['diterima_tgl_lanjutan']);?></td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 15%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 3%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase;">no. agenda</td>
        <td style="font-weight: bold; text-transform: uppercase;; width: 3%;">:</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;"><?= $dt['no_agenda'];?></td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 15%;">no. surat</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 3%;">:</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;"><?= $dt['no_surat'];?></td>
        <td style="font-weight: bold; text-transform: uppercase;">sifat</td>
        <td style="font-weight: bold; text-transform: uppercase;; width: 3%;">:</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 15%;">tgl. surat</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 3%;">:</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;"><?= tanggal_indo($dt['tgl_surat']);?></td>
        <td style="font-weight: bold; text-transform: uppercase;" colspan="3">
            <table style="width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
                <tr>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%; text-align:center">
                        <?php
                            if($dt['sifat_lanjutan']=="Sangat Segera"){
                                echo "v";
                            }
                            else{
                                echo "&nbsp;";
                            }
                        ?>
                    </td>
                    <td style="font-weight: bold; text-transform: uppercase;">sangat segera</td>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%; text-align:center">
                        <?php
                            if($dt['sifat_lanjutan']=="Segera"){
                                echo "v";
                            }
                            else{
                                echo "&nbsp;";
                            }
                        ?>
                    </td>
                    <td style="font-weight: bold; text-transform: uppercase;">segera</td>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%; text-align:center">
                        <?php
                            if($dt['sifat_lanjutan']=="Rahasia"){
                                echo "v";
                            }
                            else{
                                echo "&nbsp;";
                            }
                        ?>
                    </td>
                    <td style="font-weight: bold; text-transform: uppercase;">rahasia</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table style=" border: 2px solid black; border-bottom: 1px solid black; width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 15%; height: 100px">hal :</td>
        <td style="font-weight: bold; text-transform: uppercase; height: 100px"><?= $dt['hal_lanjutan'];?></td>
    </tr>
</table>

<table style=" border: 2px solid black; border-bottom: 1px solid black; width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;">diteruskan kepada sdr. :</td>>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%;">dengan hormat harap :</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%; padding-left:35px">
            <table style="width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
                <?php
                    $no = 1;
                    $datanya = json_decode($dt['diteruskan_lanjutan'], true);
                    $count = count($datanya);
                    foreach($datanya as $values)
                    {
                ?>
                <tr>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%;">&nbsp;</td>
                    <td style="border-bottom: 1px solid black;font-weight: bold; text-transform: uppercase;">
                        <u><?= $values['nama'];?></u>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </td>
        <td style="font-weight: bold; text-transform: uppercase; width: 30%; padding-left:35px">
            <table style="width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
                <tr>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%;text-align:center">
                        <?php
                            if($dt['tindakan_lanjutan']=="Tanggapan dan Saran"){
                                echo "v";
                            }
                            else{
                                echo "&nbsp;";
                            }
                        ?>
                    </td>
                    <td style="font-weight: bold; text-transform: uppercase;">tanggapan dan saran</td>
                </tr>
                <tr>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%;text-align:center">
                        <?php
                            if($dt['tindakan_lanjutan']=="Proses Lebih Lanjut"){
                                echo "v";
                            }
                            else{
                                echo "&nbsp;";
                            }
                        ?>
                    </td>
                    <td style="font-weight: bold; text-transform: uppercase;">proses lebih lanjut</td>
                </tr>
                <tr>
                    <td style="border: 2px solid black;font-weight: bold; width: 7%; text-align:center">
                        <?php
                            if($dt['tindakan_lanjutan']=="Koordinasikan/Konfirmasikan"){
                                echo "v";
                            }
                            else{
                                echo "&nbsp;";
                            }
                        ?>
                    </td>
                    <td style="font-weight: bold; text-transform: uppercase;">koordinasikan / konfirmasikan</td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<table style=" border: 2px solid black; border-bottom: 2px solid black; width:100%; break-after: auto; font-family:times new roman; font-size: 12px">
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">Catatan :</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;"><?= $dt['catatan_lanjutan'];?></td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">Camat talang muandau</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;"><u>________________________________</u></td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
    <tr>
        <td style="font-weight: bold; text-transform: uppercase; width: 60%;">&nbsp;</td>
        <td style="font-weight: bold; text-transform: uppercase; width: 40%;">&nbsp;</td>
    </tr>
</table>


<?php
    $out = ob_get_contents();
    ob_end_clean();
	require_once "../../assets/acc/mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
    $mpdf->SetTitle("Surat Rekomendasi Pengangkatan");
    $mpdf->SetDisplayMode('fullpage');
	$mpdf->AddPage("P","","","","","10","10","10","10","","","","","","","","","","","","A4");
	// $mpdf->WriteHTML($content);
    $mpdf->WriteHTML($out);
    $mpdf->Output("Surat Disposisi No. $no_suratnya Tanggal $tgl_suratnya.pdf", 'D');

?>