<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-xl-12 col-lg-12 col-md-12">
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary" style="float:left;">DATA USER</h5>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. HP</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Tipe</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($user as $cek){
                                ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$cek->nama;?></td>
                                    <td><?=$cek->email;?></td>
                                    <td><?=$cek->noHP;?></td>
                                    <td><?=$cek->username;?></td>
                                    <td><?=$cek->pass;?></td>
                                    <td><?=$cek->type;?></td>
                                    <td>
                                        <!-- Button untuk modal -->
                                        <a href="#" type="button" class=" fa fa-edit btn btn-primary btn-md" data-toggle="modal" data-target="#myModal<?=$cek->id_user?>"></a>
                                    </td>
                                </tr>
                                <!-- Modal Edit-->
                                <div class="modal fade" id="myModal<?=$cek->id_user?>" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Data Pemasukan</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="<?=base_url('h/update_user');?>" method="post">
                                                    <input type="hidden" name="id" value="<?=$cek->id_user?>">
                                                    <div class="form-group">
                                                        <label>Nama:</label>
                                                        <input type="text" name="nama" class="form-control" value="<?=$cek->nama?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input type="email" name="email" class="form-control" value="<?=$cek->email?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No. HP:</label>
                                                        <input type="text" name="nohp" class="form-control" value="<?=$cek->noHP?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username:</label>
                                                        <input type="text" class="form-control" value="<?=$cek->username?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password:</label>
                                                        <input type="text" name="pass" class="form-control" value="<?=$cek->pass?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipe:</label>
                                                        <select class="form-control" name="tipe" require>
                                                            <option value="User" <?php if(($cek->type) == 'User'){ echo "selected";}?>>User</option>
                                                            <option value="Admin" <?php if(($cek->type) == 'Admin'){ echo "selected";}?>>Admin</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Ubah</button>
                                                        <a href="<?=base_url('h/hapusUser/'.$cek->id_user);?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>