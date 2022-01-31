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
                        <h4 class="page-title mb-1">Data EXPO</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('Petugas/'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data EXPO</li>
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
                                            <th>Asal Sekolah</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1;
                                    foreach ($tamu as $datatamu) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td><?php echo $datatamu->nama; ?></td>
                                            <td><?php echo $datatamu->no_hp; ?></td>
                                            <td><?php echo $datatamu->sekolah; ?></td>
                                            <td><?php echo $datatamu->kategori; ?></td>
                                            <td><?php echo $datatamu->tanggal; ?></td>
                                            <td><?php echo $datatamu->jam; ?></td>
                                            <td><a href="<?php echo base_url(); ?>DataExpo/hapusdata/<?php echo $datatamu->id_expo; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
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