<!-- Page Content -->
<div class="container">

  <h2 class="mt-4 mb-3">Keranjang</h2>

  <div class="row mt-4 mb-6">
    <div class="row">
      <div class="col-md-9">
        <form class="" action="<?php echo base_url('pembelian/edit') ?>" method="post" enctype="multipart/form-data">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th width="100">QTY</th>
                <th>Subtotal</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $total = 0;
              if (count($keranjang) > 0) {
                foreach ($keranjang as $item) {
                  $total += $item['subtotal']; ?>
                  <tr>
                    <td><img src="<?php echo base_url('assets/uploads/'.$item['gambar']) ?>" width="200"></td>
                    <td><?php echo $item['nama']; ?></td>
                    <td>Rp. <?php echo number_format($item['harga'],0,',','.') ?></td>
                    <td>
                      <input type="hidden" name="keranjang[<?php echo $item['id'];?>][id]" value="<?php echo $item['id'];?>" />
                      <input type="hidden" name="keranjang[<?php echo $item['id'];?>][rowid]" value="<?php echo $item['rowid'];?>" />
                      <input type="hidden" name="keranjang[<?php echo $item['id'];?>][nama]" value="<?php echo $item['nama'];?>" />
                      <input type="hidden" name="keranjang[<?php echo $item['id'];?>][harga]" value="<?php echo $item['harga'];?>" />
                      <input type="hidden" name="keranjang[<?php echo $item['id'];?>][gambar]" value="<?php echo $item['gambar'];?>" />

                      <input type="number" min="1" name="keranjang[<?php echo $item['id'];?>][qty]" class="form-control" value="<?php echo $item['qty']; ?>">

                    </td>
                    <td>Rp <?php echo number_format($item['subtotal'],0,',','.'); ?></td>
                    <td><a href="<?php echo site_url('pembelian/delete/'.$item['rowid']); ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                  </tr>
                <?php  }
              } else { ?>
                <tr>
                  <td colspan=6 align="center">
                    <h3>Keranjang pesanan kosong</h3>
                  </td>
                </tr>
                <tr>
                  <td colspan=6 align="center">
                    <a href="<?php echo base_url('produk') ?>">Lihat produk!</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </form>
      </div>
      <div class="col-md-3">
        <h4>Detail Informasi</h4>
        <br>
        <?php echo form_open("pembelian/pay"); ?>
        <div class="form-group">
          <label for="nama"><span class="glyphicon glyphicon-user"></span> Nama </label>
          <input type="text" class="form-control" id="nama" name="nama" required autofocus>
        </div>

        <div class="form-group">
          <label for="Alamat" class="control-label"> Alamat </label>
          <textarea name="alamat" class="form-control" required></textarea>
        </div>

        <div class="form-group">
          <label for="telepon"><span class="glyphicon glyphicon-user"></span> Telepon </label>
          <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>

        <div class="form-group">
          <label for="username"><span class="glyphicon glyphicon-user"></span> Email </label>
          <input type="email" class="form-control" id="username" name="username" required>
        </div>

        <div class="form-group">
          <label for="password"><span class="glyphicon glyphicon-user"></span> Password </label>
          <input type="text" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
          <label for="total"><span class="glyphicon glyphicon-shopping-cart"></span> Total </label>
          <input type="text" class="form-control" id="total" name="total" value="<?php echo number_format($total,0,',','.'); ?>" readonly>
        </div>

        <h4><?php echo $this->session->flashdata('harga'); ?></h4>
        
        <a href="<?php echo site_url('pembelian/delete/semua'); ?>" class="btn btn-warning">Cancel</a>


        <input type="hidden" name="total" value="<?php echo $total ?>">
        <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
        <input type="submit" value="Bayar" class="btn btn-primary">
        <?php echo form_close(); ?>
        <br>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
