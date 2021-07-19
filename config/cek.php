<?php
  session_start();
  if(!isset($_SESSION['username'])) {
  header('location:../index.php'); }
  else { $username = $_SESSION['username']; }
  require_once("koneksi.php");
  $query = mysql_query("SELECT * FROM tbl_user WHERE username = '$username'");
  $hasil = mysql_fetch_array($query);
?>