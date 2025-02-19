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
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Lowongan</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Data Lowongan</h6>
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
                        <h6 class="flex-grow-1 bd-highlight">Data Lowongan </h6>
                        <a href="<?= base_url('Lowongan/exportExcel') ?>" class="btn btn-success bd-highlight">Export
                            Excel</a>
                        <button type="button" class="btn btn-primary ms-2 bd-highlight" data-bs-toggle="modal"
                            data-bs-target="#tambah-data">Tambah Lowongan Baru</button>
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
                                            Deskripsi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Poster</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kualifikasi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gaji</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tipe Pekerjaan</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Lokasi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Dipasang</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Berakhir</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Batas Lamaran</th>

                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($lowongan)) : ?>
                                    <?php $no = 1; foreach ($lowongan as $low) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $no++ ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $low['judul']?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= strlen($low['deskripsi']) > 10 ? substr($low['deskripsi'], 0, 30) . '...' : $low['deskripsi'] ?>
                                            </p>

                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="<?= base_url('uploads/poster/' . $low['poster']) ?>"
                                                class="rounded" width="70%">

                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= strlen($low['kualifikasi']) > 10 ? substr($low['kualifikasi'], 0, 30) . '...' : $low['kualifikasi'] ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $low['gaji']?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $low['tipe_pekerjaan']?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $low['lokasi']?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= date('d F Y', strtotime($low['tanggal_dipasang'])) ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= date('d F Y', strtotime($low['tanggal_berakhir'])) ?>
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $low['batas_lamaran']?></p>
                                        </td>

                                        <td class="align-middle">
                                            <a href="<?= base_url('Perusahaan/lihatLamaran/'.$low['id']) ?>" class="text-success font-weight-bold text-xs"
                                                target="_blank">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="#" class="text-warning font-weight-bold text-xs ms-2"
                                                data-bs-toggle="modal" data-bs-target="#modal-edit<?= $low['id']?>"
                                                target="_blank">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <a href="<?= base_url('Perusahaan/hapusLowongan/'.$low['id']) ?>"
                                                onclick="return confirm(`Apakah anda yakin?`)"
                                                class="text-danger font-weight-bold text-xs ms-2" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                <i class="fa fa-trash me-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Belum ada data pengguna.</p>
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

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDataLabel">Tambah Lowongan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="data-form" method="post" action="<?= base_url('perusahaan/tambahLowongan'); ?>"
                            enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="judul" name="judul" required>
                                <label for="judul">Judul Lowongan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                                <label for="deskripsi">Deskripsi Lowongan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="poster" name="poster" required>
                                <label for="poster">Gambar Poster</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="kualifikasi" name="kualifikasi" required></textarea>
                                <label for="kualifikasi">Kualifikasi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="gaji" name="gaji" required>
                                <label for="gaji">Gaji</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tipe_pekerjaan" name="tipe_pekerjaan"
                                    required>
                                <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                                <label for="lokasi">Lokasi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir"
                                    required>
                                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="batas_lamaran" name="batas_lamaran"
                                    required>
                                <label for="batas_lamaran">Batas Lamaran</label>
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
        <!-- End Modal Tambah -->

        <!-- Modal Edit -->
        <?php if (!empty($lowongan)) : ?>
        <?php foreach ($lowongan as $edit) { ?>
        <div class="modal fade" id="modal-edit<?= $edit['id'] ?>" tabindex="-1" aria-labelledby="modalEditLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edit Lowongan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-form" method="post"
                            action="<?= base_url('Perusahaan/editLowongan/' . $edit['id']); ?>"
                            enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $edit['id'] ?>">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?= $edit['judul'] ?>" required>
                                <label for="judul">Judul Lowongan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" style="height: 100px"
                                    required><?= $edit['deskripsi'] ?></textarea>
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                            <div class="mb-3">
                                <label for="poster" class="form-label">Poster</label>
                                <input type="file" class="form-control" id="poster" name="poster">
                                <?php if (!empty($edit['poster'])): ?>
                                <div class="mt-2">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="window.open('/uploads/poster/<?= $edit['poster'] ?>')">Lihat
                                        Poster</button>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="kualifikasi" name="kualifikasi" style="height: 100px"
                                    required><?= $edit['kualifikasi'] ?></textarea>
                                <label for="kualifikasi">Kualifikasi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="gaji" name="gaji"
                                    value="<?= $edit['gaji'] ?>" required>
                                <label for="gaji">Gaji</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tipe_pekerjaan" name="tipe_pekerjaan"
                                    value="<?= $edit['tipe_pekerjaan'] ?>" required>
                                <label for="tipe_pekerjaan">Tipe Pekerjaan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                    value="<?= $edit['lokasi'] ?>" required>
                                <label for="lokasi">Lokasi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir"
                                    value="<?= $edit['tanggal_berakhir'] ?>" required>
                                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="batas_lamaran" name="batas_lamaran"
                                    value="<?= $edit['batas_lamaran'] ?>" required>
                                <label for="batas_lamaran">Batas Lamaran</label>
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
        <!-- End Modal Edit -->

        <?= $this->endSection(); ?>
        <!-- Menutup bagian konten -->