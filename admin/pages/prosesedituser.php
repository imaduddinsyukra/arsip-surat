<?php
include "../config/koneksi.php";//sambung ke mysql

//mengambil nilai dari form
$id_user = $_POST['id_user'];
$nama=$_POST['nama'];
$username=$_POST['username'];
$password= md5($_POST['password']);
$level=$_POST['level'];

$update = mysql_query("UPDATE tbl_user SET nama = '$nama', username = '$username', password = '$password', level = '$level'  WHERE id_user = '$id_user'");

if ($update){
//echo "sukses update data";
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=user'
</script>

<?php
}else{
echo "gagal : ".mysql_error();
}
?>