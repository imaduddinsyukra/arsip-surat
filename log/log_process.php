<?php
error_reporting(0);
session_start();
require_once("../assets/conn/koneksi.php");
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username' and password='$password' and status='1'");
  $jumlah = mysql_num_rows($cekuser);
  $hasil = mysql_fetch_array($cekuser); 

 if($jumlah == 1) {
$_SESSION['username'] = $username;
$_SESSION['level'] = $hasil['level'];
$_SESSION['nama'] = $hasil['nama'];
$_SESSION['id_user'] = $hasil['id_user'];

?>
<script language="JavaScript">
	document.location='index2.php'</script><?php

}


else {
// jika login salah //
?>
 <script language="JavaScript">
	alert('Username atau password Anda salah'); 
	document.location='index.php'</script><?php
echo mysql_error() ;
}
?>