<!-- Page Content -->
<div class="container">

  <h2 class="mt-4 mb-3">Daftar Pesanan</h2>

  <div class="row mt-4 mb-3">
    <div class="container"  style="padding-top: 50px">
      <h2 class="mt-3">History Produk Majoo</h2>
      <table class="table table-striped table-bordered data">
        <thead>
          <tr class="text-primary">
            <th>NO</th>
            <th>Tanggal Order</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Konfirmasi</th>
            <th>Detail Order</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $no = 1;
         foreach ($pesanan as $key)
         {
          $total = number_format($key->total,0,',','.'); ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $key->tanggal;?></td>
            <td><?php echo $total;?></td>
            <?php if ($key->status==1) {?>
              <td>Proses</td>
            <?php }
            elseif ($key->status==2) {?>
              <td>Dikirim</td>
            <?php } elseif ($key->status==3) {?>
              <td>Sampai</td>
            <?php }?>
            <?php if ($key->konfirmasi==0) {?>
              <td>Proses</td>
            <?php } elseif ($key->konfirmasi == 1) {?>
              <td><a href="<?php echo base_url('pesanan/confirmation/'.$key->id)?>" class="btn btn-info">Konfirmasi</a></td>
            <?php } elseif ($key->konfirmasi == 2) { ?>
              <td>Selesai</td>
            <?php  } ?>
            <td><a href="<?php echo base_url('pesanan/detail/'.$key->id)?>" class="btn btn-success">Lihat Detail</a></td>

          </tr>
          <?php
          $no++;
        }
        ?>
      </tbody>
    </table>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
