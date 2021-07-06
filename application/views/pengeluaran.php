<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-xl-12 col-lg-12 col-md-12">
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary" style="float:left;">DATA PENGELUARAN</h5>
                    <button type="button" class="btn btn-success" style=" float: right;" data-toggle="modal" data-target="#myModalTambah">
                    <i class="fa fa-plus"> Pengeluaran</i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID Pengeluaran</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal"></a>
                                    </td>
                                </tr>
                                <!-- Modal Edit Mahasiswa-->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Data Pengeluaran</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="proses-edit-pemasukan.php" method="get">
                                                    <input type="hidden" name="id_pemasukan" value="">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="date" name="tgl_pemasukan" class="form-control" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input type="text" name="jumlah" class="form-control" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control" value="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                        <a href="#" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div id="myModalTambah" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- konten modal-->
                                        <div class="modal-content">
                                            <!-- heading modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Pengeluaran</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- body modal -->
                                            <form action="tambah-pendapatan.php" method="get">
                                                <div class="modal-body">
                                                    Tanggal :
                                                    <input type="date" class="form-control" name="tgl_pemasukan"> Jumlah :
                                                    <input type="number" class="form-control" name="jumlah"> Keterangan :
                                                    <input type="text" class="form-control" name="keterangan">
                                                </div>
                                                <!-- footer modal -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>