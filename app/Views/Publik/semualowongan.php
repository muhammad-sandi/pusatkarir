<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pusat Karir - Semua Lowongan</title>

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
            
            <!-- Tombol Lihat Semua -->
            <div class="mt-4">
                    <a href="<?= base_url('home') ?>"
                        class="btn btn-primary rounded-4 d-inline-flex align-items-center gap-2">
                        <span class="d-inline-flex align-items-center">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span>Kembali</span>
                    </a>
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
                            <!-- Judul Lowongan -->
                            <!-- <h3 class="item-heading">
                       		<?= $tersedia['judul'] ?>
                    		</h3> -->
                            <!-- Deskripsi dan Tanggal -->
                            <div class="item-desc">
                                <img src="<?= base_url('uploads/poster/' . $tersedia['poster']) ?>"
                                    alt="Poster Lowongan" class="img-fluid rounded-4 mb-4"
                                    style="max-width: 100%; height: auto;">

                                <span class="rate-icon me-2"><i class="fa-solid fa-calendar"></i></span>
                                <?= date('d F Y', strtotime($tersedia['tanggal_dipasang'])) ?> -
                                <?= date('d F Y', strtotime($tersedia['tanggal_berakhir'])) ?>
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

            </div>

            <!--//help-featured-articles-section-->
        </div>
        <!--//container-->
    </section>

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