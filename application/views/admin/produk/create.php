<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url('admin/produk/create/') ?>" method="post" enctype="multipart/form-data" >
          <div class="card ">
            <div class="card-header card-header-primary card-header-text">
              <div class="card-text">
                <h4 class="card-title">Form Ubah Produk</h4>
              </div>
            </div>
            <div class="card-body ">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="text" name="nama" value="<?php echo set_value('nama') ?>" required="true" autofocus/>
                        <span class="bmd-help">Tambahkan nama produk.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="number" name="harga" value="<?php echo set_value('harga') ?>" required="true" autofocus/>
                        <span class="bmd-help">Tambahkan harga produk.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <textarea class="form-control" type="text" name="deskripsi" value="<?php echo set_value('deskripsi') ?>" required="true" autofocus></textarea>
                        <span class="bmd-help">Tambahkan deskripsi produk.</span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-2 col-form-label">Foto / Gambar</label>
                    <div class="col-sm-6">
                      <img width="50%" id="image-preview">
                      <input type="file" name="gambar" class="form-control" placeholder="Gambar" onchange="previewImage(event)">
                    </div>
                  </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function previewImage(event)
{
  var reader = new FileReader();
  reader.onload = function()
  {
    var output = document.getElementById("image-preview");
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>
