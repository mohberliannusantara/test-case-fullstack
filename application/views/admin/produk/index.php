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
            <a href="<?php echo base_url('admin/produk/create/')?>" rel="tooltip" title="Tambah" class="btn btn-primary">
              <i class="material-icons">add</i>
              Tambah Produk
            </a>
            <div class="table-responsive">
              <table id="myTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead class=" text-success">
                  <th>#</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Keterangan</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php foreach ($produk as $key => $value): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo number_format($value->harga,0,',','.'); ?></td>
                      <td><?php echo substr($value->deskripsi,0 , 70); ?></td>
                      <td><img src="<?php echo base_url('assets/uploads/') . $value->gambar ?>" alt="" style="width:200px;"></td>
                      <td class="text-center">
                        <a href="<?php echo base_url('admin/produk/edit/') . $value->id ?>"
                          rel="tooltip" title="Ubah" class="btn btn-sm btn-warning">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="<?php echo base_url('admin/produk/delete/') . $value->id ?>"
                          rel="tooltip" title="Hapus" class="btn btn-sm btn-danger">
                          <i class="material-icons">close</i>
                        </a>
                      </td>
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
