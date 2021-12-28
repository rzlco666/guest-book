		<div class="page-body-wrapper">
			<section id="home" class="home">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="main-banner">
								<div class="d-sm-flex justify-content-between">
									<div data-aos="zoom-in-up">
										<div class="banner-title">
											<h3 class="font-weight-medium">Selamat datang di
												ITS PKU Muhammadiyah Surakarta
											</h3>
										</div>
										<p class="mt-3"><b>#SudahSaatnya</b> menjadi bagian dari ITS PKU Muhammadiyah Surakarta. <br>Daftarkan sekarang juga untuk bergabung bersama kami.
										</p>
										<a href="https://itspku.ac.id/" target="_blank" class="btn btn-secondary mt-3">Selengkapnya</a>
									</div>
									<div class="mt-5 mt-lg-0">
										<img width="600" src="<?= base_url('assets/'); ?>images/background.png" alt="ITS PKU" class="img-fluid" data-aos="zoom-in-up">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="contactus" id="tamu">
				<div class="container">
					<div class="row mb-5 pb-5">
						<div class="col" data-aos="fade-up" data-aos-offset="-500">
							<h3 class="font-weight-medium text-dark mt-5 mt-lg-0">Buku Tamu</h3>
							<h5 class="text-dark mb-5">Silahkan mengisi buku tamu</h5>
							<p class="mb-4">
								<font color="green"><?php echo $this->session->flashdata('pesan_tamu'); ?></font>
							</p>
							<?php echo form_open('Welcome/tamu_proses', ''); ?>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<select name="id_kategori" class="form-control">
											<option disabled="disabled" selected>Pilih kategori keperluan</option>
											<?php foreach ($kategori as $jenis) { ?>
												<option value="<?php echo $jenis['id_kategori'] ?>"><?php echo $jenis['nama'] ?></option>
											<?php } ?>
										</select>
										<?php echo form_error('alamat', '<div class="text-danger"><small>', '</small></div>'); ?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
										<?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>'); ?>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="No HP/WhatsApp">
										<?php echo form_error('no_hp', '<div class="text-danger"><small>', '</small></div>'); ?>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat/Institusi">
										<?php echo form_error('alamat', '<div class="text-danger"><small>', '</small></div>'); ?>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<textarea name="keperluan" id="keperluan" class="form-control" placeholder="Keperluan" rows="5"></textarea>
										<?php echo form_error('keperluan', '<div class="text-danger"><small>', '</small></div>'); ?>
									</div>
								</div>
								<div class="col-sm-12">
									<button class="btn btn-secondary" type="submit">Kirim</button>
								</div>
							</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</section>
			<section class="testimonial" id="testimonial">
				<div class="container">
					<div class="row  mt-md-0 mt-lg-4">
						<div class="col-sm-6 text-white" data-aos="fade-up">
							<p class="font-weight-bold mb-3">Buku Tamu</p>
							<h3 class="font-weight-medium">Daftar tamu hari ini</h3>
							<p class="font-weight-medium"><?php echo format_indo(date('Y-m-d'), now()); ?> </p>
						</div>
						<div class="col-sm-6" data-aos="fade-up">
							<div id="testimonial-flipster">
								<ul>
									<?php $no = 1;
									foreach ($tamu as $datatamu) { ?>
										<li>
											<div class="testimonial-item">
												<h6 class="testimonial-author"><?php echo $datatamu->nama; ?></h6>
												<p class="testimonial-destination"><?php echo $datatamu->alamat; ?></p>
												<p><?php echo $datatamu->keperluan; ?>
												</p>
												<p><?php echo $datatamu->jam; ?>
												</p>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>