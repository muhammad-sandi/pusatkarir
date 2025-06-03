<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pusat Karir - Misi</title>

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
                                    <li><a class="dropdown-item" href="help-category.html">Visi</a></li>
                                    <li><a class="dropdown-item" href="help-category-alt.html">Misi</a></li>

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

    <div class="help-breadcrumb-container pt-4">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Visi</li>
                </ol>
            </nav>
        </div>
        <!--//container-->
    </div>
    <!--//help-breadcrumb-container-->

   <div class="help-content-wrapper theme-section pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <section class="main-section order-lg-last modern-section">
                    <article class="help-article mb-0">
                        <header class="article-header mb-0">
                            <h1 class="heading-level-1 text-center mb-1">MISI: Manfaat Penerapan Konsep BMW</h1>
                        </header>

                        <div class="figure-holder single-col-max mx-auto py-0">
                            <figure class="figure mb-2">
                                <img class="img-fluid" src="<?= base_url("/assets/images/visi_misi.jpg")?>"
                                     alt="Konsep BMW: Bekerja, Melanjutkan Studi, Wirausaha">
                                <figcaption class="figure-caption text-center mt-2">Pilar Utama Konsep BMW</figcaption>
                            </figure>
                        </div>
                        <p>Penerapan konsep **Bekerja, Melanjutkan Studi, dan Wirausaha (BMW)** di Fakultas Ilmu Komputer dan Desain bukan sekadar visi, melainkan serangkaian misi konkret yang kami jalankan. Tujuan utamanya adalah untuk memastikan setiap lulusan kami tidak hanya memiliki bekal ilmu yang kuat, tetapi juga mampu mengimplementasikannya secara nyata di berbagai jalur karir. Berikut adalah misi-misi utama yang menjadi komitmen kami:</p>

                        <div class="theme-callout theme-callout-info">
                            <strong>Fokus Misi Kami:</strong> Setiap poin misi dirancang untuk mendukung visi BMW, memastikan lulusan siap kerja, berwawasan global, dan berjiwa inovatif.
                        </div><h2 class="heading-level-2 mt-5">1. Membekali Siswa dengan Keterampilan Dunia Industri</h2>
                        <p>Misi pertama kami adalah memastikan mahasiswa memiliki keterampilan teknis dan non-teknis yang sangat relevan dengan kebutuhan industri saat ini dan di masa depan. Kami menyadari bahwa dunia industri bergerak sangat cepat, sehingga kurikulum kami terus diperbarui dan disesuaikan dengan standar kompetensi global. Fokus kami tidak hanya pada teori, tetapi juga pada aplikasi praktis yang konkret.</p>

                        <h3 class="heading-level-3">Strategi Pembekalan Keterampilan:</h3>
                        <ul class="article-list">
                            <li><strong>Kurikulum Adaptif:</strong> Mengembangkan dan memperbarui kurikulum secara berkala dengan melibatkan praktisi industri dan asosiasi profesional.</li>
                            <li><strong>Praktikum dan Proyek Nyata:</strong> Menyediakan sarana dan kesempatan bagi mahasiswa untuk terlibat dalam proyek-proyek riil yang relevan dengan masalah di industri.</li>
                            <li><strong>Sertifikasi Kompetensi:</strong> Mendorong mahasiswa untuk mengikuti sertifikasi profesional yang diakui secara nasional maupun internasional di bidang terkait.</li>
                            <li><strong>Pengembangan Soft Skills:</strong> Mengintegrasikan pelatihan keterampilan komunikasi, kolaborasi, pemecahan masalah, dan pemikiran kritis dalam setiap mata kuliah.</li>
                        </ul>

                        <h2 class="heading-level-2 mt-5">2. Memberikan Kesempatan Melanjutkan Studi ke Jenjang Lebih Tinggi</h2>
                        <p>Kami berkomitmen untuk memfasilitasi mahasiswa yang berkeinginan kuat untuk melanjutkan pendidikan ke jenjang Magister (S2) dan Doktoral (S3). Misi ini didukung oleh penyediaan informasi, bimbingan, dan jaringan ke perguruan tinggi terkemuka yang memiliki akreditasi minimal 'Baik Sekali' serta program studi yang linier dengan bidang keilmuan yang diambil sebelumnya.</p>

                        <h3 class="heading-level-3">Dukungan Pendidikan Lanjutan:</h3>
                        <ol class="article-list-custom">
                            <li><strong>Konsultasi Akademik:</strong> Menyediakan layanan konsultasi individu untuk perencanaan studi lanjutan, pemilihan universitas, dan persyaratan masuk.</li>
                            <li><strong>Informasi Beasiswa:</strong> Mengadakan sesi informasi dan lokakarya mengenai berbagai peluang beasiswa, baik dari dalam maupun luar negeri.</li>
                            <li><strong>Pengembangan Proposal Riset:</strong> Memberikan bimbingan dalam menyusun proposal penelitian yang berkualitas untuk aplikasi pascasarjana.</li>
                            <li><strong>Jaringan Alumni dan Dosen:</strong> Membangun koneksi dengan alumni yang sukses di jenjang pascasarjana dan dosen yang memiliki jaringan luas di komunitas akademik.</li>
                        </ol>

                        <div class="theme-callout theme-callout-success">
                            <strong>Jejak Langkah Lulusan:</strong> Banyak lulusan kami berhasil melanjutkan studi di universitas ternama di Indonesia, Asia, dan Eropa, seringkali dengan dukungan beasiswa penuh.
                        </div>

                        <h2 class="heading-level-2 mt-5">3. Membantu Siswa Menumbuhkan Jiwa Wirausaha</h2>
                        <p>Fakultas Ilmu Komputer dan Desain berdedikasi untuk menanamkan dan mengembangkan jiwa kewirausahaan pada setiap mahasiswa. Kami percaya bahwa semangat inovasi dan keberanian mengambil risiko adalah kunci untuk menciptakan solusi baru dan membuka peluang ekonomi. Kami menyediakan ekosistem yang mendukung pertumbuhan ide-ide bisnis sejak dini.</p>

                        <h3 class="heading-level-3">Inisiatif Kewirausahaan Kami:</h3>
                        <ul class="article-list">
                            <li><strong>Program Inkubasi Startup:</strong> Menyediakan program inkubasi yang komprehensif, mulai dari validasi ide, pengembangan prototipe, hingga strategi pemasaran.</li>
                            <li><strong>Mentoring dari Praktisi:</strong> Menghubungkan mahasiswa dengan mentor berpengalaman dari dunia startup dan bisnis.</li>
                            <li><strong>Akses Pendanaan Awal:</strong> Memfasilitasi mahasiswa untuk mengikuti kompetisi bisnis dan terhubung dengan investor atau program akselerator.</li>
                            <li><strong>Workshop Kreativitas dan Inovasi:</strong> Mengadakan pelatihan rutin untuk mendorong pemikiran lateral dan solusi disruptif.</li>
                        </ul>

                        <div class="theme-callout theme-callout-warning">
                            <strong>Bangun Bisnis Impian Anda:</strong> Wirausaha adalah perjalanan yang membutuhkan ketekunan. Kami siap mendukung Anda di setiap tahap untuk mewujudkan ide menjadi kenyataan.
                        </div>

                        <h2 class="heading-level-2 mt-5">4. Membantu Siswa Siap Memasuki Lapangan Kerja</h2>
                        <p>Selain membekali dengan keterampilan, misi kami juga mencakup memastikan setiap mahasiswa memiliki kesiapan mental dan profesional yang optimal untuk memasuki dunia kerja. Ini berarti tidak hanya memiliki kemampuan teknis, tetapi juga memahami dinamika pasar kerja, mampu membangun jaringan, dan tampil percaya diri di hadapan rekruter.</p>

                        <h3 class="heading-level-3">Program Kesiapan Karir:</h3>
                        <ol class="article-list-custom">
                            <li><strong>Simulasi Wawancara:</strong> Mengadakan sesi wawancara tiruan dengan umpan balik konstruktif untuk meningkatkan kepercayaan diri mahasiswa.</li>
                            <li><strong>Lokakarya Penyusunan CV & Portofolio:</strong> Membantu mahasiswa membuat resume dan portofolio yang menarik dan profesional.</li>
                            <li><strong>Career Day & Job Fair:</strong> Menyelenggarakan acara rutin yang mempertemukan mahasiswa dengan berbagai perusahaan pencari bakat.</li>
                            <li><strong>Pembentukan Jaringan Profesional:</strong> Mendorong mahasiswa untuk terlibat dalam acara industri dan membangun koneksi dengan calon pemberi kerja.</li>
                        </ol>

                        <div class="theme-callout theme-callout-danger">
                            <strong>Bersaing di Era Digital:</strong> Pasar kerja semakin kompetitif. Kesiapan menyeluruh adalah kunci untuk menonjol dan meraih peluang terbaik.
                        </div>

                        <p>Melalui implementasi misi-misi ini, Fakultas Ilmu Komputer dan Desain bertekad untuk mencetak lulusan yang tidak hanya unggul di bidang akademik, tetapi juga siap menjadi agen perubahan, pemimpin masa depan, dan kontributor yang berarti bagi kemajuan teknologi dan perekonomian bangsa. Komitmen kami adalah untuk terus berinovasi demi masa depan cerah para mahasiswa kami.</p>

                    </article></section></div><div class="col-lg-4 col-xl-3 order-lg-first mt-5 mt-lg-0">
                <div class="side-bar pt-5 pt-lg-0 sticky">
                    <h3 class="side-bar-heading mb-3">Profil</h3>
                    <nav class="side-bar-nav">
                        <ul class="sidebar-nav-items list-unstyled flex-column">
                            <li class="nav-item"><a href="<?= base_url('home/visi')?>">Visi</a></li>
                            <li class="nav-item active"><a href="<?= base_url('home/misi')?>">Misi</a></li>
                        </ul>
                    </nav>
                </div></div></div></div></div>```

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