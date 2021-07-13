<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="col-xl-12 col-lg-12 col-md-12">
            <br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary" style="float:left;">DATA LAPORAN USER</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive" >
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Judul Laporan</th>
                                    <th>Isi Laporan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($lapor as $cek){
                                ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td><?=$cek->username;?></td>
                                    <td><?=$cek->email;?></td>
                                    <td><?=$cek->judul;?></td>
                                    <td><?=$cek->isi;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>