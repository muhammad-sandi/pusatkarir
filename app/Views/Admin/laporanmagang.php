<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                            href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Laporan Magang</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Data Laporan Magang</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none"><?= ucfirst(session()->get('username')); ?></span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-sign-out cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item border-radius-md" href="<?= base_url('Auth/keluar')?>">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm text-danger font-weight-normal mb-1">
                                                Keluar
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex bd-highlight">
                        <h6 class="flex-grow-1 bd-highlight">Data Laporan Magang</h6>
                        <!-- <button type="button" class="btn btn-primary ms-2 bd-highlight" data-bs-toggle="modal"
                            data-bs-target="#tambah-perusahaan">Tambah Perusahaan</button> -->
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Isi Laporan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Submit</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($laporan)) : ?>
                                    <?php $no = 1; foreach ($laporan as $lap) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $no++; ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $lap['judul']; ?></p>
                                        </td>
                                        <td class="align-middle text-center"
                                            style="max-width: 200px; overflow: hidden;">
                                            <p class="text-xs font-weight-bold mb-0 d-inline-block align-middle"
                                                style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                <?= strip_tags($lap['isi_laporan']); ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $lap['tanggal_submit']; ?></p>
                                        </td>

                                        <td class="align-middle">
                                            <a href="#" class="text-success font-weight-bold text-xs"
                                                data-bs-toggle="modal" data-bs-target="#modal-detail<?= $lap['id']; ?>"
                                                target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <!-- <a href="<?= base_url('Admin/hapusperusahaan/' . $lap['id']); ?>"
                                                onclick="return confirm('Apakah anda yakin?')"
                                                class="text-danger font-weight-bold text-xs ms-3" data-toggle="tooltip">
                                                <i class="fa fa-trash me-3"></i>
                                            </a> -->
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Belum ada data laporan.</p>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?= $pager->links('laporan', 'pagination') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php foreach ($laporan as $lap): ?>
<!-- Modal untuk laporan ini -->
<div class="modal fade" id="modal-detail<?= $lap['id']; ?>" tabindex="-1"
    aria-labelledby="modalDetailLabel<?= $lap['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg rounded-4">
            <div class="modal-header bg-dark text-white rounded-top-4">
                <h5 class="modal-title ps-2 text-white" id="modalDetailLabel<?= $lap['id']; ?>"><b>Detail Laporan</b>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" style="font-size: 1rem; line-height: 1.6; color: #333;">
                <div class="border rounded-3 p-3 bg-light">
                    <?= $lap['isi_laporan']; ?>
                </div>
            </div>
            <div class="modal-footer bg-light rounded-bottom-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


<?= $this->endSection(); ?>