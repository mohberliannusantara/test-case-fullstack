<!-- Page Content -->
<div class="container">

  <!-- Image Header -->
  <img class="img-fluid rounded mt-4 mb-3" src="<?php echo base_url('assets/img/header_img.jpg') ?>" alt="">

  <h2 class="mt-4 mb-3">Produk</h2>
  <div class="row mt-4 mb-3">
    <div class="card-deck">
      <?php foreach ($produk as $key => $value): ?>
        <div class="card">
          <a href="#"><img class="card-img-top" src="<?php echo base_url() .'assets/uploads/'. $value->gambar  ?>" alt=""></a>
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $value->nama ?></h5>
            <h4 class="text-center">Rp. <?php echo number_format($value->harga,0,',','.') ?></h4>
            <p class="card-text"><?php echo $value->deskripsi ?></p>
          </div>
          <div class="card-footer">
            <center>
              <?php echo form_open('pembelian/addToCart'); ?>
              <input type="hidden" name="id" value="<?php echo $value->id; ?>">
              <input type="hidden" name="nama" value="<?php echo $value->nama; ?>">
              <input type="hidden" name="harga" value="<?php echo $value->harga; ?>">
              <input type="hidden" name="gambar" value="<?php echo $value->gambar; ?>">
              <input type="hidden" name="qty" value="1">
              <input class="btn btn-primary" type="submit" value="Beli">
              <?php echo form_close(); ?>
            </center>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
