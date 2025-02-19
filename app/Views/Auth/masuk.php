<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../argon/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../argon/img/favicon.png">
    <title>
        Argon Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../argon/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../argon/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="../argon/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../argon/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <a href="/" class="btn btn-link p-0" style="font-size: 1.5rem;">
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                    <h4 class="font-weight-bolder">Masuk</h4>
                                    <p class="mb-0">Masukkan username dan password untuk masuk.</p>
                                </div>


                                <div class="card-body">
                                    <?php if(session()->getFlashdata('msg')):?>
                                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                                    <?php endif;?>
                                    <form action="/auth/prosesmasuk" method="post">
                                        <div class="mb-3">
                                            <label for="InputForEmail" class="form-label">Username</label>
                                            <input type="username" name="username" class="form-control"
                                                id="InputForUsername" value="<?= set_value('username') ?>">
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label for="InputForPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="InputForPassword">
                                            <span class="cursor-pointer position-absolute top-50 mt-1 end-0 me-3"
                                                onclick="togglePassword('InputForPassword')">
                                                <i class="bi bi-eye" id="toggle-password-icon-InputForPassword"></i>
                                            </span>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Masuk</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Belum Punya Akun?
                                        <a href="/auth/daftar"
                                            class="text-primary text-gradient font-weight-bold">Daftar</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://img.freepik.com/free-photo/industrial-park-factory-building-warehouse_1417-1932.jpg?t=st=1726423693~exp=1726427293~hmac=af88282ca996c63522643089d7412373fc8ada3a63437b2568e780b7951252a2&w=826');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Halo, Selamat Datang"
                                </h4>
                                <p class="text-white position-relative">Setiap langkah kecil menuju tujuan besar dimulai
                                    dengan langkah pertama. Masuk untuk memulai perjalanan anda hari ini!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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


    <!--   Core JS Files   -->
    <script src="../argon/js/core/popper.min.js"></script>
    <script src="../argon/js/core/bootstrap.min.js"></script>
    <script src="../argon/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../argon/js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="../argon/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>

<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
</script>
</body>

</html>