<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Petugas &mdash; <?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon-itspku.png">

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets_petugas/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets_petugas/'); ?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets_petugas/'); ?>css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary bg-pattern">
    <div class="home-btn d-none d-sm-block">
        <a href="<?= base_url('/'); ?>"><i class="mdi mdi-home-variant h2 text-white"></i></a>
    </div>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a href="<?= base_url('/'); ?>" class="logo"><img src="<?= base_url('assets/'); ?>images/logo_web.png" height="44" alt="logo"></a>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Login Petugas</h5>
                                <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
                                <?php echo form_open('petugas/login_proses', ''); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-custom mb-4">
                                            <input type="email" class="form-control" id="email" name="email" required>
                                            <label for="email">Email</label>
                                            <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                                        </div>

                                        <div class="form-group form-group-custom mb-4">
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            <label for="password">Password</label>
                                            <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                                        </div>

                                        <div class="row">
                                            <!-- <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div> -->
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <a href="<?= base_url('petugas/register'); ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets_petugas/'); ?>libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>libs/node-waves/waves.min.js"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <script src="<?= base_url('assets_petugas/'); ?>js/app.js"></script>

</body>

</html>