<?php 
require "../config/koneksi.php"; 

$id_surat_masuk=$_POST['id_surat_masuk'];  
$no_surat=$_POST['no_surat'];
$jenis_surat=$_POST['jenis_surat'];
$tujuan_disposisi=$_POST['tujuan_disposisi'];
$isi_disposisi=$_POST['isi_disposisi'];
$sifat=$_POST['sifat'];
$batas_waktu=$_POST['batas_waktu'];
$catatan=$_POST['catatan'];
$id_user=$_POST['id_user'];
$kd=$_POST['kd'];


$query = "insert into tbl_disposisi(id_disposisi, no_surat, jenis_surat, tujuan_disposisi, isi_disposisi, sifat, batas_waktu, catatan, id_user) values(NULL,'$no_surat', '$jenis_surat', '$tujuan_disposisi', '$isi_disposisi', '$sifat', '$batas_waktu', '$catatan', '$id_user')" ;
$hasil = mysql_query($query);

//see the result
if($kd=="1"){
	if ($hasil) {
?>
		<script language="JavaScript">
		alert('Data Berhasil Ditambahkan');
		document.location='index.php?p=disposisi'</script>
	<?php }else{ ?>
		<script language="JavaScript">
		alert('Data Gagal Ditambahkan');
		document.location='index.php?p=tambah_disposisi_surat_masuk&id_surat_masuk=<?php echo $id_surat_masuk;?>&kd=<?php echo $kd;?>'</script>
	<?php } ?>

<?php 
} 
elseif($kd=="2") { 
 	if ($hasil) { ?>
		<script language="JavaScript">
		alert('Data Berhasil Ditambahkan');
		document.location='index.php?p=disposisi_lanjutan'</script>

	<?php }else{ ?>

	<script language="JavaScript">
	alert('Data Gagal Ditambahkan');
	document.location='index.php?p=tambah_disposisi_surat_masuk&id_surat_masuk=<?php echo $id_surat_masuk;?>&kd=<?php echo $kd;?>'</script>
	<?php } ?>
<?php } ?>	