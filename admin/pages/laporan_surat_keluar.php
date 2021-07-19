<div id="lb-back">
  <div id="lb-img"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Laporan</a>
        </li>
        <li class="breadcrumb-item active">Surat Keluar</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Laporan Surat Keluar</div>
        <div class="card-body">
          <div class="table-responsive">
            <form action="pages/cetak_laporan_keluar.php" method="GET" target="blank">
              <div class="table-responsive">
                  <table width="100%">
                      <tr>
                          <td width="40%">
                              <select name="bulan" class="form-control">
                                <option selected="selected">Bulan</option>
                                  <?php
                                  $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                  $jlh_bln=count($bulan);
                                  for($c=0; $c<$jlh_bln; $c+=1){
                                      echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                                  }
                                  ?>
                              </select>
                          </td>
                          <td  width='40%'>
                              <select name="tahun" class="form-control">
                                  <option value="">Pilih Tahun</option>
                                  <?php
                                  $thn_skr = date('Y');
                                  for ($x = $thn_skr; $x >= 2010; $x--) {
                                  ?>
                                      <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                  <?php
                                  }
                                  ?>
                              </select>
                          </td>

                          <td>
                              <button type="submit" class="btn btn-warning">Download Laporan</button>
                          </td>
                      </tr>
                  </table>
              </div>
            </form>
            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

