<?php
  $getId = $this->session->userdata('session_id');
?>
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-xl-12 col-lg-12 col-md-12">
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary" style="float:left;">DATA PENDAPATAN</h5>
                    <button type="button" class="btn btn-success" style=" float: right;" data-toggle="modal" data-target="#myModalTambah">
                    <i class="fa fa-plus"></i>
                    </button>
                </div>
                <?php if($this->session->flashdata('pesan')!=null): ?>
                    <div class="alert alert-info"> <?= $this->session->flashdata('pesan');?></div>
                <?php endif ?>
                <?php if($this->session->flashdata('error')!=null): ?>
                    <div class="alert alert-warning"> <?= $this->session->flashdata('error');?></div>
                <?php endif ?>
                <div class="card-body">
                    <div class="table-responsive" >
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah Pendapatan</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($cek as $transaksi){
                                ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=date("d/m/Y", strtotime($transaksi->tgl_pemasukan))?></td>
                                    <td><?=$transaksi->jumlah?></td>
                                    <td><?=$transaksi->keterangan?></td>
                                    <td>
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?=$transaksi->id_pemasukan?>"></a>
                                    </td>
                                </tr>
                                <!-- Modal Edit-->
                                <div class="modal fade" id="myModal<?=$transaksi->id_pemasukan?>" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Data Pemasukan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="<?=base_url('h/update_pendapatan');?>" method="post">
                                                    <input type="hidden" name="id_pemasukan" value="<?=$transaksi->id_pemasukan?>">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="date" name="tgl_pemasukan" class="form-control" value="<?=$transaksi->tgl_pemasukan?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input type="text" name="jumlah" class="form-control" value="<?=$transaksi->jumlah?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" class="form-control" value="<?=$transaksi->keterangan?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                        <a href="<?=base_url('h/hapus_pendapatan/'.$transaksi->id_pemasukan);?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- Modal -->
                                <div id="myModalTambah" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- konten modal-->
                                        <div class="modal-content">
                                            <!-- heading modal -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Pendapatan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- body modal -->
                                            <form action="<?=base_url('h/insert_pendapatan');?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_user" value="<?=$getId?>">
                                                    Tanggal :
                                                    <input type="date" class="form-control" name="tgl_pemasukan"> 
                                                    Jumlah :
                                                    <input type="number" class="form-control" name="jumlah"> 
                                                    Keterangan :
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