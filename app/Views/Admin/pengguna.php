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
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Pengguna</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Data Pengguna</h6>
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
                        <h6 class="flex-grow-1 bd-highlight">Data Pengguna</h6>
                        <button type="button" class="btn btn-primary ms-2 bd-highlight" data-bs-toggle="modal"
                            data-bs-target="#tambah-pengguna">Tambah Pengguna</button>
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
                                            Username</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Peran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Dibuat</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($pengguna)) : ?>
                                    <?php $no = 1; foreach ($pengguna as $user) : ?>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $no++; ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['username']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['email']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['peran']; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?= date('d F Y', strtotime($user['created_at'])); ?>

                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="text-warning font-weight-bold text-xs"
                                                data-bs-toggle="modal" data-bs-target="#modal-edit<?= $user['id']; ?>"
                                                target="_blank">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('Admin/hapusPengguna/' . $user['id']); ?>"
                                                onclick="return confirm('Apakah anda yakin?')"
                                                class="text-danger font-weight-bold text-xs ms-3" data-toggle="tooltip">
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
                            <?= $pager->links('pengguna', 'pagination') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="tambah-pengguna" tabindex="-1" aria-labelledby="modalTambahLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('Admin/tambahPengguna'); ?>">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="peran" name="peran" required>
                                    <option value="pencari_kerja">Pencari Kerja</option>
                                    <option value="perusahaan">Perusahaan</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <label for="peran">Peran</label>
                            </div>
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <label for="password">Password</label>
                                <span class="cursor-pointer position-absolute top-50 end-0 translate-middle-y me-3"
                                    onclick="togglePassword('password')">
                                    <i class="bi bi-eye" id="toggle-password-icon-password"></i>
                                </span>
                            </div>
                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="confpassword" name="confpassword"
                                    required>
                                <label for="confpassword">Konfirmasi Password</label>
                                <span class="cursor-pointer position-absolute top-50 end-0 translate-middle-y me-3"
                                    onclick="togglePassword('confpassword')">
                                    <i class="bi bi-eye" id="toggle-password-icon-confpassword"></i>
                                </span>
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

        <script>
            function togglePassword(fieldId) {
                const passwordField = document.getElementById(fieldId);
                const icon = document.getElementById(`toggle-password-icon-${fieldId}`);

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    passwordField.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                }
            }
        </script>

        <!-- End Modal Tambah -->

        <!-- Modal Edit -->
        <?php if (!empty($pengguna)) : ?>
        <?php foreach ($pengguna as $edit) { ?>
        <div class="modal fade" id="modal-edit<?= $edit['id']; ?>" tabindex="-1" aria-labelledby="modalEditLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edit Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?= base_url('Admin/editPengguna/' . $edit['id']); ?>">
                            <?= csrf_field(); ?>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?= $edit['email']; ?>" required>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?= $edit['username']; ?>" required>
                                <label for="username">Username</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="peran" name="peran" required>
                                    <option value="pencari_kerja"
                                        <?= $edit['peran'] == 'pencari_kerja' ? 'selected' : ''; ?>>Pencari Kerja
                                    </option>
                                    <option value="perusahaan" <?= $edit['peran'] == 'perusahaan' ? 'selected' : ''; ?>>
                                        Perusahaan</option>
                                    <option value="admin" <?= $edit['peran'] == 'admin' ? 'selected' : ''; ?>>Admin
                                    </option>
                                </select>
                                <label for="peran">Peran</label>
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="new_password" name="new_password">
                                <label for="new_password">Password Baru (opsional)</label>
                                <span class="cursor-pointer position-absolute top-50 end-0 translate-middle-y me-3"
                                    onclick="togglePassword('new_password')">
                                    <i class="bi bi-eye" id="toggle-password-icon-new_password"></i>
                                </span>
                            </div>

                            <div class="form-floating mb-3 position-relative">
                                <input type="password" class="form-control" id="conf_password" name="conf_password">
                                <label for="conf_password">Konfirmasi Password Baru</label>
                                <span class="cursor-pointer position-absolute top-50 end-0 translate-middle-y me-3"
                                    onclick="togglePassword('conf_password')">
                                    <i class="bi bi-eye" id="toggle-password-icon-conf_password"></i>
                                </span>
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

        <script>
            function togglePassword(fieldId) {
                const passwordField = document.getElementById(fieldId);
                const icon = document.getElementById(`toggle-password-icon-${fieldId}`);

                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                } else {
                    passwordField.type = "password";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                }
            }
        </script>

        <!-- End Modal Edit -->
    </div>
</main>
<?= $this->endSection(); ?>