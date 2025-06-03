<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pusat Karir - Visi</title>

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
                                <h1 class="heading-level-1 text-center mb-1">VISI: Membangun Lulusan Unggul dengan
                                    Konsep BMW</h1>
                            </header>

                            <div class="figure-holder single-col-max mx-auto py-0">
                                <figure class="figure mb-2">
                                    <img class="img-fluid" src="<?= base_url("/assets/images/visi_misi.jpg")?>"
                                        alt="Visi BMW: Bekerja, Melanjutkan Studi, Wirausaha">
                                    <figcaption class="figure-caption text-center mt-2">Semboyan BMW (Bekerja,
                                        Melanjutkan
                                        Studi, Wirausaha)</figcaption>
                                </figure>
                            </div>
                            <p>Fakultas Ilmu Komputer dan Desain berkomitmen penuh untuk membentuk generasi muda yang
                                tidak hanya cerdas secara akademik, tetapi juga siap menghadapi tantangan dunia nyata.
                                Visi kami didasari oleh Semboyan <b>Bekerja, Melanjutkan Studi, dan Wirausaha (BMW)</b>.
                                Konsep ini merupakan pilar utama dalam pengembangan minat dan bakat mahasiswa, serta
                                memastikan setiap lulusan kami memiliki daya saing global dan dampak positif bagi
                                masyarakat.</p>

                            <div class="theme-callout theme-callout-info">
                                <strong>Mengapa Konsep BMW Penting?</strong> Konsep BMW dirancang untuk memberikan
                                fleksibilitas karir bagi lulusan, memastikan mereka tidak terbatas pada satu jalur saja.
                                Ini adalah pendekatan holistik untuk mencetak individu yang adaptif dan inovatif.
                            </div>
                            <h2 class="heading-level-2 mt-5">1. Bekerja: Mempersiapkan Profesional Siap Kerja</h2>
                            <p>Kami meyakini bahwa pendidikan tinggi harus secara langsung relevan dengan kebutuhan
                                industri. Oleh karena itu, kurikulum kami dirancang untuk membekali mahasiswa dengan
                                keterampilan teknis dan non-teknis yang mutakhir, sesuai dengan tuntutan pasar kerja
                                global. Kami berfokus pada pengalaman praktis, kemitraan industri, dan pengembangan
                                karir yang berkelanjutan.</p>

                            <h3 class="heading-level-3">Strategi Peningkatan Kesiapan Kerja:</h3>
                            <ol class="article-list-custom">
                                <li><strong>Kurikulum Relevan Industri:</strong> Selalu memperbarui silabus mata kuliah
                                    berdasarkan masukan dari praktisi industri dan tren teknologi terkini.</li>
                                <li><strong>Program Magang Wajib:</strong> Mewajibkan mahasiswa untuk mengambil program
                                    magang di perusahaan-perusahaan terkemuka untuk mendapatkan pengalaman langsung.
                                </li>
                                <li><strong>Pengembangan Soft Skills:</strong> Mengintegrasikan pelatihan komunikasi,
                                    kepemimpinan, kerja tim, dan pemecahan masalah ke dalam setiap aspek pembelajaran.
                                </li>
                                <li><strong>Pusat Karir Profesional:</strong> Menyediakan layanan konseling karir,
                                    lokakarya penulisan CV, simulasi wawancara, dan forum rekrutmen.</li>
                            </ol>

                            <div class="theme-callout theme-callout-success">
                                <strong>Berita Sukses!</strong> 90% lulusan kami berhasil mendapatkan pekerjaan dalam
                                waktu kurang dari 6 bulan setelah kelulusan, dengan sebagian besar bekerja di perusahaan
                                multinasional dan startup teknologi terkemuka.
                            </div>

                            <h2 class="heading-level-2 mt-5">2. Melanjutkan Studi: Mendorong Generasi Pembelajar Seumur
                                Hidup</h2>
                            <p>Bagi mahasiswa yang memiliki passion di bidang riset atau ingin mendalami ilmu lebih
                                lanjut, Fakultas Ilmu Komputer dan Desain menyediakan jalur yang kuat untuk melanjutkan
                                studi ke jenjang pascasarjana. Kami mendorong semangat keilmuan, berpikir kritis, dan
                                kontribusi terhadap perkembangan ilmu pengetahuan dan teknologi.</p>

                            <h3 class="heading-level-3">Jalur Akademik Unggul:</h3>
                            <ul class="article-list">
                                <li><strong>Riset dan Publikasi:</strong> Memfasilitasi mahasiswa untuk terlibat dalam
                                    proyek riset dosen dan mempublikasikan hasil karya ilmiah di jurnal nasional maupun
                                    internasional.</li>
                                <li><strong>Bimbingan Pascasarjana:</strong> Menyediakan bimbingan khusus bagi mahasiswa
                                    yang ingin melanjutkan S2 atau S3, termasuk persiapan beasiswa dan pemilihan program
                                    studi.</li>
                                <li><strong>Seminar dan Workshop Ilmiah:</strong> Mengadakan secara rutin acara-acara
                                    yang menghadirkan pakar dari berbagai disiplin ilmu untuk memperkaya wawasan
                                    akademik.</li>
                                <li><strong>Jaringan Akademik Global:</strong> Membangun koneksi dengan universitas dan
                                    institusi riset di seluruh dunia untuk peluang kolaborasi dan pertukaran pelajar.
                                </li>
                            </ul>

                            <h2 class="heading-level-2 mt-5">3. Wirausaha: Mencetak Inovator dan Pencipta Lapangan Kerja
                            </h2>
                            <p>Kami percaya bahwa lulusan terbaik bukan hanya yang siap bekerja, tetapi juga yang mampu
                                menciptakan lapangan kerja dan memberikan inovasi. Program kewirausahaan kami dirancang
                                untuk menumbuhkan mentalitas pengusaha, kreativitas, dan kemampuan merealisasikan
                                ide-ide menjadi bisnis yang berkelanjutan.</p>

                            <h3 class="heading-level-3">Ekosistem Kewirausahaan:</h3>
                            <ol class="article-list-custom">
                                <li><strong>Pusat Inkubator Bisnis:</strong> Menyediakan fasilitas dan bimbingan bagi
                                    mahasiswa yang ingin mengembangkan startup dari ide awal hingga siap diluncurkan.
                                </li>
                                <li><strong>Program Mentorship:</strong> Menghubungkan mahasiswa dengan pengusaha sukses
                                    dan investor untuk mendapatkan wawasan dan dukungan.</li>
                                <li><strong>Kompetisi Bisnis dan Pendanaan:</strong> Mendorong partisipasi dalam
                                    berbagai kompetisi startup dan membantu akses ke sumber pendanaan awal.</li>
                                <li><strong>Workshop Desain Berpikir:</strong> Melatih mahasiswa untuk mengidentifikasi
                                    masalah, mengembangkan solusi inovatif, dan menciptakan produk atau layanan yang
                                    diminati pasar.</li>
                            </ol>

                            <div class="theme-callout theme-callout-warning">
                                <strong>Tantangan Kewirausahaan:</strong> Jalur wirausaha penuh dengan tantangan, namun
                                dengan semangat pantang menyerah dan dukungan dari fakultas, Anda akan dilengkapi untuk
                                menghadapi setiap rintangan.
                            </div>

                            <h2 class="heading-level-2 mt-5">Implementasi dan Dukungan: Strategi Fakultas</h2>
                            <p>Untuk mewujudkan visi BMW, Fakultas Ilmu Komputer dan Desain secara aktif
                                mengintegrasikan ketiga pilar ini dalam kurikulum, kegiatan ekstrakurikuler, dan
                                fasilitas yang tersedia. Kami secara berkesinambungan mengevaluasi program kami untuk
                                memastikan relevansinya dan dampaknya terhadap kesuksesan mahasiswa.</p>

                            <h4 class="heading-level-4">Program Pendukung Konsep BMW:</h4>
                            <table class="table table-striped my-5">
                                <thead>
                                    <tr>
                                        <th scope="col">Pilar BMW</th>
                                        <th scope="col">Program & Kegiatan Contoh</th>
                                        <th scope="col">Manfaat Utama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Bekerja</th>
                                        <td>Program Magang, Pelatihan Sertifikasi Industri, Job Fair Kampus</td>
                                        <td>Pengalaman kerja nyata, sertifikasi kompetensi, jaringan profesional</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Melanjutkan Studi</th>
                                        <td>Asisten Peneliti Dosen, Beasiswa Unggulan, Konferensi Ilmiah</td>
                                        <td>Keterampilan riset, akses pendidikan tinggi, jaringan akademik</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Wirausaha</th>
                                        <td>Inkubator Startup, Pitching Day, Mentoring Bisnis</td>
                                        <td>Pengembangan ide, akses modal, kemampuan membangun bisnis</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="theme-callout theme-callout-danger">
                                <strong>Penting: Adaptasi Berkelanjutan!</strong> Dunia terus berubah. Visi BMW kami
                                juga terus beradaptasi dengan inovasi terbaru dan kebutuhan pasar. Kami mengajak seluruh
                                civitas akademika untuk terus berpartisipasi aktif.
                            </div>

                            <p>Dengan demikian, Fakultas Ilmu Komputer dan Desain tidak hanya mencetak lulusan, tetapi
                                juga membentuk individu yang siap menjadi pemimpin, inovator, dan kontributor berharga
                                di era digital ini. Visi BMW adalah komitmen kami untuk masa depan yang lebih cerah bagi
                                para mahasiswa dan bangsa.</p>

                        </article>
                    </section>
                </div>
                <div class="col-lg-4 col-xl-3 order-lg-first mt-5 mt-lg-0">
                    <div class="side-bar pt-5 pt-lg-0 sticky">
                        <h3 class="side-bar-heading mb-3">Profil</h3>
                        <nav class="side-bar-nav">
                            <ul class="sidebar-nav-items list-unstyled flex-column">
                                <li class="nav-item active"><a href=<?= base_url('home/visi')?>>Visi</a></li>
                                <li class="nav-item"><a href=<?= base_url('home/misi')?>>Misi</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


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