<?php 
require "../config/koneksi.php"; 
  
$no_agenda=$_POST['no_agenda'];
$perihal=$_POST['perihal'];
$tujuan=$_POST['tujuan'];
$no_surat=$_POST['no_surat'];
$tgl_surat=$_POST['tgl_surat'];
$tgl_catat=$_POST['tgl_catat'];
$keterangan=$_POST['keterangan'];
$id_user=$_POST['id_user'];

$result  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$no_surat);
// $nama_file = $_FILES['gambar']['tmp_name']; 
// $file_upload = $_FILES['gambar']['name']; 
// $file = str_replace (" ","_","$file_upload"); 
// $folder = "../gambar/$file"; 

$nama_file = $_FILES['gambar']['tmp_name'];
$file_upload = $_FILES['gambar']['name'];
$type = $_FILES['gambar']['type'];
$ex=explode('/', $type);
$namabaru = "surat_keluar".$result.'.'.$ex[1];
$file = str_replace(" ","_","$namabaru");
$folder = "../assets/gambar/$file";
 
//kondisi pada saat proses SIMPAN data, kondisi file upload 
if(move_uploaded_file("$nama_file","$folder"))
{ 
 $sql = "INSERT INTO tbl_surat_keluar  
           ( 
        no_agenda, 
			  perihal,
			  tujuan,
			  no_surat,
			  tgl_surat,
			  tgl_catat,
			  keterangan,
			  id_user,
        gambar
           ) 
 
           VALUES  
           (  
        '$no_agenda',
			  '$perihal', 
			  '$tujuan',
			  '$no_surat',
			  '$tgl_surat',  
			  '$tgl_catat',
			  '$keterangan',
			  '$id_user',
        '$folder' 
            )"; 
} 
$hasil=mysql_query($sql); 

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Ditambahkan');
document.location='index.php?p=surat_keluar'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Ditambahkan');
document.location='index.php?p=tambah_surat_keluar'</script><?php }
?>