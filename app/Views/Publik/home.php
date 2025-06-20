<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pusat Karir - Beranda</title>

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
	<script src="https://unpkg.com/feather-icons"></script>

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
							<img class="logo" src=<?= base_url("assets/images/logo.png")?> alt="Logo">
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
								<a class="nav-link" href=<?= base_url('home')?>>Beranda</a>
							</li>
							<li class="nav-item dropdown me-lg-4">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
									aria-expanded="false">Profil</a>
								<ul class="dropdown-menu dropdown-menu-lg-end rounded shadow">
									<li><a class="dropdown-item" href=<?= base_url('home/visi')?>>Visi</a></li>
									<li><a class="dropdown-item" href=<?= base_url('home/misi')?>>Misi</a></li>

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
									<li><a class="dropdown-item" href="/Home/profil">Profil</a></li>
									<li><a class="dropdown-item" href="/Home/riwayatlamaran">Riwayat Lamaran</a></li>
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

		<div class="page-heading-holder">
			<div class="container text-center">
				<h1 class="page-heading mb-3">Selamat Datang di Pusat Karir Unsurya</h1>

				<div class="page-heading-sub single-col-max mx-auto">
					<div class="help-search-intro">
						Silakan ketikkan kata kunci untuk menemukan lowongan.
					</div>
					<div class="help-search-main pt-3 d-block mx-auto">
						<form class="search-form w-100" action="<?= base_url('Home/search') ?>" method="GET">
							<input type="text" placeholder="Masukkan kata kunci.." name="search"
								class="form-control search-input">
							<button type="submit" class="btn search-btn" value="Search">
								<svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1"
									xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="search" transform="translate(-1.000000, 0.000000)" fill="#FFFFFF"
											fill-rule="nonzero">
											<path
												d="M11.7297644,1.56712981 C9.1503137,-0.644294379 5.30290309,-0.496046815 2.90126795,1.90730746 C0.499632815,4.31066174 0.354138355,8.15817744 2.56740774,10.7360451 C4.78067712,13.3139128 8.60590394,13.7523024 11.345,11.742 L11.344,11.742 C11.3733333,11.782 11.406,11.8203333 11.442,11.857 L15.292,15.707 C15.6824653,16.0977414 16.3157585,16.0979653 16.7065,15.7075 C17.0972414,15.3170347 17.0974653,14.6837415 16.707,14.293 L12.857,10.443 C12.8212661,10.40679 12.7828212,10.3733596 12.742,10.343 C14.7503419,7.60346614 14.3092152,3.778554 11.7297644,1.56712981 Z M9.75000002,10.3971144 C8.35769516,11.200962 6.64230484,11.200962 5.24999998,10.3971144 C3.85769513,9.5932668 2.99999998,8.10769519 3,6.50000001 C3.00000004,4.01471867 5.01471865,2.00000008 7.5,2.00000008 C9.98528135,2.00000008 12,4.01471867 12,6.50000001 C12,8.10769519 11.1423049,9.5932668 9.75000002,10.3971144 Z"
												id="Shape"></path>
										</g>
									</g>
								</svg>
							</button>
						</form>
					</div>
					<!--//help-search-main-->
				</div>
			</div>

		</div>
		<!--//page-heading-holder-->
	</div>
	<!--//page-header-wrapper-->

	<section class="help-featured-section theme-section">
		<div class="container">

			<div class="section-header text-center mb-5">
				<h2 class="section-title mb-3">Semua Lowongan Tersedia</h2>
			</div>
			<div class="row align-content-stretch">
				<?php if (!empty($lowongan)) : ?>
				<?php foreach ($lowongan as $tersedia) { ?>
				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4">
						<a class="item-link" href="<?= base_url('home/detaillowongan/'.$tersedia['id']) ?>">
							<!-- Logo dan Nama Perusahaan -->
							<div class="d-flex align-items-center mb-3">
								<img src="<?= base_url('uploads/profil/' . $tersedia['foto']) ?>"
									alt="<?= $tersedia['nama_perusahaan'] ?>" class="me-3 rounded-circle"
									style="margin-top: -15px; width: 50px; height: 50px; object-fit: cover;">
								<span class="item-heading"><?= $tersedia['nama_perusahaan'] ?> -
									<?= $tersedia['judul'] ?></span>
							</div>
							<!-- Deskripsi dan Tanggal -->
							<div class="item-desc mb-3">
								<img src="<?= base_url('uploads/poster/' . $tersedia['poster']) ?>"
									alt="Poster Lowongan" class="img-fluid rounded-4 mb-4"
									style="max-width: 100%; height: auto;">

								<!-- Tanggal Pasang - Berakhir -->
								<div class="mb-1">
									<span class="rate-icon me-2"><i class="fa-solid fa-calendar"></i></span>
									<?= date('d F Y', strtotime($tersedia['tanggal_dipasang'])) ?> -
									<?= date('d F Y', strtotime($tersedia['tanggal_berakhir'])) ?>
								</div>

								<!-- Batas Lamaran (Jumlah Dibutuhkan) -->
								<div>
									<span class="rate-icon me-2"><i class="fa-solid fa-users"></i></span>
									Dibutuhkan: <strong><?= $tersedia['batas_lamaran'] ?> orang</strong>
								</div>
							</div>

							<div class="item-desc">
								<span
									class="badge 
                            <?= $tersedia['tipe_pekerjaan'] == 'Magang' ? 'bg-warning text-dark' : 
                            ($tersedia['tipe_pekerjaan'] == 'Pelatihan' ? 'bg-info text-dark' : 
                            ($tersedia['tipe_pekerjaan'] == 'Penuh Waktu' ? 'bg-success text-white' : 'bg-secondary')) ?> px-3 py-1 rounded-pill">
									<?= $tersedia['tipe_pekerjaan'] ?>
								</span>
							</div>
						</a>
					</div>
				</div>
				<?php } ?>
				<?php else : ?>
				<div class="col-12 text-center py-5">
					<p class="text-muted">Tidak ada data lowongan tersedia saat ini.</p>
				</div>
				<?php endif; ?>


				<!-- Tombol Lihat Semua -->
				<div class="text-end mt-4">
					<a href="<?= base_url('home/semualowongan') ?>"
						class="btn btn-primary rounded-4 d-inline-flex align-items-center gap-2">
						<span>Lihat Semua</span>
						<span class="d-inline-flex align-items-center">
							<i class="fas fa-arrow-right"></i>
						</span>
					</a>
				</div>
			</div>

			<!--//help-featured-articles-section-->
		</div>
		<!--//container-->
	</section>
	<!--//help-featured-section-->

	<section class="help-featured-section">
		<div class="container">

			<div class="section-header text-center mb-5">
				<h2 class="section-title mb-3">Lowongan Magang Tersedia</h2>
			</div>
			<div class="row align-content-stretch">
				<?php if (!empty($lowonganmagang)) : ?>
				<?php foreach ($lowonganmagang as $magang) { ?>
				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4">
						<a class="item-link" href="<?= base_url('home/detaillowongan/'.$magang['id']) ?>">
							<!-- Logo dan Nama Perusahaan -->
							<div class="d-flex align-items-center mb-3">
								<img src="<?= base_url('uploads/profil/' . $magang['foto']) ?>"
									alt="<?= $magang['nama_perusahaan'] ?>" class="me-3 rounded-circle"
									style="margin-top: -15px; width: 50px; height: 50px; object-fit: cover;">
								<span class="item-heading"><?= $magang['nama_perusahaan'] ?> -
									<?= $magang['judul'] ?></span>
							</div>
							<!-- Deskripsi dan Tanggal -->
							<div class="item-desc mb-3">
								<img src="<?= base_url('uploads/poster/' . $magang['poster']) ?>" alt="Poster Lowongan"
									class="img-fluid rounded-4 mb-4" style="max-width: 100%; height: auto;">

								<!-- Tanggal Pasang - Berakhir -->
								<div class="mb-1">
									<span class="rate-icon me-2"><i class="fa-solid fa-calendar"></i></span>
									<?= date('d F Y', strtotime($magang['tanggal_dipasang'])) ?> -
									<?= date('d F Y', strtotime($magang['tanggal_berakhir'])) ?>
								</div>

								<!-- Batas Lamaran (Jumlah Dibutuhkan) -->
								<div>
									<span class="rate-icon me-2"><i class="fa-solid fa-users"></i></span>
									Dibutuhkan: <strong><?= $magang['batas_lamaran'] ?> orang</strong>
								</div>
							</div>
							<div class="item-desc">
								<span
									class="badge 
									<?= $magang['tipe_pekerjaan'] == 'Magang' ? 'bg-warning text-dark' : 
									($magang['tipe_pekerjaan'] == 'Pelatihan' ? 'bg-info text-dark' : 
									($magang['tipe_pekerjaan'] == 'Penuh Waktu' ? 'bg-success text-white' : 'bg-secondary')) ?> px-3 py-1 rounded-pill">
									<?= $magang['tipe_pekerjaan'] ?>
								</span>
							</div>
						</a>
					</div>
				</div>
				<?php } ?>
				<?php else : ?>
				<div class="col-12 text-center py-5">
					<p class="text-muted">Tidak ada data lowongan tersedia saat ini.</p>
				</div>
				<?php endif; ?>

				<!-- Tombol Lihat Semua -->
				<div class="text-end mt-4">
					<a href="<?= base_url('home/lowonganmagang') ?>"
						class="btn btn-primary rounded-4 d-inline-flex align-items-center gap-2">
						<span>Lihat Semua</span>
						<span class="d-inline-flex align-items-center">
							<i class="fas fa-arrow-right"></i>
						</span>
					</a>
				</div>

				<!-- FontAwesome buat icon, kalau belum ada -->
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

			</div>
			<!--//help-featured-articles-section-->
		</div>
		<!--//container-->
	</section>
	<!--//help-featured-section-->

	<section class="help-category-section theme-section">
		<div class="container">
			<div class="section-header text-center mb-5">
				<h2 class="section-title mb-3">Panduan Penggunaan Aplikasi</h2>
			</div>
			<div class="row text-center align-content-stretch justify-content-center">

				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4 p-lg-5">
						<a class="item-link" href="<?= base_url('auth/daftar') ?>">
							<div class="icon-holder mb-4">
								<i data-feather="user-plus" style="width:48px; height:48px; stroke-width:2;"></i>
							</div>
							<h3 class="item-heading">Daftar Akun</h3>
							<div class="item-desc">
								Buat akun baru untuk mulai melamar pekerjaan.
							</div>
							<!-- <div class="item-count">Daftar</div> -->
						</a>
					</div>
				</div>

				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4 p-lg-5">
						<a class="item-link" href="<?= base_url('auth/masuk') ?>">
							<div class="icon-holder mb-4">
								<i data-feather="log-in" style="width:48px; height:48px; stroke-width:2;"></i>
							</div>
							<h3 class="item-heading">Masuk Akun</h3>
							<div class="item-desc">
								Masuk menggunakan email dan password yang sudah terdaftar.
							</div>
							<!-- <div class="item-count">Masuk</div> -->
						</a>
					</div>
				</div>

				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4 p-lg-5">
						<a class="item-link" href="#">
							<div class="icon-holder mb-4">
								<i data-feather="file-text" style="width:48px; height:48px; stroke-width:2;"></i>
							</div>
							<h3 class="item-heading">Siapkan CV & Surat Lamaran</h3>
							<div class="item-desc">
								Upload CV dan surat lamaran yang lengkap dan menarik.
							</div>
							<!-- <div class="item-count">1 artikel</div> -->
						</a>
					</div>
				</div>

				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4 p-lg-5">
						<a class="item-link" href="#">
							<div class="icon-holder mb-4">
								<i data-feather="briefcase" style="width:48px; height:48px; stroke-width:2;"></i>
							</div>
							<h3 class="item-heading">Lamar Lowongan</h3>
							<div class="item-desc">
								Pilih lowongan dan kirim lamaran secara online.
							</div>
							<!-- <div class="item-count">1 artikel</div> -->
						</a>
					</div>
				</div>

				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4 p-lg-5">
						<a class="item-link" href="#">
							<div class="icon-holder mb-4">
								<i data-feather="check-circle" style="width:48px; height:48px; stroke-width:2;"></i>
							</div>
							<h3 class="item-heading">Konfirmasi Perusahaan</h3>
							<div class="item-desc">
								Tunggu perusahaan memproses lamaran kamu.
							</div>
							<!-- <div class="item-count">1 artikel</div> -->
						</a>
					</div>
				</div>

				<div class="item col-12 col-md-6 col-lg-4 py-4 p-md-4">
					<div class="item-inner shadow rounded-4 p-4 p-lg-5">
						<a class="item-link" href="<?= base_url('home/riwayatlamaran') ?>">
							<div class="icon-holder mb-4">
								<i data-feather="folder" style="width:48px; height:48px; stroke-width:2;"></i>
							</div>
							<h3 class="item-heading">Lihat Status Lamaran</h3>
							<div class="item-desc">
								Cek status lamaran kamu di halaman Riwayat Lamaran.
							</div>
							<!-- <div class="item-count">Riwayat Lamaran</div> -->
						</a>
					</div>
				</div>

			</div>
		</div>

		<script src="https://unpkg.com/feather-icons"></script>
		<script>
			feather.replace()
		</script>
	</section>




	<!--//help-overview-section-->


	<!-- <section class="help-cta-section theme-section text-start text-md-center py-lg-5 mb-5">
		<div class="container">
			<div class="section-inner position-relative theme-bg-dark rounded-4 p-4 p-lg-5 overflow-hidden">
				<div class="bg-pattern-holder z-0">
					<div class="bg-pattern-top"></div>
					<div class="bg-pattern-bottom"></div>
				</div>
				<div class="z-1 position-relative z-wrapper">
					<div class="section-header mb-4 mb-lg-5">
						<h2 class="section-title text-white">Transform Your Business with DevDesk</h2>

					</div>
					<div class="section-intro single-col-max mx-auto">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sapien odio, luctus molestie
						vehicula non, ullamcorper sit amet ex. Donec mauris dolor, sodales ut vestibulum ut, facilisis a
						nibh.
					</div>
					<div class="section-cta pt-4 pt-lg-5">
						<a href="https://themes.3rdwavemedia.com/bootstrap-templates/product/devdesk-free-bootstrap-5-knowledge-base-help-centre-template-for-tech-products/"
							class="btn btn-primary me-2">Free Trial</a>
						<a href="https://themes.3rdwavemedia.com/bootstrap-templates/product/devdesk-free-bootstrap-5-knowledge-base-help-centre-template-for-tech-products/"
							class="btn btn-secondary">Request Demo</a>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!--//product-cta-section-->

	<section class="help-cta-section theme-section text-start text-md-center py-lg-5 mb-5">
		<div class="container">
			<div class="section-inner position-relative theme-bg-dark rounded-4 p-4 p-lg-5 overflow-hidden">
				<div class="bg-pattern-holder z-0">
					<div class="bg-pattern-top"></div>
					<div class="bg-pattern-bottom"></div>
				</div>
				<div class="z-1 position-relative z-wrapper">
					<div class="section-header mb-4 mb-lg-5">
						<h2 class="section-title text-white">Informasi Kunjungan Website</h2>
					</div>
					<div class="section-intro single-col-max mx-auto">
						Berikut ini adalah statistik kunjungan website Pusat Karir Unsurya.
					</div>
					<div class="row text-white pt-4 pt-lg-5 g-4">

						<div class="col-6 col-md-4 col-lg-2 mx-auto">
							<div class="border rounded-4 p-3 h-100">
								<div class="fs-4 fw-bold"><?= number_format($statistik['keseluruhan']) ?></div>
								<div class="small">Keseluruhan</div>
							</div>
						</div>

						<div class="col-6 col-md-4 col-lg-2 mx-auto">
							<div class="border rounded-4 p-3 h-100">
								<div class="fs-4 fw-bold"><?= number_format($statistik['harian']) ?></div>
								<div class="small">Harian</div>
							</div>
						</div>

						<div class="col-6 col-md-4 col-lg-2 mx-auto">
							<div class="border rounded-4 p-3 h-100">
								<div class="fs-4 fw-bold"><?= number_format($statistik['mingguan']) ?></div>
								<div class="small">Mingguan</div>
							</div>
						</div>

						<div class="col-6 col-md-4 col-lg-2 mx-auto">
							<div class="border rounded-4 p-3 h-100">
								<div class="fs-4 fw-bold"><?= number_format($statistik['bulanan']) ?></div>
								<div class="small">Bulanan</div>
							</div>
						</div>

						<div class="col-6 col-md-4 col-lg-2 mx-auto">
							<div class="border rounded-4 p-3 h-100">
								<div class="fs-4 fw-bold"><?= number_format($statistik['tahunan']) ?></div>
								<div class="small">Tahunan</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>


	<a href="https://wa.me/6281283532881"
		class="btn btn-success btn-lg rounded-circle shadow position-fixed d-flex justify-content-center align-items-center"
		style="width: 60px; height: 60px; bottom: 20px; right: 20px; z-index: 1050;" target="_blank"
		aria-label="Chat via WhatsApp">
		<i class="bi bi-whatsapp fs-3"></i>
	</a>

	<footer class="footer text-white py-5 position-relative overflow-hidden">
		<!-- Background pattern -->
		<div class="page-header-bg-pattern-holder position-absolute top-0 start-0 w-100 h-100 z-0">
			<div class="bg-pattern-top"></div>
			<div class="bg-pattern-bottom"></div>
		</div>

		<!-- Konten Footer -->
		<div class="container position-relative z-1">
			<div class="row">
				<!-- Kolom 1: Logo & Kontak -->
				<div class="col-md-4 mb-4">
					<img src="<?= base_url("assets/images/logo.png") ?>" alt="Logo UNSURYA" style="height: 60px;">
					<h5 class="mt-3 fw-bold text-white">Universitas Dirgantara Marsekal<br>Suryadarma</h5>
					<ul class="list-unstyled mt-3">
						<li class="mb-2"><i class="bi bi-telephone-fill me-2 text-white"></i>(021) 8093475</li>
						<li class="mb-2"><i class="bi bi-telephone me-2 text-white"></i>(021) 8009246</li>
						<li class="mb-2"><i class="bi bi-whatsapp me-2 text-white"></i>082299205348</li>
						<li class="mb-2"><i class="bi bi-envelope-fill me-2 text-white"></i>sekretariat@unsurya.ac.id
						</li>
					</ul>
				</div>

				<!-- Kolom 2: Alamat -->
				<div class="col-md-5 mb-4">
					<h5 class="fw-bold text-white">Alamat</h5>
					<p class="mt-3 text-white">
						Jl. Halim Perdana Kusuma No.1, RT.1/RW.9, Halim Perdana Kusumah, Kec. Makasar, Kota Jakarta
						Timur,<br>
						Daerah Khusus Ibukota Jakarta 13610
					</p>
				</div>

				<!-- Kolom 3: Find Us -->
				<div class="col-md-3 mb-4">
					<h5 class="fw-bold text-white">Find Us</h5>
					<div class="d-flex gap-3 mt-3">
						<a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
						<a href="#" class="text-white fs-4"><i class="bi bi-twitter"></i></a>
						<a href="#" class="text-white fs-4"><i class="bi bi-instagram"></i></a>
						<a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
					</div>
				</div>
			</div>

			<hr class="border-top border-light mt-4">

			<div class="text-center mt-3">
				<small class="text-white">
					&copy; <?= date('Y') ?> Universitas Dirgantara Marsekal Suryadarma. All rights reserved.
				</small>
			</div>
		</div>
	</footer>


	<!--//footer-->

	<!-- Javascript -->
	<script src=<?= base_url("assets/plugins/popper.min.js")?>></script>
	<script src=<?= base_url("assets/plugins/bootstrap/js/bootstrap.min.js")?>></script>

</body>

</html>