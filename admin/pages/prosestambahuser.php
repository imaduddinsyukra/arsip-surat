<?php 
require "../config/koneksi.php"; 
  
$nama=$_POST['nama'];
$username=$_POST['username'];
$password= md5($_POST['password']);
$level=$_POST['level'];
$status='1';

$query = "insert into tbl_user(id_user, nama, username, password, level, status) values(NULL,'$nama', '$username', '$password', '$level', '$status')" ;
$hasil = mysql_query($query);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Ditambahkan');
document.location='index.php?p=user'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Ditambahkan');
document.location='index.php?p=tambahuser'</script><?php }
?>