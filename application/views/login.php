<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RnexPro</title>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>RexinProSoft_logo.jpeg">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/RexinProSoft_logo_16x16.jpeg">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  
  <style>
    body {
      background-image: url('assets/img/gambar6.jpg');
      background-size: 100% 100%;
      background-repeat: no-repeat;
    }
    .login {
      min-height: 100vh;
    }

    /* .bg-image {
      background-image: url('assets/img/gambar3.jpg');
      background-size: auto;
    } */

    .login-heading {
      font-weight: 300;
    }

    .btn-login {
      font-size: 0.9rem;
      letter-spacing: 0.05rem;
      padding: 0.75rem 1rem;
      

    

    }


    .typewriter {
    font-family: 'Open Sans', sans-serif;
    font-size: 2.7em;
    letter-spacing: 1px;
    width: 100%;
    height: 100%;
    /* white-space: nowrap; */
    text-align: center; 
    /* overflow: hidden; */
    
    } 

  .project-header {
    display: block;
    padding-bottom: 100px;
  }

  .resin {
    padding-left: 900px;
    
  }


  </style>
</head>

<body>
  <!-- Preloader -->
  
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>assets/img/RexinProSoft_logo.jpeg" alt="AdminLTELogo" height="60" width="60">
  </div>
  <!-- <div class="container-fluid ps-md-0">
    <div class="row g-0"> -->

      <!-- <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div> -->
      <!-- <div class="col-md-8 col-lg-6"> -->
        <!-- <div class="pro-man">
        <h2> PROJECT MANAGEMENT & MONITORING SYSTEM </h2>    --- Create CSS ---
        </div> -->
        <div class="login d-flex align-items-center py-5">
          <div class="container">
           <!-- <div class="grid-container project-header">
              <h1 class="typewriter">Project Management and </h1>
              <h1 class="typewriter"> Monitoring System</h1>
              </div> -->
            <!-- <div class="row"> -->
              <div class="col-md-9 col-lg-4 mx-auto">
                <!-- <h3 class="login-heading mb-4">RnexPro</h3> -->
                <!-- Sign In Form -->
                <form action="<?php echo base_url('welcome/auth'); ?>" method="post" >
                  <div class="form-floating input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-eye"></span>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" value="" id="remember">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember Me
                  </label>
                </div> -->

                  <div class="d-grid">
                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" name="submit">Login</button>
                </form>
                <a class="btn btn-lg btn-secondary btn-login text-uppercase fw-bold mb-2" type="button" href="<?php echo base_url('welcome/register') ?>">Register</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>

</html>
<script>
  $(document).ready(function() {
    <?php if ($this->session->flashdata('msg-success')) : ?>
            toastr.success("<?php echo $this->session->flashdata('msg-success-add') ?>", "SUCCESS");
            document.getElementById('success').play();
        <?php endif; ?>
    <?php if ($this->session->flashdata('msg-warning')) : ?>
      // document.getElementById('notice').play();
      toastr.warning("<?php echo $this->session->flashdata('msg-warning') ?>", "WARNING");
    <?php endif; ?>
  })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>