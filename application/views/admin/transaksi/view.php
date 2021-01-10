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
                  <th>Nama Produk</th>
                  <th>Jumlah</th>
                  <th>Total Harga</th>
                </thead>
                <tbody>
                  <?php foreach ($penjualan as $key => $value): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo $value->qty ?></td>
                      <td>Rp. <?php echo number_format($value->total,0,',','.'); ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
