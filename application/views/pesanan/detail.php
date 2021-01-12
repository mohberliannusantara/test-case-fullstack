<!-- Page Content -->
<div class="container">

  <h2 class="mt-4 mb-3">Daftar Pesanan</h2>

  <div class="row mt-4 mb-3">
    <div class="container"  style="padding-top: 50px">
      <h2 class="mt-3">History Produk Majoo</h2>
      <table class="table table-striped table-bordered data">
        <thead>
          <tr class="text-primary">
            <th>Nomor</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($pesanan as $key => $value): ?>
           <tr>
             <td><?php echo $key+1 ?></td>
             <td><?php echo $value->nama ?></td>
             <td><?php echo $value->qty; ?></td>
             <td><?php echo number_format($value->total,0,',','.'); ?></td>
           </tr>
         <?php endforeach; ?>
      </tbody>
    </table>
    <a class="btn btn-danger" href="javascript:window.history.go(-1);">Kembali</a>
    </div>

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
