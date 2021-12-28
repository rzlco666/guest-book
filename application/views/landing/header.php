<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buku Tamu &mdash; ITS PKU Muhammadiyah Surakarta.</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/owl.carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/owl.carousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/aos/css/aos.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/jquery-flipster/css/jquery.flipster.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon-itspku.png" />
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="mobile-menu-overlay"></div>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/'); ?>"><img src="<?= base_url('assets/'); ?>images/logo_web.png" alt="ITS PKU"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="mdi mdi-menu"> </i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="d-lg-none d-flex justify-content-between px-4 py-3 align-items-center">
                    <img src="<?= base_url('assets/'); ?>images/logo-dark.svg" class="logo-mobile-menu" alt="logo">
                    <a href="javascript:;" class="close-menu"><i class="mdi mdi-close"></i></a>
                </div>
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item active">
                        <?php if ($title == 'Tracer') {
                        ?>
                            <a class="nav-link" href="<?= base_url('Welcome/'); ?>#home">Home <span class="sr-only">(current)</span></a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item mr-0">
                        <a class="nav-link" href="#tamu">Buku Tamu</a>
                    </li>
                    <li class="nav-item ml-0">
                        <a class="nav-link" target="_blank" href="https://pmb.itspku.ac.id/">Info PMB</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>