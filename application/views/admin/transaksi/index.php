<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">inventory</i>
            </div>
            <h4 class="card-title">Daftar Produk</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="myTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead class=" text-success">
                  <th>#</th>
                  <th>Nama Pembeli</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Konfirmasi</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                  $nomor = 1;
                   foreach ($transaksi as $key => $value): ?>
                    <tr>
                      <td><?php echo $nomor ?></td>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo $value->tanggal ?></td>
                      <td>Rp. <?php echo number_format($value->total,0,',','.'); ?></td>
                      <?php if ($value->status == 1) { ?>
                        <td><a href="<?php echo base_url('admin/transaksi/send/'.$value->id)?>" class="btn btn-info">Kirim</a></td>
                      <?php } elseif ($value->status == 2) { ?>
                        <td>Proses Kirim</td>
                      <?php } elseif ($value->status == 3) { ?>
                        <td>Sampai</td>
                      <?php } ?>

                      <?php if ($value->konfirmasi == 0): ?>
                        <td>Proses</td>
                      <?php elseif ($value->konfirmasi == 1): ?>
                        <td>Menunggu Konfirmasi</td>
                      <?php elseif ($value->konfirmasi == 2): ?>
                        <td>Selesai</td>
                      <?php endif; ?>
                      <td>
                        <a href="<?php echo base_url('admin/transaksi/detail/'.$value->id) ?>" class="btn btn-success">
                          <i class="material-icons">zoom_out_map</i>
                        </a>
                      </td>
                    </tr>
                  <?php $nomor++;
                endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
