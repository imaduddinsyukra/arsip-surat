<?php
error_reporting(0);
require "../config/koneksi.php";//sambung ke mysql

$id_surat_masuk=$_POST['id_surat_masuk'];
$no_agenda=$_POST['no_agenda'];
$indek_berkas=$_POST['indek_berkas'];
$perihal=$_POST['perihal'];
$pengirim=$_POST['pengirim'];
$no_surat=$_POST['no_surat'];
$tgl_surat=$_POST['tgl_surat'];
$tgl_diterima=$_POST['tgl_diterima'];
$keterangan=$_POST['keterangan'];
$id_user=$_POST['id_user'];
$gambar_lama=$_POST['gambar_lama'];

$result  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$no_surat);

$nama_file = $_FILES['gambar']['tmp_name'];
$file_upload = $_FILES['gambar']['name'];
$type = $_FILES['gambar']['type'];
$ex=explode('/', $type);
$namabaru = "surat_masuk".$result.'.'.$ex[1];
$file = str_replace(" ","_","$namabaru");
$folder = "../assets/gambar/$file";
 

if(move_uploaded_file("$nama_file","$folder"))
{ 
	$update = mysql_query("UPDATE tbl_surat_masuk SET no_agenda = '$no_agenda', indek_berkas = '$indek_berkas' , perihal='$perihal',pengirim='$pengirim', no_surat='$no_surat', tgl_surat='$tgl_surat', tgl_diterima='$tgl_diterima',keterangan='$keterangan',id_user='$id_user', gambar='$folder' WHERE id_surat_masuk = '$id_surat_masuk'");
}
else{
	$update = mysql_query("UPDATE tbl_surat_masuk SET no_agenda = '$no_agenda', indek_berkas = '$indek_berkas' , perihal='$perihal',pengirim='$pengirim', no_surat='$no_surat', tgl_surat='$tgl_surat', tgl_diterima='$tgl_diterima',keterangan='$keterangan',id_user='$id_user', gambar='$gambar_lama' WHERE id_surat_masuk = '$id_surat_masuk'");
}
if ($update){
//echo "sukses update data";
?>
<script>
alert('Data Berhasil Diedit');
document.location.href="index.php?p=surat_masuk"
</script>

<?php
}else{
?>

<script>
alert('Data Gagal Diedit');
document.location.href="index.php?p=edit_surat_masuk&id_surat_masuk=<?php echo $id_surat_masuk;?>"
</script>

<?php
}
?>