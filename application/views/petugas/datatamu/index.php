<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Data Buku Tamu</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('petugas/'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data Buku Tamu</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title-desc">
                                    <!-- <a href="javascript:;" onclick="tambah()" class="btn btn-primary">Tambah Data</a> -->
                                </div>

                                <table id="example" id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Alamat/Institusi</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;
                                    foreach ($tamu as $datatamu) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++;?></td>
                                            <td><?php echo $datatamu->nama;?></td>
                                            <td><?php echo $datatamu->no_hp;?></td>
                                            <td><?php echo $datatamu->alamat;?></td>
                                            <td><?php echo $datatamu->keperluan;?></td>
                                            <td><?php echo $datatamu->tanggal;?></td>
                                            <td><?php echo $datatamu->jam;?></td>
                                            <td><a href="<?php echo base_url();?>datatamu/hapusdata/<?php echo $datatamu->id_tamu;?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->