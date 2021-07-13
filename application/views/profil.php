<div class="container-fluid">
    <!-- Content Row -->
    <div class="row" style="justify-content: center;">
        <!-- DataTales Example -->
        <div class="col-xl-6 col-lg-12 col-md-12">
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary" style="float:left;">DATA PROFIL</h5>
                </div>
                <?php if($this->session->flashdata('pesan')!=null): ?>
                    <div class="alert alert-info"> <?= $this->session->flashdata('pesan');?></div>
                <?php endif ?>
                <?php if($this->session->flashdata('error')!=null): ?>
                    <div class="alert alert-warning"> <?= $this->session->flashdata('error');?></div>
                <?php endif ?>
                <div class="card-body">
                   <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <form class="user" action="<?=base_url('h/update_profile');?>" method="post">
                                    <div class="form-group d-flex justify-content-center">
                                        <img class="img-profile rounded-circle" src="<?=base_url();?>assets/img/user.png" style="width: 150px;">
                                        <br/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama:</label>
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Full Name" value="<?=$user->nama;?>" require>
                                    </div>
                                     <div class="form-group">
                                        <label>No. HP:</label>
                                        <input type="number" class="form-control form-control-user" name="nohp" value="<?=$user->noHP;?>">
                                    </div>
                                     <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control form-control-user" name="email" value="<?=$user->email;?>" require>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?=$user->id_user;?>">
                                        <label>Username:</label>
                                        <input type="text" class="form-control form-control-user" value="<?=$user->username; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" class="form-control form-control-user" name="pass" value="<?=$user->pass; ?>" require >
                                    </div>
                                    <hr>
                                    <input type="submit" class="btn btn-success btn-icon-split" name="submit" value="Update" style="padding: 5px; float: right;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>