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
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Perusahaan</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white font-weight-bold px-0" id="dropdownMenuButton"
              data-bs-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none"><?= ucfirst(session()->get('username')); ?></span>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li>
                <a class="dropdown-item border-radius-md" href="<?= base_url('Perusahaan/profil')?>">
                  <div class="d-flex py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Profil
                      </h6>
                    </div>
                  </div>
                </a>
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
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <!-- Jumlah Lowongan -->
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('perusahaan/lowongan') ?>" style="text-decoration:none;">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Lowongan Saya</p>
                    <h5 class="font-weight-bolder">
                      <?= number_format($jmlLowongan) ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                    <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Jumlah Lamaran -->
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('perusahaan/semualamaran') ?>" style="text-decoration:none;">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Lamaran</p>
                    <h5 class="font-weight-bolder">
                      <?= number_format($jmlLamaran) ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-send text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- Jumlah Laporan Magang -->
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a href="<?= base_url('perusahaan/laporanmagang') ?>" style="text-decoration:none;">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Laporan Magang</p>
                    <h5 class="font-weight-bolder">
                      <?= number_format($jmlLaporan) ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Lamaran per Tahun <?= date('Y') ?></h6>
            <p class="text-sm mb-0">
              <i class="fa fa-arrow-up text-success"></i>
              <span class="font-weight-bold">Statistik Lamaran</span>
            </p>
          </div>
          <div class="card-body p-3">
            <div class="chart">
              <canvas id="chart-lamaran" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="card card-carousel overflow-hidden h-100 p-0">
          <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
            <div class="carousel-inner border-radius-lg h-100">
              <div class="carousel-item h-100 active" style="background-image: url('../argon/img/carousel-1.jpg');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-camera-compact text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Get started with Argon</h5>
                  <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('../argon/img/carousel-2.jpg');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Faster way to create web pages</h5>
                  <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.
                  </p>
                </div>
              </div>
              <div class="carousel-item h-100" style="background-image: url('../argon/img/carousel-3.jpg');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-trophy text-dark opacity-10"></i>
                  </div>
                  <h5 class="text-white mb-1">Share with us your design tips!</h5>
                  <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
  document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chart-lamaran").getContext("2d");

    var chartLamaran = new Chart(ctx, {
      type: "line",
      data: {
        labels: <?= $bulan; ?>, // ["January", "February", ...]
        datasets: [{
          label: "Lamaran per Bulan",
          data: <?= $jumlah; ?>, // [5, 10, 3, ...]
          backgroundColor: "rgba(58, 65, 111, 0.2)", // Primary Argon transparan
          borderColor: "rgba(58, 65, 111, 1)",       // Primary Argon solid
          borderWidth: 2,
          fill: true,
          tension: 0.4,
          pointBackgroundColor: "#fff",
          pointBorderColor: "rgba(58, 65, 111, 1)",
          pointRadius: 4,
          pointHoverRadius: 6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            labels: {
              color: '#344767',
              font: {
                weight: 'bold'
              }
            }
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1,
              color: "#7b809a"
            }
          },
          x: {
            ticks: {
              color: "#7b809a"
            }
          }
        }
      }
    });
  });
</script>

<!-- Pastikan CDN Chart.js dimuat -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?= $this->endSection(); ?>
    <!-- Menutup bagian konten -->