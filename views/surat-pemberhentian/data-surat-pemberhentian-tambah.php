<div id="lb-back">
  <div id="lb-img"></div>
</div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Surat Rekomendasi Pemberhentian</a>
        </li>
        <li class="breadcrumb-item active">Tambah Data Surat Rekomendasi Pemberhentian</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-clipboard"></i> Form Tambah Data Surat Rekomendasi Pemberhentian</div>
        <div class="card-body">
          <div class="table-responsive">
            <p align="right">
                <a href="javascript:history.back()" class="btn btn-primary mb-3"> <i class="fa fa-fw fa-arrow-left"></i> Kembali</a>
            </p>

<form action="admin.php?part=aksi-surat-pemberhentian" method="post" enctype="multipart/form-data">

    <input type="hidden" name="parm" value="add_bos">
    <input type='hidden' name='id_user' value="<?= $_SESSION['id_user']; ?>" required> 
    <div class="form-group mb-4">
        <label>No. Surat *</label>
        <input type='text' name='no_surat' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Tanggal Surat *</label>
        <input type='date' name='tgl_surat' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Tujuan*</label>
        <input type='text' name='tujuan_surat' class="form-control" required>
    </div>
    
    <div class="form-group mb-4">
        <label>Perihal*</label>
        <input type='text' name='perihal' class="form-control" required>
    </div>

    <div class="form-group mb-4">
        <label>Sifat *</label>
        <select name="sifat" class="form-control" required>
          <option value="0">Pilih Sifat</option>
          <option value="Biasa">Biasa</option> 
          <option value="Penting">Penting</option> 
          <option value="Sangat Penting">Sangat Penting</option>  
          <option value="Segera">Segera</option>  
          <option value="Rahasia">Rahasia</option> 
        </select>
    </div>
   
    <hr/>
    <h5>Data Pegawai Yang Direkomendasikan</h5>
    <br/>

    <div class="control-group after-add-more">
      <div class="form-group mb-4">
          <label>Nama Yang Diajukan*</label>
          <input type="text" name="nama_diajukan[]" class="form-control" required>
      </div>
      <div class="form-group mb-4">
          <label>Tempat Lahir*</label>
          <input type="text" name="tempat_lahir_diajukan[]" class="form-control" required>
      </div>
      <div class="form-group mb-4">
          <label>Tanggal Lahir*</label>
          <input type="date" name="tgl_lahir_diajukan[]" class="form-control" required>
      </div>
      <div class="form-group mb-4">
          <label>Jabatan*</label>
          <input type="text" name="jabatan_diajukan[]" class="form-control" required>
      </div>
      <div class="form-group mb-4">
          <label>Keterangan*</label>
          <input type="text" name="keterangan_diajukan[]" class="form-control" required>
      </div>
      <button class="btn btn-success add-more" type="button">
        <i class="fa fa-fw fa-plus"></i> Tambah Nama Yang Diajukan
      </button>
      <hr>
    </div>

    <button type="submit" class="btn btn-md btn-success login-submit-cs"><i class="fa fa-fw fa-save"></i>Simpan</button>
</form>
 <!-- class hide membuat form disembunyikan  -->
    <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
    <div class="copy invisible">
      <div class="control-group">
          <div class="form-group mb-4">
            <label>Nama Yang Diajukan*</label>
            <input type="text" name="nama_diajukan[]" class="form-control">
          </div>
          <div class="form-group mb-4">
              <label>Tempat Lahir*</label>
              <input type="text" name="tempat_lahir_diajukan[]" class="form-control">
          </div>
          <div class="form-group mb-4">
              <label>Tanggal Lahir*</label>
              <input type="date" name="tgl_lahir_diajukan[]" class="form-control">
          </div>
          <div class="form-group mb-4">
              <label>Jabatan*</label>
              <input type="text" name="jabatan_diajukan[]" class="form-control">
          </div>
          <div class="form-group mb-4">
              <label>Keterangan*</label>
              <input type="text" name="keterangan_diajukan[]" class="form-control">
          </div>
          <br>
          <button class="btn btn-danger remove" type="button"><i class="fa fa-fw fa-trash"></i> Hapus Nama Yang Diajukan</button>
          <hr>
        </div>
      </div>
    </div>
    <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->




            
          </div>
        </div>

      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>