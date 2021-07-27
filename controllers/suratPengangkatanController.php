<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'SrTrKmD'.rand();
    
    $jenis_rekomendasi = $_POST['jenis_rekomendasi'];
    $no_surat = $_POST['no_surat'];
    $tgl_surat = $_POST['tgl_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $perihal = $_POST['perihal'];
    $sifat = $_POST['sifat'];
    $no_surat_lampiran = $_POST['no_surat_lampiran'];
    $tgl_surat_lampiran = $_POST['tgl_surat_lampiran'];
    $perihal_surat_lampiran = $_POST['perihal_surat_lampiran'];
    $nama_diajukan = $_POST['nama_diajukan'];
    $jabatan_diajukan = $_POST['jabatan_diajukan'];

    $id_user = $_POST['id_user'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    $total = count($nama_diajukan);
    $detail_surat = "";
    for($i=0; $i<$total; $i++){
        $detail_surat = $detail_surat.'{"nama": "'.$nama_diajukan[$i].'", "jabatan": "'. $jabatan_diajukan[$i].'"}, ';
    }
    $set_detail = json_encode($detail_surat);


   echo "DETAILNYA";
   echo $set_detail;

   
   $ubah = json_decode($set_detail);

   echo "<br/>==============================<br/>";
   echo "UBAH BOS";
   echo array($ubah);

   var_dump($ubah);

?>