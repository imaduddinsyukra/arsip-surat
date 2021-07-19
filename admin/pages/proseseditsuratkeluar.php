<?php
error_reporting(0);
require "../config/koneksi.php";//sambung ke mysql

$id_surat_keluar=$_POST['id_surat_keluar'];
$no_agenda=$_POST['no_agenda'];
$perihal=$_POST['perihal'];
$tujuan=$_POST['tujuan'];
$no_surat=$_POST['no_surat'];
$tgl_surat=$_POST['tgl_surat'];
$tgl_catat=$_POST['tgl_catat'];
$keterangan=$_POST['keterangan'];
$id_user=$_POST['id_user'];
$gambar_lama=$_POST['gambar_lama'];

$result  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$no_surat);

$nama_file = $_FILES['gambar']['tmp_name'];
$file_upload = $_FILES['gambar']['name'];
$type = $_FILES['gambar']['type'];
$ex=explode('/', $type);
$namabaru = "surat_keluar".$result.'.'.$ex[1];
$file = str_replace(" ","_","$namabaru");
$folder = "../assets/gambar/$file";
 

if(move_uploaded_file("$nama_file","$folder"))
{ 
	$update = mysql_query("UPDATE tbl_surat_keluar SET no_agenda = '$no_agenda', perihal='$perihal',tujuan='$tujuan', no_surat='$no_surat', tgl_surat='$tgl_surat', tgl_catat='$tgl_catat',keterangan='$keterangan',id_user='$id_user', gambar='$folder' WHERE id_surat_keluar = '$id_surat_keluar'");
}
else{
	$update = mysql_query("UPDATE tbl_surat_keluar SET no_agenda = '$no_agenda', perihal='$perihal',tujuan='$tujuan', no_surat='$no_surat', tgl_surat='$tgl_surat', tgl_catat='$tgl_catat',keterangan='$keterangan',id_user='$id_user', gambar='$gambar_lama' WHERE id_surat_keluar = '$id_surat_keluar'");
}
if ($update){
//echo "sukses update data";
?>
<script>
alert('Data Berhasil Diedit');
document.location.href="index.php?p=surat_keluar"
</script>

<?php
}else{
?>

<script>
alert('Data Gagal Diedit');
document.location.href="index.php?p=edit_surat_keluar&id_surat_keluar=<?php echo $id_surat_keluar;?>"
</script>

<?php
}
?>