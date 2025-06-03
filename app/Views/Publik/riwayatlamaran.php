<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href=<?= base_url("argon/img/apple-icon.png")?>>
    <link rel="icon" type="image/png" href=<?= base_url("argon/img/favicon.png")?>>
    <title>
        Pusat Karir - Riwayat Lamaran
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href=<?= base_url("argon/css/nucleo-icons.css")?> rel="stylesheet" />
    <link href=<?= base_url("argon/css/nucleo-svg.css")?> rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- CSS Files -->
    <link id="pagestyle" href=<?= base_url("argon/css/argon-dashboard.css?v=2.0.4")?> rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url('/assets/images/header_profil.jpg'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav
            class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
            <div class="container-fluid py-1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Home</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Riwayat Lamaran</li>
                    </ol>
                    <h6 class="text-white font-weight-bolder ms-2">Riwayat Lamaran</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="position-relative d-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modalUbahFoto">
                            <div class="avatar avatar-xl">
                                <img src="/uploads/profil/<?= $profil['foto'] ?>" alt="profile_image"
                                    class="w-100 rounded-circle shadow-sm">
                            </div>
                            <div class="position-absolute top-50 start-50 translate-middle bg-dark bg-opacity-50 text-white rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 50px; height: 50px; opacity: 0; transition: opacity 0.3s;"
                                onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0">
                                <i class="bi bi-camera fs-4"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalUbahFoto" tabindex="-1" aria-labelledby="modalDataLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDataLabel">Uplaod Foto Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="data-form" method="post" action="<?= base_url('Home/ubahFotoProfil') ?>"
                                        enctype="multipart/form-data">
                                        <div class="form-floating mb-3">

                                            <input type="file" class="form-control" id="foto" name="foto" required>
                                            <label for="foto">Foto Profil</label>
                                        </div>

                                        <div class="d-flex justify-content-around">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill w-65 mt-4">Simpan</button>
                                            <button type="button" class="btn btn-secondary rounded-pill w-25 mt-4"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?= $profil['nama'] ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                <?= $profil['email'] ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                        href="<?= base_url('Home')?>" role="tab" aria-selected="false">
                                        <i class="fa fa-home"></i>
                                        <span class="ms-2">Halaman Utama</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="text-danger nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                        href="<?= base_url('Auth/keluar')?>" role="tab" aria-selected="false">
                                        <i class="fa fa-sign-out"></i>
                                        <span class="ms-2">Keluar</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-text text-white">
                    <strong>Error!</strong> <?= session()->getFlashdata('error') ?>
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-text text-white">
                    <strong>Sukses!</strong> <?= session()->getFlashdata('success') ?>
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6>Riwayat Lamaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center">
                                    <thead class="text-white bg-gradient-primary">
                                        <tr>
                                            <th>Perusahaan</th>
                                            <th>Posisi</th>
                                            <th>Jenis Pekerjaan</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($riwayatlamaran as $lamaran): ?>
                                        <tr>
                                            <td><?= esc($lamaran['nama_perusahaan']) ?></td>
                                            <td><?= esc($lamaran['judul']) ?></td>
                                            <td>
                                                <?php if ($lamaran['tipe_pekerjaan'] == 'Magang'): ?>
                                                <span class="badge bg-warning-subtle text-warning">Magang</span>
                                                <?php elseif ($lamaran['tipe_pekerjaan'] == 'Penuh Waktu'): ?>
                                                <span class="badge bg-success-subtle text-success">Penuh Waktu</span>
                                                <?php elseif ($lamaran['tipe_pekerjaan'] == 'Pelatihan'): ?>
                                                <span class="badge bg-warning-subtle text-warning">Pelatihan</span>
                                                <?php endif; ?>
                                            </td>

                                            <td><?= date('d F Y', strtotime($lamaran['tanggal_lamaran'])) ?></td>
                                            <td>
                                                <?php if ($lamaran['status'] == 'Ditolak'): ?>
                                                <span class="badge bg-danger-subtle text-danger">DITOLAK</span>
                                                <?php elseif ($lamaran['status'] == 'Diterima'): ?>
                                                <span class="badge bg-success-subtle text-success">DITERIMA</span>
                                                <?php elseif ($lamaran['status'] == 'Diajukan'): ?>
                                                <span class="badge bg-warning-subtle text-warning">DIAJUKAN</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-detail<?= $lamaran['id']?>">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <?php if (
                                                    strtolower($lamaran['tipe_pekerjaan']) == 'magang' && 
                                                    strtolower($lamaran['status']) == 'diterima'): ?>
                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal-laporan<?= $lamaran['id'] ?>">
                                                    <span>Buat Laporan</span>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <?php if (empty($riwayatlamaran)): ?>
                                <p class="text-muted text-center mt-3">Belum ada lamaran yang diajukan.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($riwayatlamaran as $lamaran): ?>
        <div class="modal fade" id="modal-detail<?= $lamaran['id'] ?>" tabindex="-1"
            aria-labelledby="modalDetailLabel<?= $lamaran['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

                    <!-- Gradient Header -->
                    <div class="modal-header text-white px-4 pt-4 pb-3 bg-gradient-primary">
                        <div>
                            <h1 class="fs-4 fw-semibold text-white mb-0">Detail Lamaran</h1>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body bg-light-subtle px-4 py-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="bg-white rounded-3 p-3 shadow-sm">
                                    <small class="text-muted">Perusahaan</small>
                                    <div class="fw-semibold"><?= $lamaran['nama_perusahaan'] ?></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-white rounded-3 p-3 shadow-sm">
                                    <small class="text-muted">Lowongan</small>
                                    <div class="fw-semibold"><?= $lamaran['judul'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-white rounded-3 p-3 shadow-sm">
                                    <small class="text-muted">Tanggal Lamaran</small>
                                    <div class="fw-semibold"><?= $lamaran['tanggal_lamaran'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-white rounded-3 p-3 shadow-sm">
                                    <small class="text-muted">Status</small>
                                    <div class="fw-semibold"><?= $lamaran['status'] ?></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bg-white rounded-3 p-3 shadow-sm">
                                    <small class="text-muted">Keterangan</small>
                                    <div class="fw-semibold"><?= $lamaran['keterangan'] ?? '-' ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach ($riwayatlamaran as $lamaran): ?>
        <?php if (
            strtolower($lamaran['tipe_pekerjaan']) == 'magang' && 
            strtolower($lamaran['status']) == 'diterima'): ?>

        <!-- Modal Input Laporan -->
        <div class="modal fade" id="modal-laporan<?= $lamaran['id'] ?>" tabindex="-1"
            aria-labelledby="modalLaporanLabel<?= $lamaran['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

                    <!-- Header -->
                    <div class="modal-header text-white px-4 pt-4 pb-3 bg-gradient-primary">
                        <div>
                            <h1 class="fs-4 fw-semibold text-white mb-0">Laporan Magang</h1>
                            <p class="mb-0 small opacity-75">Perusahaan: <?= $lamaran['nama_perusahaan'] ?></p>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>

                    <!-- Body -->
                    <form action="<?= base_url('Home/laporanMagang'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body bg-light-subtle px-4 py-4">
                            <input type="hidden" name="id_lamaran" value="<?= $lamaran['id'] ?>">

                            <div class="mb-3">
                                <label for="judul<?= $lamaran['id'] ?>" class="form-label fw-semibold">Judul
                                    Laporan</label>
                                <input type="text" class="form-control" name="judul" id="judul<?= $lamaran['id'] ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="isi<?= $lamaran['id'] ?>" class="form-label fw-semibold">Isi Laporan</label>
                                <textarea name="isi_laporan" id="isi_laporan<?= $lamaran['id'] ?>"
                                    class="form-control rich-text" rows="10"></textarea>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="modal-footer bg-light-subtle px-4 pb-4 pt-2 border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/tr85vet6cyl7ce9q24zyh7oy5pi69zpknmcgoju139xquv3d/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.rich-text',
            plugins: 'lists link image table code',
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
            menubar: false,
            height: 300
        });
    </script>


    <!--   Core JS Files   -->
    <script src=<?= base_url("argon/js/core/popper.min.js")?>></script>
    <script src=<?= base_url("argon/js/core/bootstrap.min.js")?>></script>
    <script src=<?= base_url("argon/js/plugins/perfect-scrollbar.min.js")?>></script>
    <script src=<?= base_url("argon/js/plugins/smooth-scrollbar.min.js")?>></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src=<?= base_url("argon/js/argon-dashboard.min.js?v=2.0.4")?>></script>
</body>

</html>