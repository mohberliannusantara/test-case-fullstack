<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form id="TypeValidation" class="form-horizontal" action="<?php echo base_url('admin/produk/edit/') .$produk->id ?>" method="post" enctype="multipart/form-data" >
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
                        <input class="form-control" type="text" name="nama" value="<?php echo $produk->nama ?>" required="true" autofocus/>
                        <span class="bmd-help">Ubah nama produk.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="text" name="harga" value="<?php echo $produk->harga ?>" required="true" autofocus/>
                        <span class="bmd-help">Ubah nama produk.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <textarea class="form-control" name="deskripsi" rows="5" required><?php echo $produk->deskripsi  ?></textarea>
                        <span class="bmd-help">Ubah keterangan produk.</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Foto / Gambar</label>
                    <div class="col-sm-6">
                      <img src="<?php echo base_url('/assets/uploads/'.$produk->gambar);?>" width="50%" id="image-preview">
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
