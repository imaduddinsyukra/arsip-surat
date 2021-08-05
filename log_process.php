<?php
// error_reporting(0);
session_start();
require_once("assets/conn/koneksi.php");
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $cekuser = mysql_query("SELECT * FROM tbl_user WHERE username = '$username' and password='$password' and status='1'");
  $jumlah = mysql_num_rows($cekuser);
  $hasil = mysql_fetch_array($cekuser); 

 if($jumlah == 1) {
  $_SESSION['id_user'] = $hasil['id_user'];
  $_SESSION['nama'] = $hasil['nama'];
  $_SESSION['level'] = $hasil['level'];
  // $_SESSION['foto'] = $hasil['foto'];
  $_SESSION['username'] = $username;

?>
<script language="JavaScript">
	document.location='admin.php'</script><?php

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