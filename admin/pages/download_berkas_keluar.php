<?php
ob_start();
//Koneksi ke database
?>
<?php
include '../../config/koneksi.php';
$id = $_GET['id_surat_keluar']; //get the no which will updated
$queryy = mysql_query("SELECT * FROM tbl_surat_keluar WHERE id_surat_keluar = '$id'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy)

 ?>
<style>
td {
    padding: 3px 5px 3px 5px;
    border-right: 1px solid #666666;
    border-bottom: 1px solid #666666;
}
 
.head td {
    font-weight: bold;
    font-size: 12px;
    background: #b7f0ff; 
}
 
table .main tbody tr td {
    font-size: 12px;
}
 
table, table .main {
    width: 100%;
    border-top: 1px solid #666;
    border-left: 1px solid #666;
    border-collapse: collapse;
    background: #fff;
}
 
h1 {
    font-size:20px;
}
</style>
 </head>
 <body>
 
 

<img src="<?php echo '../'.$dt['gambar']; ?>" class="zoomD" alt="" style="width:1500px">



<?php
  $no_surat = $dt['no_surat'];
?>












<?php
date_default_timezone_set('Asia/Jakarta');
 

$footer = '<table cellpadding=0 cellspacing=0 style="border:none;">
           <tr><td style="margin-right:-5px;border:none;" align="left">
           Dicetak: '.date("d-m-Y H:i").'</td>
       <td style="margin-right:-5px;border:none;" align="right">
           Halaman: {PAGENO} / {nb}</td></tr></table>';            

$out = ob_get_contents();
ob_end_clean();
include("../../assets/mpdf/mpdf.php");
$mpdf=new mPDF('utf-8', "A4", 9 ,'Arial', 2, 2, 2, 2, 2, 2);
$mpdf->SetTitle("Berkas Scan Surat Keluar");$mpdf->SetDisplayMode('fullpage');
$mpdf->setHTMLHeader($header);
$mpdf->setHTMLFooter($footer);
$stylesheet = file_get_contents('../../assets/mpdf/mpdf.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($out);
$mpdf->Output("Berkas Scan Surat Keluar $no_surat.pdf", 'I');
?>
</body>
</html>