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
        Argon Dashboard 2 by Creative Tim
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
        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profil</li>
                    </ol>
                    <h6 class="text-white font-weight-bolder ms-2">Profil</h6>
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
                                        href="<?= base_url('Auth/keluar')?>" role="tab"
                                        aria-selected="false">
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
                <div class="col-md-8">
                    <form action="/Home/ubahProfil" method="post">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Edit Profil</p>
                                    <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Informasi Pengguna</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Nama Lengkap</label>
                                            <input class="form-control" type="text" name="nama"
                                                value="<?= $profil['nama'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Username</label>
                                            <input class="form-control" type="text" name="username"
                                                value="<?= $profil['username'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email</label>
                                            <input class="form-control" type="email" name="email"
                                                value="<?= $profil['email'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Alamat</label>
                                            <input class="form-control" type="alamat" name="alamat"
                                                value="<?= $profil['alamat'] ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">No. Handphone</label>
                                            <input class="form-control" type="no_hp" name="no_hp"
                                                value="<?= $profil['no_hp'] ?>" required>
                                        </div>
                                    </div>
                                </div>
                    </form>

                    <form action="/Home/ubahPassword" method="post">
                        <hr class="horizontal dark">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Ubah Password</p>
                            <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="position-relative">
                                        <input class="form-control pe-5" type="password" name="password"
                                            placeholder="Masukkan Password Baru" id="password">
                                        <span
                                            class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
                                            onclick="togglePassword('password')">
                                            <i class="bi bi-eye" id="toggle-password-icon-password"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Konfirmasi Password</label>
                                    <div class="position-relative">
                                        <input class="form-control pe-5" type="password" name="confpassword"
                                            placeholder="Konfirmasi Password Baru" id="confpassword">
                                        <span
                                            class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
                                            onclick="togglePassword('confpassword')">
                                            <i class="bi bi-eye" id="toggle-password-icon-confpassword"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function togglePassword(id) {
                                    let input = document.getElementById(id);
                                    let icon = document.getElementById(`toggle-password-icon-${id}`);

                                    if (input.type === "password") {
                                        input.type = "text";
                                        icon.classList.remove("bi-eye");
                                        icon.classList.add("bi-eye-slash");
                                    } else {
                                        input.type = "password";
                                        icon.classList.remove("bi-eye-slash");
                                        icon.classList.add("bi-eye");
                                    }
                                }
                            </script>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg position-relative overflow-hidden"
                style="border-radius: 15px; background: linear-gradient(135deg, rgba(255,255,255,0.6), rgba(255,255,255,0.8)); backdrop-filter: blur(10px); border: 1px solid rgba(0, 0, 0, 0.2); box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
                <div class=" text-center bg-transparent position-relative" style="border-radius: 15px 15px 0 0;">
                    <h5 class="fw-bold mt-4 text-dark">🌟 Info Harian 🌟</h5>
                </div>
                <div class="card-body position-relative text-dark">
                    <!-- Waktu & Tanggal -->
                    <div class="text-center mb-2">
                        <i class="fas fa-clock fa-3x text-warning glow-icon"></i>
                        <h6 class="mt-2 fw-bold">Waktu Sekarang</h6>
                        <p id="jam" class="display-6 fw-bold glow-text"></p>
                        <p id="tanggal" class="small glow-text"></p>
                    </div>
                    <hr class="glow-line">

                    <!-- Lokasi -->
                    <div class="text-center mb-2">
                        <i class="fas fa-map-marker-alt fa-3x text-danger glow-icon"></i>
                        <h6 class="mt-2 fw-bold">Lokasi Anda</h6>
                        <p id="lokasi" class="small fst-italic glow-text">Memuat lokasi...</p>
                    </div>
                    <hr class="glow-line">

                    <!-- Fakta Menarik -->
                    <div class="text-center mb-2">
                        <i class="fas fa-lightbulb fa-3x text-warning glow-icon"></i>
                        <h6 class="mt-2 fw-bold">Fakta Menarik</h6>
                        <p id="fakta" class="small fst-italic glow-text">Memuat fakta...</p>
                    </div>
                    <hr class="glow-line">

                    <!-- Kata Motivasi -->
                    <div class="text-center">
                        <i class="fas fa-quote-left fa-3x text-success glow-icon"></i>
                        <h6 class="mt-2 fw-bold">Motivasi Hari Ini</h6>
                        <p id="motivasi" class="small fw-bold glow-text">Mengambil inspirasi...</p>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .glow-icon {
                text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
            }

            .glow-text {
                color: #333;
                /* Warna teks gelap */
                text-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }

            .glow-line {
                border: none;
                height: 2px;
                background: linear-gradient(to right, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));
                margin: 10px 0;
            }
        </style>

        <script>
            function updateJam() {
                let now = new Date();
                let jam = now.getHours().toString().padStart(2, '0');
                let menit = now.getMinutes().toString().padStart(2, '0');
                let detik = now.getSeconds().toString().padStart(2, '0');
                document.getElementById("jam").innerHTML = `${jam}:${menit}:${detik}`;

                let hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                let bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                    "September", "Oktober", "November", "Desember"
                ];
                let tanggal =
                    `${hari[now.getDay()]}, ${now.getDate()} ${bulan[now.getMonth()]} ${now.getFullYear()}`;
                document.getElementById("tanggal").innerHTML = tanggal;
            }
            setInterval(updateJam, 1000);
            updateJam();

            function getLokasi() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(position => {
                        let latitude = position.coords.latitude;
                        let longitude = position.coords.longitude;
                        fetch(
                                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`
                            )
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById("lokasi").innerHTML = data.display_name ||
                                    "Tidak ditemukan";
                            })
                            .catch(() => {
                                document.getElementById("lokasi").innerHTML =
                                    "Tidak dapat mengambil lokasi";
                            });
                    }, () => {
                        document.getElementById("lokasi").innerHTML = "Akses lokasi ditolak";
                    });
                } else {
                    document.getElementById("lokasi").innerHTML = "Browser tidak mendukung geolokasi";
                }
            }
            getLokasi();

            function getFakta() {
                let faktaList = [
                    "Air zam-zam berasal dari sumur yang telah ada selama lebih dari 4000 tahun.",
                    "Lebah bisa mengenali wajah manusia seperti manusia mengenali wajah satu sama lain.",
                    "Gunung Everest bertambah tinggi sekitar 4mm setiap tahun.",
                    "Hiu tidak memiliki tulang, kerangka mereka terbuat dari tulang rawan.",
                    "Otak manusia lebih aktif saat tidur dibanding saat kita terjaga."
                ];
                let randomFakta = faktaList[Math.floor(Math.random() * faktaList.length)];
                document.getElementById("fakta").innerHTML = randomFakta;
            }
            getFakta();

            function getMotivasi() {
                let motivasiList = [
                    "Jangan menunggu kesempatan, ciptakan kesempatan!",
                    "Setiap langkah kecil yang kamu ambil mendekatkanmu ke tujuan besar.",
                    "Kesuksesan adalah hasil dari ketekunan, bukan keberuntungan.",
                    "Gagal itu biasa, yang luar biasa adalah bangkit lagi setelah gagal.",
                    "Percayalah pada dirimu sendiri, karena kamu lebih kuat dari yang kamu kira."
                ];
                let randomMotivasi = motivasiList[Math.floor(Math.random() * motivasiList.length)];
                document.getElementById("motivasi").innerHTML = `"${randomMotivasi}"`;
            }
            getMotivasi();
        </script>

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