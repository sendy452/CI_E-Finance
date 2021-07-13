<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jumlah Transaksi </th>
              <th>Jumlah Total Uang</th>
              <th>Download</th>
            </tr>
          </thead>
          <tfoot>
          </tfoot>
          <tbody>
            <?php
            ?>
            <tr>
              <td>Pemasukan</td>
              <td><?=$query1?></td>
              <td>Rp. <?=number_format($jumlahmasuk,2,',','.');?></td>
              <td>
                <!-- Button untuk modal -->
                <a href="<?=base_url('h/exportPendapatan');?>" type="button" class="btn btn-primary btn-md"><i class="fa fa-download"></i></a>
              </td>
            </tr>
            <tr>
              <td>Pengeluaran</td>
              <td><?=$query2?></td>
              <td>Rp. <?=number_format($jumlahkeluar,2,',','.');?></td>
              <td>
                <!-- Button untuk modal -->
                <a href="<?=base_url('h/exportPengeluaran');?>" type="button" class="btn btn-primary btn-md"><i class="fa fa-download"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->