<!DOCTYPE html>
<html lang="en">

<head>
	<title>DevDesk - Bootstrap Knowledge Base &amp; Help Centre Template For Tech Products</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Bootstrap Knowledge Base and Help Centre Template">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500&display=swap"
		rel="stylesheet">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

	<!-- FontAwesome JS-->
	<script defer src=<?= base_url("assets/fontawesome/js/all.min.js")?>></script>

	<!-- Plugin CSS -->
	<link rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark-reasonable.min.css">

	<!-- Theme CSS -->
	<link id="theme-style" rel="stylesheet" href=<?= base_url("assets/css/devdesk.css")?>>

</head>

<body>
	<div class="page-header-wrapper">
		<div class="page-header-bg-pattern-holder">
			<div class="bg-pattern-top"></div>
			<div class="bg-pattern-bottom"></div>
		</div>
		<!--//page-header-bg-pattern-holder-->

		<header class="header">
			<div class="container">
				<nav class="navbar navbar-expand-lg">
					<div class="site-logo me-3">
						<a class="navbar-brand" href=<?= base_url('home')?>>
							<img class="logo-icon" src=<?= base_url("assets/images/site-logo.svg")?> alt="logo">
						</a>
					</div>
					<!--//site-logo-->


					<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
						data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
						aria-label="Toggle navigation">
						<span> </span>
						<span> </span>
						<span> </span>
					</button>

					<div class="collapse navbar-collapse ms-auto" id="navigation">

						<ul class="navbar-nav ms-auto align-items-lg-center">
							<li class="nav-item me-lg-4">
								<a class="nav-link" href=<?= base_url('home')?>>Home</a>
							</li>
							<li class="nav-item dropdown me-lg-4">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
									aria-expanded="false">Categories</a>
								<ul class="dropdown-menu dropdown-menu-lg-end rounded shadow">
									<li><a class="dropdown-item" href="help-category.html">Get Started</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Product Guide</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Integrations</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Collaboration</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Billing &amp;
											Subscription</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Developers &amp; APIs</a>
									</li>
									<li><a class="dropdown-item" href="help-category-alt.html">Support &amp;
											Troubleshooting</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Best Practices</a></li>
									<li><a class="dropdown-item" href="help-category-alt.html">Resources</a></li>
								</ul>
							</li>
							<li class="nav-item dropdown pt-3 pt-lg-0">
								<?php if (session()->get('username')): ?>
								<a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button"
									data-bs-toggle="dropdown" aria-expanded="false">
									<img src="/uploads/profil/<?= session()->get('foto') ?>" alt="Foto Profil"
										class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
								</a>
								<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="/user/profil">Profil</a></li>
									<li><a class="dropdown-item" href="/auth/keluar">Keluar</a></li>
								</ul>
								<?php else: ?>
								<a class="nav-btn btn btn-primary text-white" href="/auth/masuk">Masuk</a>
								<?php endif; ?>
							</li>


						</ul>
						<!--//navbar-nav-->

					</div>
				</nav>
			</div>
			<!--//container-->

		</header>
		<!--//header-->
	</div>
	<!--//page-header-wrapper-->

	<div class="help-breadcrumb-container pt-4">
		<div class="container">
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Detail Lowongan</li>
				</ol>
			</nav>
		</div>
		<!--//container-->
	</div>
	<!--//help-breadcrumb-container-->

	<div class="help-content-wrapper theme-section pt-4">
		<div class="container">
			<section class="related-articles-section theme-section rounded-4 shadow px-4 p-lg-5">
				<?php if (session()->getFlashdata('success')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= session()->getFlashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<?php endif; ?>

				<?php if (session()->getFlashdata('error')): ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= session()->getFlashdata('error'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				<?php endif; ?>

				<h2 class="section-title mb-5">Detail Lowongan</h2>
				<div class="related-items row">
					<!-- Bagian Poster dan Detail -->
					<div class="item d-flex col-12 flex-column flex-lg-row mb-4">
						<!-- Gambar Poster -->
						<div class="me-lg-4 mb-4 mb-lg-0 d-flex flex-column align-items-center">
							<img src="<?= base_url('uploads/poster/' . $lowongan['poster']) ?>"
								alt="Poster Lowongan" class="img-fluid rounded-4 shadow" style="max-width: 300px;">
							<!-- Tambahan: Informasi Perusahaan atau Badge -->
							<div class="text-center mt-3">
								<p class="mb-1"><strong><?= $lowongan['nama_perusahaan']?></strong></p>
								<p class="small text-muted"><?= $lowongan['deskripsi_perusahaan']?></p>
								<div class="badge bg-primary text-white py-2 px-3 mt-2">
									<?= $lowongan['tipe_pekerjaan']?></div>
							</div>
						</div>

						<!-- Logo Perusahaan dan Detail Lowongan -->
						<div class="item-content">
							<h3 class="item-title"><?= $lowongan['judul']?></h3>
							<div class="d-flex align-items-center mb-3">
								<div class="me-3">
									<!-- Gambar Logo Perusahaan dengan border-radius untuk membulat -->
									<img src="https://png.pngtree.com/png-clipart/20220919/original/pngtree-letter-s-and-n-company-logo-png-image_8624357.png"
										alt="Logo Perusahaan" class="img-fluid"
										style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; margin-top: -25px;">
								</div>
								<div>
									<p class="item-excerpt">
										<strong>Perusahaan:</strong> <?= $lowongan['nama_perusahaan']?><br>
										<strong>Lokasi:</strong> <?= $lowongan['alamat']?><br>
										<strong>Gaji:</strong> Rp.
										<?= number_format($lowongan['gaji'], 0, ',', '.') ?><br>
										<strong>Tanggal Posting:</strong>
										<?= date('d F Y', strtotime($lowongan['tanggal_dipasang'])) ?><br>
										<strong>Tanggal Berakhir:</strong>
										<?= date('d F Y', strtotime($lowongan['tanggal_berakhir'])) ?><br>
										<strong>Batas Lamaran:</strong> <?= $lowongan['batas_lamaran']?>
									</p>
								</div>
							</div>
							<!-- Kualifikasi -->
							<h4 class="item-title">Kualifikasi:</h4>
							<ul class="item-excerpt">
								<p><?= $lowongan['kualifikasi']?></p>
							</ul>
							<!-- Deskripsi Pekerjaan -->
							<h4 class="item-title">Deskripsi Pekerjaan:</h4>
							<ul class="item-excerpt">
								<p><?= $lowongan['deskripsi']?></p>
							</ul>
							<!-- Tombol -->
							<?php if (session()->get('username')): ?>
							<div class="mt-4">
								<a href="#" class="btn btn-primary text-white me-2" data-bs-toggle="modal"
									data-bs-target="#lamar">Lamar Sekarang</a>
							</div>
							<?php else: ?>
							<div class="mt-4">
								<a href="/auth/daftar" class="btn btn-primary text-white me-2">Daftar Akun</a>
								<p style="font-size: 14px;"><i>*Harap daftar akun untuk melanjutkan.</i></p>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>

			<!--//related-articles-->

		</div>
		<!--//container-->
	</div>
	<!--//help-content-wrapper-->

	<!-- Modal Tambah -->
	<div class="modal fade" id="lamar" tabindex="-1" aria-labelledby="modalLamarLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTambahLabel">Lamaran Kerja</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url('Home/lamarLowongan'); ?>" enctype="multipart/form-data">
						<input type="hidden" class="form-control" value="<?= $lowongan['id']?>" id="id_lowongan"
							name="id_lowongan" required>
						<div class="form-floating mb-3">
							<input type="file" class="form-control" id="surat_lamaran" name="surat_lamaran" required>
							<label for="surat_lamaran">Surat Lamaran </label>
						</div>
						<div class="form-floating mb-3">
							<input type="file" class="form-control" id="cv" name="cv" required>
							<label for="cv">CV</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
							<label for="pendidikan">Pendidikan Terakhir</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="keahlian" name="keahlian" required>
							<label for="keahlian">Keahlian</label>
						</div>
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja"
								required>
							<label for="pengalaman_kerja">Pengalaman Kerja</label>
						</div>
						<p style="font-size: 14px; color:#DE5547;"><i>*Harap upload file PDF / DOC / DOCX, max 2MB</i>
						</p>

						<div class="d-flex justify-content-around">
							<button type="submit" class="btn btn-primary rounded-pill w-65 mt-4">Lamar Sekarang</button>
							<button type="button" class="btn btn-secondary rounded-pill w-25 mt-4"
								data-bs-dismiss="modal">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer py-3">
		<div class="container text-center">
			<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
			<small class="copyright">Designed with <span class="sr-only">love</span><i class="bi bi-heart-fill"
					style="color:#DE5547"></i> by <a class="theme-link" href="http://themes.3rdwavemedia.com"
					target="_blank">Xiaoying Riley</a> for developers</small>

		</div>
		<!--//container-->
	</footer>
	<!--//footer-->

	<!-- Javascript -->
	<script src=<?= base_url("assets/plugins/popper.min.js")?>></script>
	<script src=<?= base_url("assets/plugins/bootstrap/js/bootstrap.min.js")?>></script>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Page Specific JS -->
	<script src=<?= base_url("assets/plugins/stickyfill/dist/stickyfill.min.js")?>></script>
	<script src=<?= base_url("assets/js/sticky-custom.js")?>></script>
	<script src=<?= base_url("https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js")?>></script>
	<script src=<?= base_url("assets/js/highlightjs-custom.js")?>></script>



</body>

</html>