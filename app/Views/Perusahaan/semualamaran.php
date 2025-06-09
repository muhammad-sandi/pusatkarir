<?= $this->extend('layouts_perusahaan/main'); ?>
<!-- Menggunakan layout utama -->

<?= $this->section('content'); ?>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
        data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                            href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Lamaran</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Data Lamaran</h6>
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
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex bd-highlight">
                        <h6 class="flex-grow-1 bd-highlight">Data Lamaran </h6>
                        <a href="<?= base_url('Lowongan/exportExcel') ?>" class="btn btn-success bd-highlight">Export
                            Excel</a>
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
                                            Judul Lowongan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tipe Pekerjaan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Pelamar</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Surat Lamaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            CV</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pendidikan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Keahlian</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Pengalaman Kerja</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Lamaran</th>

                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($lamaran)) : ?>
                                    <?php $no = 1; foreach ($lamaran as $data) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $no++ ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['judul']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['tipe_pekerjaan']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['nama']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <a href="<?= base_url('uploads/surat_lamaran/' . $data['surat_lamaran']) ?>"
                                                target="_blank">
                                                <button class="btn btn-sm btn-primary">Lihat Surat Lamaran</button>
                                            </a>
                                        </td>

                                        <td class="align-middle text-center">
                                            <a href="<?= base_url('uploads/cv/' . $data['cv']) ?>" target="_blank">
                                                <button class="btn btn-sm btn-primary">Lihat CV</button>
                                            </a>
                                        </td>


                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['pendidikan']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['keahlian']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['pengalaman_kerja']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['status']?></p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $data['tanggal_lamaran']?></p>
                                        </td>

                                        <td class="align-middle">

                                            <?php if ($data['status'] == 'Diajukan'): ?>
                                            <a href="#" class="text-success font-weight-bold text-xs ms-2"
                                                data-bs-toggle="modal" data-bs-target="#modal-terima<?= $data['id']?>"
                                                target="_blank">
                                                <i class="fa fa-check"></i>
                                            </a>

                                            <a href="#" class="text-danger font-weight-bold text-xs ms-2"
                                                data-bs-toggle="modal" data-bs-target="#modal-tolak<?= $data['id']?>"
                                                target="_blank">
                                                <i class="fa fa-xmark me-3"></i>
                                            </a>
                                            <?php endif; ?>


                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Belum ada data.</p>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Terima -->
        <?php if (!empty($lamaran)) : ?>
        <?php foreach ($lamaran as $terima) { ?>
        <div class="modal fade" id="modal-terima<?= $terima['id'] ?>" tabindex="-1" aria-labelledby="modalDataLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataLabel">Terima Lamaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="data-form" method="post"
                            action="<?= base_url('Perusahaan/terimaLamaran/' . $terima['id']); ?>"
                            enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_lowongan" name="id_lowongan"
                                    value="<?= $terima['id_lowongan'] ?>" required>

                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                <label for="keterangan">Keterangan</label>
                            </div>

                            <div class="d-flex justify-content-around">
                                <button type="submit" class="btn btn-primary rounded-pill w-65 mt-4">Simpan</button>
                                <button type="button" class="btn btn-secondary rounded-pill w-25 mt-4"
                                    data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php endif; ?>
        <!-- End Modal terima -->

        <!-- Modal Tolak -->
        <?php if (!empty($lamaran)) : ?>
        <?php foreach ($lamaran as $tolak) { ?>
        <div class="modal fade" id="modal-tolak<?= $tolak['id'] ?>" tabindex="-1" aria-labelledby="modalDataLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataLabel">Tolak Lamaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="data-form" method="post"
                            action="<?= base_url('Perusahaan/tolakLamaran/' . $tolak['id']); ?>"
                            enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="hidden" class="form-control" id="id_lowongan" name="id_lowongan"
                                    value="<?= $tolak['id_lowongan'] ?>" required>

                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                <label for="keterangan">Keterangan</label>
                            </div>

                            <div class="d-flex justify-content-around">
                                <button type="submit" class="btn btn-primary rounded-pill w-65 mt-4">Simpan</button>
                                <button type="button" class="btn btn-secondary rounded-pill w-25 mt-4"
                                    data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php endif; ?>
        <!-- End Modal Tolak -->

        <?= $this->endSection(); ?>
        <!-- Menutup bagian konten -->