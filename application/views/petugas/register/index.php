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
                                <h5 class="mb-5 text-center">Register Petugas</h5>
                                <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
                                <?php echo form_open('petugas/register_proses', ''); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-custom mb-4">
                                            <input type="text" class="form-control" name="nama" id="nama" required>
                                            <label for="nama">Nama Lengkap</label>
                                        </div>
                                        <div class="form-group form-group-custom mb-4">
                                            <input type="text" class="form-control" name="username" id="username" required>
                                            <label for="username">Username</label>
                                            <?php echo form_error('username', '<div class="text-danger"><small>', '</small></div>'); ?>
                                        </div>
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
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="term-conditionCheck">
                                            <label class="custom-control-label font-weight-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Register</button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <a href="<?= base_url('petugas/login'); ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
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