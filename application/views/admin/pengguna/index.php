<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">person</i>
            </div>
            <h4 class="card-title">Daftar Pengguna</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="myTable" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead class=" text-success">
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                </thead>
                <tbody>
                  <?php foreach ($pengguna as $key => $value): ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $value->nama ?></td>
                      <td><?php echo $value->username ?></td>
                      <td><?php echo $value->telepon ?></td>
                      <td><?php echo $value->alamat ?></td>
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
