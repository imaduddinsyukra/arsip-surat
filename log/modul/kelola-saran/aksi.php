<?php
    error_reporting(0);
    include "../../../config/koneksi.php";

    if($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        $query=mysql_query("DELETE from kritik_saran where id_contact='$id'");
        if($query){
            $_SESSION['id'] = "$id";
?>
            <script language="JavaScript">
            alert('Data Berhasil Dihapus');
            document.location='./index2.php?part=kelola-saran'</script>
        <?php
        } else {
        ?>
            <script language="JavaScript">
            alert('Data Gagal Dihapus');
            document.location='./index2.php?part=kelola-saran'</script>
<?php
        }
    }
?>