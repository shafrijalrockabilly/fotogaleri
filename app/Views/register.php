<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebsiteKu</title>
    <link 
    href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>"
    rel="stylesheet" type="text/css">
</head>
<body style="background:url()"  class="#fd7e14">
<div class="col-md-5 m-auto mt-5">
   <div class="card">
   <div class="card-header">
     <h5 class="card-title text-center">Regist here!</h5>
  </div>
  <div class="card-body">
    <?php
    if(session()->getFlashdata('pesan')){
     ?>
     <div class='alert alert-danger'>
      <?= session()->getFlashdata('pesan')?>
    </div>
    <?php
    }
    ?>
   <form method="post"
action="<?= base_url('proses_register') ?>">
<div class="mb-2">
 <label class='form-label'>Username</label>
 <input type='text' name='username'
 class='form-control' required>
</div>
<div class="mb-2">
 <label class='form-label'>Password</label>
 <input type='password' name='password'
 class='form-control' required>
</div>
<div class="mb-2">
 <label class='form-label'>Nama</label>
 <input type='text' name='nama'
 class='form-control' required>
</div>
<div class="mb-2">
 <label class='form-label'>Email</label>
 <input type='text' name='email'
 class='form-control' required>
</div>
<div class="mb-2">
 <label class='form-label'>Alamat</label>
 <input type='text' name='alamat'
 class='form-control' required>
</div>
<div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
<br>
<div class='mb-5'>
 <button type="sumbit"
 class='btn btn-dark'>
Register
 </button>
</div>
<p>Have an account?
    <a href="<?= base_url('login') ?>">
               Login
    </a>
</p>
</form>
  </div>
   </div>  
</div>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    
</body>
</html>
