<?php
// error_reporting(0);
    ob_start(); 
    include ("../../assets/conn/koneksi.php");
    
    date_default_timezone_set('Asia/Jakarta');

    $tgl_mulai = $_GET['tgl_mulai'];
    $tanggal_selesai = $_GET['tgl_selesai'];
    if($_GET['tgl_mulai']!="" &&  $_GET['tgl_selesai']!=""){
        $ex = explode('-',$tanggal_selesai);
        $new_sls = $ex[2]+1;
        $tgl_selesai = $ex[0].'-'.$ex[1].'-'.$new_sls;
    }
    else{
        $tgl_selesai = $_GET['tgl_selesai'];
    }
    $kat = $_GET['kategori'];

    if($kat == "Surat Masuk"){
        if($_GET['tgl_mulai']=="" && $_GET['tgl_selesai']==""){
          $sqll = "select * from tbl_surat_masuk join tbl_user using(id_user)";
        }
        else{
          $sqll = "select * from tbl_surat_masuk join tbl_user using(id_user) where tbl_surat_masuk.created_at between '$tgl_mulai' and '$tgl_selesai'";
        }
    }
    elseif($kat == "Surat Keluar"){
        if($_GET['tgl_mulai']=="" && $_GET['tgl_selesai']==""){
          $sqll = "select * from tbl_surat_keluar join tbl_user using(id_user)";
        }
        else{
          $sqll = "select * from tbl_surat_keluar join tbl_user using(id_user) where tbl_surat_keluar.created_at between '$tgl_mulai' and '$tgl_selesai'";
        }
    }
    elseif($kat == "Surat Pengangkatan"){
        if($_GET['tgl_mulai']=="" && $_GET['tgl_selesai']==""){
          $sqll = "select * from tbl_surat_rekomendasi_pengangkatan join tbl_user using(id_user)";
        }
        else{
          $sqll = "select * from tbl_surat_rekomendasi_pengangkatan join tbl_user using(id_user) where tbl_surat_rekomendasi_pengangkatan.created_at between '$tgl_mulai' and '$tgl_selesai'";
        }
    }
    elseif($kat == "Surat Pemberhentian"){
        if($_GET['tgl_mulai']=="" && $_GET['tgl_selesai']==""){
          $sqll = "select * from tbl_surat_rekomendasi_pemberhentian join tbl_user using(id_user)";
        }
        else{
          $sqll = "select * from tbl_surat_rekomendasi_pemberhentian join tbl_user using(id_user) where tbl_surat_rekomendasi_pemberhentian.created_at between '$tgl_mulai' and '$tgl_selesai'";
        }
    }
      $resultt = mysql_query($sqll);

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

<table style=" width:100%; font-family:times new roman;  ">
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <?php 
            if($_GET['tgl_mulai']=="" && $_GET['tgl_selesai']==""){
        ?>
            <td style="text-align: center; font-weight: bold; font-size: 18px">Laporan <?= $kat;?></td>
        <?php } else { ?>
            <td style="text-align: center; font-weight: bold; font-size: 18px">Laporan <?= $kat;?> Tanggal <?= tanggal_indo($_GET['tgl_mulai']);?> s/d Tanggal <?= tanggal_indo($_GET['tgl_selesai']);?></td>
        <?php } ?>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<table style=" width:100%; font-family:times new roman;  align: right">
    <tr>
        <td><b>Tanggal Cetak : </b> <?= tanggal_indo(date("Y-m-d"));?> <b>Pukul : </b> <?= date("H:i:s");?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>

<table style="width:100%; font-family:times new roman; break-inside: avoid; break-after: auto; ">
    <tr style="break-inside: avoid; break-after: auto;">
        <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">No.</p></td>
        <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">No. Surat</p></td>
        <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Tanggal Surat</p></td>
        <?php if($kat == "Surat Masuk"){ ?>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Dari</p></td>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Tanggal Diterima</p></td>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Diterima Oleh</p></td>
        <?php }elseif($kat == "Surat Keluar"){ ?>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Tujuan</p></td>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Tanggal Catat</p></td>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Dicatat Oleh</p></td>
        <?php }elseif($kat == "Surat Pengangkatan" || $kat == "Surat Pemberhentian"){ ?>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Sifat</p></td>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Perihal</p></td>
            <td style="border: 1px solid black;font-weight: bold;text-align: center;"><p align="center">Tujuan</p></td>
        <?php } ?>
    </tr>
    <?php
        $nomor=1;
        while($data = mysql_fetch_array($resultt)){
    ?>              
    <tr style="break-inside: avoid; break-after: auto;">
        <td style="border: 1px solid black;"><?= $nomor++; ?></td>
        <td style="border: 1px solid black;"><?= $data['no_surat'];?></td>
        <td style="border: 1px solid black;text-align: center;"><?= $data['tgl_surat'];?></td>
        <?php if($kat == "Surat Masuk"){ ?>
            <td style="border: 1px solid black;"><?= $data['pengirim'];?></td>
            <td style="border: 1px solid black;text-align: center;"><?= $data['tgl_diterima'];?></td>
            <td style="border: 1px solid black;"><?= $data['nama'];?></td>
        <?php }elseif($kat == "Surat Keluar"){ ?>
            <td style="border: 1px solid black;"><?= $data['tujuan'];?></td>
            <td style="border: 1px solid black;text-align: center;"><?= $data['tgl_catat'];?></td>
            <td style="border: 1px solid black;"><?= $data['nama'];?></td>
        <?php }elseif($kat == "Surat Pengangkatan" || $kat == "Surat Pemberhentian"){ ?>
            <td style="border: 1px solid black;"><?= $data['sifat'];?></td>
            <td style="border: 1px solid black;"><?= $data['perihal'];?></td>
            <td style="border: 1px solid black;"><?= $data['tujuan_surat'];?></td>
        <?php } ?>
        
    </tr>
    <?php
        }
    ?>
</table>


<?php
    $out = ob_get_contents();
    ob_end_clean();
	require_once "../../assets/acc/mpdf_v8.0.3-master/vendor/autoload.php";
	$mpdf = new \Mpdf\Mpdf();
    $mpdf->SetTitle("Surat Rekomendasi Pengangkatan");
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->shrink_tables_to_fit = 1;
	$mpdf->AddPage("L","","","","","15","15","15","15","","","","","","","","","","","","A4");
	// $mpdf->WriteHTML($content);
    $mpdf->WriteHTML($out);
    $mpdf->Output("Surat Pemberhentian No. $no_surat Tanggal $tgl_surat.pdf", 'I');

?>