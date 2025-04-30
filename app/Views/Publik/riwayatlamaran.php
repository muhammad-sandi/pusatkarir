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
        Pusat Karir - Profil
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href=<?= base_url("argon/css/nucleo-icons.css")?> rel="stylesheet" />
    <link href=<?= base_url("argon/css/nucleo-svg.css")?> rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href=<?= base_url("argon/css/nucleo-svg.css")?> rel="stylesheet" />
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h6>Riwayat Lamaran</h6>
                        </div>
                        <div class="card-body">
    <div class="table-responsive">
        <table class="table align-items-center">
            <thead class="bg-light">
                <tr>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Tanggal Daftar</th>
                    <th>Tahapan Terakhir</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayatlamaran as $lamaran): ?>
                <tr>
                    <td><?= esc($lamaran['nama_perusahaan']) ?></td>
                    <td><?= esc($lamaran['judul']) ?></td>
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
                        <a href="/lamaran/detail/" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </a>
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


    </div>
    </div>
    </div>
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