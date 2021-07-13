<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel = "icon" href ="<?=base_url('assets/img/hand-holding-usd-solid.svg')?>" type = "image/svg+xml" style="fill:white;">
    <title>E-Finance | Register</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  </head>
  <body style="background-color: #3498db;">
    <div class="container">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block" style="background-image: url('<?=base_url("assets/img/register.png");?>'); background-size: cover; background-position: center;"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <?php if($this->session->flashdata('error')!=null): ?>
                  <div class="alert alert-warning"> <?= $this->session->flashdata('error');?></div>
                <?php endif ?>
                <form class="user" action="<?=base_url('h/prosesRegister')?>" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="nama">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-user" placeholder="Nomer HP" name="nohp">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" placeholder="Username" name="user">
                    </div>
                    <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" placeholder="Password" name="pass">
                    </div>
                  </div>
                  <input name="submit" type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?=base_url('h/login')?>">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>
  </body>
</html>