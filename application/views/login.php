<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V18</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url() ?>assets_temp/login/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url() ?>assets_temp/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets_temp/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title p-b-43">
                        Login
                    </span>

                    <?= $this->session->flashdata('msg'); ?>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input class="input100" type="text" name="username" value="<?= set_value('username'); ?>">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Username</span>
                    </div>
                    <?= form_error('username', '<small class="text-danger element-left pl-3">', '</small><br>'); ?>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    <?= form_error('password', '<small class="text-danger element-left pl-3">', '</small><br>'); ?>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>

                <div class="login100-more"
                    style="background-image: url('<?= base_url() ?>assets_temp/login/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>assets_temp/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>assets_temp/login/vendor/daterangepicker/daterangepicker.js"></script>
    <!-
-===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets_temp/login/js/main.js"></script>

</body>

</html>