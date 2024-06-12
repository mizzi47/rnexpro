<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$host = "localhost";
$dbname = "wallmaster";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

// return $mysqli;

$sql = "SELECT * FROM user
        WHERE reset_token = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

// if ($user === null) {
//     die("token not found");
// }

// if (strtotime($user["reset_token_expires_at"]) <= time()) {
//     die("token has expired");
// }


// $reset = isset($_GET['reset']) ? $_GET['reset'] : '';
// $error = isset($_GET['error']) ? $_GET['error'] : '';
// $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
// $token = isset($_GET['token']) ? htmlspecialchars($_GET['token']) : '';
?>

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
        .login {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('<?= base_url() ?>assets/img/gambar2.png');
            background-size: cover;
        }

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
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <img src="<?= base_url() ?>assets/img/2.jpg" style="width:450px; padding:30px;">
                                <!-- <h3 class="login-heading mb-4">RnexPro</h3> -->

                                <!-- Sign In Form -->

                                <form action="<?php echo base_url('welcome/processreset'); ?>" method="POST">
                                <input type="hidden" name="email" value="<?= $email ?>">
                                <input type="hidden" name="token" value="<?= $token ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>New Password :</label>
                <input type="password" name="password" class="form-control" id="password" >
                <input type="checkbox" onclick="myFunction()">Show Password
            </div>
        </div>
    </div>
    <!-- Optionally, include a password confirmation field -->
    <!-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Confirm New Password :</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
            </div>
        </div>
    </div> -->
    <div class="d-grid">
        <button type="submit" class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2">Reset Password</button>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        function getQueryParam(param) {
            let searchParams = new URLSearchParams(window.location.search);
            return searchParams.get(param);
        }

        document.addEventListener('DOMContentLoaded', function() {
            let reset = getQueryParam('reset');
            let error = getQueryParam('error');

            if (reset === 'success') {
                toastr.success("Your password has been reset successfully.");
            } else if (error) {
                switch (error) {
                    case 'update_failed':
                        toastr.error("Password reset failed. Please try again.");
                        break;
                    case 'invalid_token':
                        toastr.error("Invalid or expired token.");
                        break;
                    case 'token_expired':
                        toastr.error("Your reset token has expired.");
                        break;
                    case 'invalid_request':
                        toastr.error("Invalid request method.");
                        break;
                    default:
                        toastr.error("An unknown error occurred.");
                        break;
                }
            }
        });
    </script>
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

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction1() {
  var x = document.getElementById("pass1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>