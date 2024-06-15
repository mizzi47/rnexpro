<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RnexPro</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>RexinProSoft_logo.jpeg">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/img/RexinProSoft_logo_16x16.jpeg">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    

    <style>
          body {
            background-image: url('<?= base_url() ?>assets/img/gambar7.jpg');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .login {
            min-height: 100vh;
        }

        /* .bg-image {
            background-image: url('<?= base_url() ?>assets/img/gambar2.png');
            background-size: cover;
        } */

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url() ?>assets/img/RexinProSoft_logo.jpeg" alt="AdminLTELogo" height="60" width="60">
    </div>

    
    <!-- <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6"> -->
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <!-- <div class="row"> -->
                            <!-- <div class="col-md-9 col-lg-8 mx-auto"> -->
                            <img src="<?= base_url() ?>assets/img/logo1.png" style="width800px; padding-left: 320px; height:200px;">
                                <!-- <img src="<!?= base_url() ?->assets/img/2.jpg" style="width:450px; padding:30px;"> -->
                                <!-- <h3 class="login-heading mb-4">RnexPro</h3> -->
                                <div class="col-md-9 col-lg-6 mx-auto">
                                <!-- Sign In Form -->
                                <form action="<?php echo base_url('welcome/register_user'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">First Name :</font><font color="red">&ensp;*</font></label>
                                                <input type="text" name="first_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Last Name :</font><font color="red">&ensp;*</font></label>
                                                <input type="text" name="last_name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Username :</font><font color="red">&ensp;*</font></label>
                                                <input type="text" name="username" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Password :</font><font color="red">&ensp;*</font></label>
                                                <input type="password" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Email :</font><font color="red">&ensp;*</font></label>
                                                <input type="email" name="email"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Phone Number :</font><font color="red">&ensp;*</font></label>
                                                <input type="text" name="phone"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Company Name :</font><font color="red">&ensp;*</font></label>
                                                <input type="text" name="company_name"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><font color="#BDCOBA">Company Register Number :</font><font color="red">&ensp;*</font></label>
                                                <input type="text" name="company_num"  class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <form action="/action_page.php"> -->
                                        <div class="form-check mb-4">
                                    <input type="checkbox" id="pdpa" name="pdpa" value="" required>   
                                    <label for="i agreed"><font color="#BDCOBA">By signing up,<a href= <?php echo base_url('welcome/pdpa') ?>> I agree to Terms of Use and Privacy Statement.</h8></label><br></a>
                                   </div>

                                    <!-- <div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" value="" id="remember">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Remember Me
                  </label>
                </div> -->

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit" onclick="return confirm('Are you sure to register now?')" name="submit">Register</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>

</html>
<script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('msg-warning')) : ?>
            // document.getElementById('notice').play();
            toastr.warning("<?php echo $this->session->flashdata('msg-warning') ?>", "WARNING");
        <?php endif; ?>
        <?php if ($this->session->flashdata('msg-success')) : ?>
            // document.getElementById('notice').play();
            toastr.warning("<?php echo $this->session->flashdata('msg-warning') ?>", "SUCCESS");
        <?php endif; ?>
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>