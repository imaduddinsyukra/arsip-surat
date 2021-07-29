<?php
    date_default_timezone_set('Asia/Jakarta');
    $base_url = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
    
    $uuid = uniqid().'SrTrKmDbRt'.rand();
    
    $no_surat = $_POST['no_surat'];
    $tgl_surat = $_POST['tgl_surat'];
    $tujuan_surat = $_POST['tujuan_surat'];
    $perihal = $_POST['perihal'];
    $sifat = $_POST['sifat'];
    
    $nama_diajukan = $_POST['nama_diajukan'];
    $jabatan_diajukan = $_POST['jabatan_diajukan'];
    $tempat_lahir_diajukan = $_POST['tempat_lahir_diajukan'];
    $tgl_lahir_diajukan = $_POST['tgl_lahir_diajukan'];
    $keterangan_diajukan = $_POST['keterangan_diajukan'];

    $id_user = $_POST['id_user'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    $total = count($nama_diajukan);
    $detail_surat = "";
    for($i=0; $i<$total; $i++){
        $detail_surat = $detail_surat.'{"nama":"'.$nama_diajukan[$i].'","tempat_lahir":"'. $tempat_lahir_diajukan[$i].'","tgl_lahir":"'. $tgl_lahir_diajukan[$i].'","jabatan":"'. $jabatan_diajukan[$i].'","keterangan":"'. $keterangan_diajukan[$i].'"}, ';
    }

    
    $set_detail = '['.$detail_surat.']';
    $detail_final = str_replace(", ]","]",$set_detail);

    if($_POST['parm']=='add_bos')
    {
        if($sifat=='0'){
            echo "
            <script>
                alert('Sifat Surat Wajib Diisi');
                javascript: history.go(-1);
            </script>
            ";
        }
        else{
            //catat nama file ke database
            $query = "INSERT into tbl_surat_rekomendasi_pemberhentian (id_surat_pemberhentian, no_surat, tgl_surat, sifat, perihal, tujuan_surat, detail_surat, id_user,created_at, updated_at, keterangan) values ('$uuid','$no_surat','$tgl_surat','$sifat','$perihal','$tujuan_surat','$detail_final','$id_user','$created_at','$updated_at','Aktif')";
            
            $hasil = mysql_query($query);

            if ($hasil) { 
                echo "
                    <script language='JavaScript'>
                    alert('Data Berhasil Ditambah');
                    document.location='./admin.php?part=data-surat-pemberhentian'</script>
                " ;
            }
            else{
                echo "
                    <script language='JavaScript'>
                    alert('Data Gagal Ditambah');
                    document.location='./admin.php?part=tambah-surat-pemberhentian'</script>
                " ;
            }
    	}
//==============================================================================
    }
        elseif($_POST['parm']=='update_bos')
    {
        $id_surat_pemberhentian = $_POST['id_surat_pemberhentian'];

        //catat nama file ke database
        $query = "UPDATE tbl_surat_rekomendasi_pemberhentian SET 
                no_surat = '$no_surat',
                tgl_surat = '$tgl_surat',
                tujuan_surat = '$tujuan_surat',
                perihal = '$perihal',
                sifat = '$sifat',
                detail_surat = '$detail_final',
                id_user = '$id_user',
                updated_at = '$updated_at'
                WHERE id_surat_pemberhentian = '$id_surat_pemberhentian'";
        
        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Diubah");
                    document.location="./admin.php?part=data-surat-pemberhentian"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                var id_surat = "<?= $id_surat_pemberhentian?>";
                alert("Data Gagal Diubah");
                document.location="./admin.php?part=ubah-surat-pemberhentian&id_surat_pemberhentian=" + id_surat
            </script>
        <?php
        }
          
    //==============================================================================
    }
        elseif($_POST['parm']=='delete_bos')
    {
        $id = $_POST['idnya'];
        $id_user = $_POST['id_user'];

        $query = "UPDATE tbl_surat_rekomendasi_pemberhentian SET 
                keterangan = 'Tidak Aktif',
                id_user = '$id_user',
                updated_at = '$updated_at'
                WHERE id_surat_pemberhentian = '$id'";

        $hasil = mysql_query($query);

        if ($hasil) { 
        ?>
                <script language="JavaScript">
                    alert("Data Berhasil Dihapus");
                    document.location="./admin.php?part=data-surat-pemberhentian"
                </script>
        <?php
        }
        else{
        ?>
            <script language="JavaScript">
                alert("Data Gagal Dihapus");
                document.location="./admin.php?part=data-surat-pemberhentian"
            </script>
        <?php
        }
    }
?>