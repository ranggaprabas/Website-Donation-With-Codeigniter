
<!--================ Home Banner Area =================-->
<section class="home_banner_area" id="home">
	<div class="overlay"></div>
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content row">
				<div class="offset-lg-2 col-lg-8">
					<img class="img-fluid mb-3" src="<?php echo base_url()?>/template/front/img/banner/donasi.png" alt="">
					<p>Yuk, jadikan dirimu sebagai relawan bencana banjir dengan cara berdonasi, yang mana hasil donasi tersebut akan digunakan untuk membeli sembako dan makanan siap saji yang akan langsung dibagikan kepada para korban bencana banjir.</p>
					<a class="main_btn mr-10" href="#donate">Laporkan Donasi</a>
					<a class="white_bg_btn" href="#report">Lihat Laporan</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ Start important-points section =================-->
<section class="donation_details pad_top mb-5" id="overview">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Total Donasi</h1>
					<p>
						Total Donasi yang telah dikumpulkan
					</p>
				</div>
			</div>

			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-3 col-md-6 single_donation_box">
					<i class="fa fa-sign-in ikon"></i><br>
					Donasi Masuk
					<h4 class="mb-0 mt-3"> <?php echo "Rp. " . number_format($jumlahuangperbank->jumlahUang,2,',','.'); ?></h4>
				</div>

				<div class="col-lg-3 col-md-6 single_donation_box">
					<i class="fa fa-sign-out ikon"></i>
					<br>Donasi Keluar
					<h4 class="mb-0 mt-3"> <?php echo "Rp. " . number_format($jumlahuangkeluar->jumlahuang,2,',','.'); ?></h4>
				</div>

				<div class="col-lg-3 col-md-6 single_donation_box">
					<i class="fa fa-gratipay ikon"></i>
					<br>Jumlah Total
					<h4 class="mb-0 mt-3"> <?php echo "Rp. " . number_format($jumlahuangperbank->jumlahUang-$jumlahuangkeluar->jumlahuang,2,',','.'); ?></h4>
				</div>


			</div>
		</div>
	</section>
	<!--================ End important-points section =================-->


<!--================ Start Make Donation Area =================-->
<section class="make_donation section_gap" id="donate">
	<div class="container">
		<div class="row justify-content-start section-title-wrap">
			<div class="col-lg-12">
				<h1>Laporkan Donasi Anda Hari Ini</h1>
				<p>

					Laporkan donasi anda agar dapat menjaga akuntabilitas donasi
				</p>
			</div>
		</div>

		<div class="donate_now_wrapper">

			<form action="<?php echo base_url('senddonasi'); ?>" method='post' enctype="multipart/form-data">


				<div class="row">
				    <div class="col-lg-6 mb-4">
				        				<?php if($this->session->flashdata('alert')){ ?> 
					<div class="col-md-12"> 
						<div class="alert alert-danger alert-dismissible " role="alert">
							<strong>Gagal</strong> <?php echo $this->session->flashdata('alert'); ?>
						</div>
					</div>
				<?php } ?>

				<?php if($this->session->flashdata('sukses')){ ?>  
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible " role="alert">
							<strong>Berhasil</strong> <?php echo $this->session->flashdata('sukses'); ?>
						</div>
					</div>
				<?php } ?>



				<div class="col-lg-12 mb-4">
					<div class="form-group">
						<label>Bank Transfer</label>
						<select name="bank" class="single-input" required>
							<option value="">Pilih Bank</option>
							<?php $no=1; foreach($bank->result() as $key) : ?>
							<option value="<?php echo $key->idBank; ?>"><?php echo $key->bank." - ".$key->norek." (a.n ".$key->nama.")"?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div class="col-lg-12 mb-4" style="margin-top:60px;">
				<div class="donate_box">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" placeholder="Nama" oninvalid="invalidMsg(this)" oninput="invalidMsg(this)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" class="single-input" name="nama" required>
					</div>
				</div>
			</div>

			<div class="col-lg-12 mb-4">
				<div class="donate_box">
					<div class="form-group">
						<label>Email</label>
						<input type="text" placeholder="E-Mail" oninvalid="invalidMsg(this)" oninput="invalidMsg(this)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-Mail'" class="single-input" name="email" required>
					</div>
				</div>
			</div>

			<div class="col-lg-12 mb-4">
				<div class="donate_box">
					<div class="form-group">
						<label>Jumlah(Rp)</label>
						<input type="text" placeholder="Jumlah" oninvalid="invalidMsg(this)" oninput="invalidMsg(this)" onkeypress="return hanyaAngka(event)" onfocus="this.placeholder = '' " onblur="this.placeholder = 'Jumlah' " class="single-input" name="jumlah" required>
					</div>
				</div>
			</div>

			<script>
				function hanyaAngka(evt) {
					var charCode = (evt.which) ? evt.which : event.keyCode
					if (charCode > 31 && (charCode < 48 || charCode > 57))

						return false;
					return true;
				}
			</script>

			<div class="col-lg-12 mb-4">
				<div class="donate_box">
					<div class="form-group">
						<label>Bukti Transfer</label>
						<input type="file" name="bukti_transfer" id="bukti_transfer" accept="image/png,image/gif,image/jpeg,image/jpg" hidden>
						<input type="text" name="tempfile" placeholder="Bukti Transfer (Boleh Kosong)" class="single-input" id="buktitransfer">
					</div>
				</div>
			</div>


			<div class="col-lg-12 mb-4">
				<div class="donate_box">
					<div class="switch-wrap d-flex justify-content-start bd-highlight">
						<div class="confirm-switch">
							<input type="checkbox" name="anonim" value="anonim" class="form-control" id="confirm-switch">
							<label for="confirm-switch"></label>
						</div>
						<p class="ml-3">Sembunyikan nama anda</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-12 mb-4">
				<div class="donate_box">
					<button type="submit" class="main_btn w-100">Laporkan Donasi</button>
				</div>
			</div>
				    </div>

					<div class="col-lg-6 mb-4">
						<h4>Nomor Rekening</h4>
						<div class="table table-responsive">
							<table class="table table-bordered">
								<thead>
									<th>No.</th>
									<th>Nama Bank</th>
									<th>Atas Nama</th>
									<th>Nomor Rekening</th>
								</thead>
								<tbody>
									<?php $no=1; foreach($bank->result() as $key) : ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $key->bank; ?></td>
										<td><?php echo $key->nama; ?></td>
										<td><?php echo $key->norek; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>

						</table>
					</div>   
				</div>
		</div>
	</form>
</div>
</div>
</section>
<!--================ End Make Donation Area =================-->



<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap" id="report">
	<div class="container">
		<div class="row justify-content-center section-title-wrap">
			<div class="col-lg-12">
				<h1>Laporan Donasi</h1>
				<p>
					Untuk transparansi kegiatan donasi, catatan setiap donasi dapat dilihat pada tabel di bawah ini.
				</p>
			</div>
		</div>

		<div class="row">
			<div class="table d-flex justify-content-center">
				<table width="100%" class="table-bordered table-striped text-center" id="tabel">
					<thead>
						<tr>
							<td>No</td>
							<td>Nama</td>
							<td>Jumlah</td>
							<td>Tanggal</td>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($donasi->result() as $key) : ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $key->namaPublish; ?></td>
							<td><?php echo "Rp " . number_format($key->jumlah,2,',','.'); ?></td>
							<td><?php echo date('d F Y', strtotime($key->tanggal)); ?></td>
						</tr>

					<?php endforeach; ?>

				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>
	</div>
</div>
</section>
<!--================ Ens Our Major Cause section =================-->

<!--================ Start important-points section =================-->
<section class="donation_details pad_top" id="penyaluran" style="background-color: #424874;color: #fff;padding-bottom: 100px;">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1 class="text-white">Penyaluran Donasi</h1>
					<p>
						Total Donasi yang telah disalurkan
					</p>
				</div>
			</div>

			<div class="row">
			<div class="col-lg-12">
			    	<div class="table-responsive" style="padding-left:30px;">
				<table width="100%" class="table-bordered table-striped text-center" id="tabel2">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Penyaluran</th>
							<th>Jumlah</th>
							<th>Ket.</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($penyaluran->result() as $key) : ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo date('d F Y', strtotime($key->tanggal)); ?></td>
							<td><?php echo $key->judul; ?></td>
							<td><?php echo "Rp " . number_format($key->jumlah,2,',','.'); ?></td>
							<td><?php echo $key->ket; ?></td>
						</tr>

					<?php endforeach; ?>

				</tbody>
				<tfoot>

				</tfoot>
			</table>
		</div>
			</div>
		
	</div>
		</div>
	</section>
	<!--================ End important-points section =================-->

<!--================ Start Footer Area  =================-->
<footer class="footer-area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-5  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6 class="footer_title">About US</h6>
					<p>
						<?php echo $tentang->isi; ?>
					</p>
				</div>
			</div>
			<div class="col-lg-5 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6 class="footer_title">Newsletter</h6>
					<p>Stay updated with our latest trends</p>
					<div id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
						method="get" class="subscribe_form relative">
						<div class="input-group d-flex flex-row">
							<input name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
							required="" type="email">
							<button class="btn sub-btn">
								<span class="lnr lnr-arrow-right"></span>
							</button>
						</div>
						<div class="mt-10 info"></div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6">
			<div class="single-footer-widget f_social_wd">
				<h6 class="footer_title">Follow Us</h6>
				<p>Let us be social</p>
				<div class="f_social">
					<a href="#">
						<i class="fa fa-facebook"></i>
					</a>
					<a href="#">
						<i class="fa fa-twitter"></i>
					</a>
					<a href="#">
						<i class="fa fa-dribbble"></i>
					</a>
					<a href="#">
						<i class="fa fa-behance"></i>
					</a>
				</div>
			</div>
		</div>
	</div>

