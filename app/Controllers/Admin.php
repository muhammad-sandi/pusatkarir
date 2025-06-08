<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\PencariKerjaModel;
use App\Models\PerusahaanModel;
use App\Models\LaporanMagangModel;
use App\Models\LowonganModel;

class Admin extends BaseController
{
    public function index()
    {
    // Pastikan hanya admin yang dapat mengakses
    if (session()->get('peran') !== 'admin') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
    }

    // Load model
    $userModel = new \App\Models\PenggunaModel();
    $perusahaanModel = new \App\Models\PerusahaanModel();
    $lowonganModel = new \App\Models\LowonganModel();
    $laporanMagangModel = new \App\Models\LaporanMagangModel();

    // Hitung data total
    $data = [
        'jmlPengguna' => $userModel->countAll(),
        'jmlPerusahaan' => $perusahaanModel->countAll(),
        'jmlLowongan' => $lowonganModel->countAll(),
        'jmlLaporanMagang' => $laporanMagangModel->countAll(),
    ];

    // Ambil data lowongan per bulan untuk tahun berjalan (2025 misal)
    $tahunIni = date('Y');
    $db = \Config\Database::connect();
    $builder = $db->table('lowongan');

    $builder->select("MONTH(tanggal_dipasang) as bulan, COUNT(*) as total");
    $builder->where("YEAR(tanggal_dipasang)", $tahunIni);
    $builder->groupBy("bulan");
    $builder->orderBy("bulan", "ASC");

    $query = $builder->get()->getResultArray();

    // Inisialisasi array 12 bulan dengan 0
    $bulan = [];
    $jumlah = [];
    for ($i = 1; $i <= 12; $i++) {
        $bulan[$i] = date('F', mktime(0, 0, 0, $i, 10)); // Nama bulan Januari, Februari, dst
        $jumlah[$i] = 0;
    }

    // Isi data jumlah dari query
    foreach ($query as $row) {
        $jumlah[(int)$row['bulan']] = (int)$row['total'];
    }

    // Ambil nilai dan label untuk chart
    $data['bulan'] = json_encode(array_values($bulan)); // supaya index dimulai dari 0
    $data['jumlah'] = json_encode(array_values($jumlah));

    // Tampilkan halaman dashboard admin dengan data
    return view('Admin/dashboard', $data);
    }


    public function pengguna()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (session()->get('peran') !== 'admin') {
            return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
        }

        // Load model
        $penggunaModel = new PenggunaModel();

        // Ambil data pengguna
        $data['pengguna'] = $penggunaModel->paginate(10, 'pengguna'); // 10 data per halaman
        $data['pager'] = $penggunaModel->pager;


        // Kirim data ke view
        return view('Admin/pengguna', $data);
    }

    public function perusahaan()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (session()->get('peran') !== 'admin') {
            return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
        }

        // Load model
        $perusahaanModel = new PerusahaanModel();

        // Ambil data pengguna
        $data['perusahaan'] = $perusahaanModel->paginate(10, 'perusahaan'); // 10 data per halaman
        $data['pager'] = $perusahaanModel->pager;

        // Kirim data ke view
        return view('Admin/perusahaan', $data);
    }

    public function tambahPengguna()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (session()->get('peran') !== 'admin') {
            return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
        }

        // Include helper form
        helper(['form']);

        // Set rules untuk validasi form
        $rules = [
            'email'         => 'required|valid_email|is_unique[pengguna.email]',
            'username'      => 'required|min_length[3]|is_unique[pengguna.username]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'required|matches[password]',
            'peran'         => 'required|in_list[pencari_kerja,perusahaan,admin]'
        ];

        if ($this->validate($rules)) {
            $penggunaModel = new PenggunaModel();
            $dataPengguna = [
                'email'    => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'peran'    => $this->request->getPost('peran'),
                'foto'    => $this->request->getPost('foto'),
            ];

            // Simpan data ke tabel pengguna
            $penggunaModel->save($dataPengguna);

            // Dapatkan ID pengguna yang baru saja disimpan
            $idPengguna = $penggunaModel->insertID();

            // Jika peran adalah pencari kerja, tambahkan ke tabel pencari_kerja
            if ($dataPengguna['peran'] === 'pencari_kerja') {
                $pencariKerjaModel = new PencariKerjaModel();
                $dataPencariKerja = [
                    'id_pengguna' => $idPengguna,
                    'nama' => $this->request->getPost('username')
                ];
                $pencariKerjaModel->save($dataPencariKerja);
            }

            // Jika peran adalah perusahaan, tambahkan ke tabel perusahaan
            if ($dataPengguna['peran'] === 'perusahaan') {
                $perusahaanModel = new PerusahaanModel();
                $dataPerusahaan = [
                    'id_pengguna' => $idPengguna,
                    'nama_perusahaan' => $this->request->getPost('username')
                ];
                $perusahaanModel->save($dataPerusahaan);
            }

            // Redirect ke halaman pengguna setelah berhasil
            return redirect()->to('/admin/pengguna')->with('success', 'Pengguna berhasil ditambahkan.');
        } else {
            $data['validation'] = $this->validator;
            echo view('admin/pengguna', $data); // Jika gagal, kembali ke halaman daftar dengan error
        }
    }

    public function editPengguna($id)
    {
        // Pastikan hanya admin yang dapat mengakses
        if (session()->get('peran') !== 'admin') {
            return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
        }

        helper(['form']);

        $rules = [
            'email'         => "required|valid_email|is_unique[pengguna.email,id,{$id}]",
            'username'      => "required|min_length[3]|is_unique[pengguna.username,id,{$id}]",
            'peran'         => 'required|in_list[pencari_kerja,perusahaan,admin]',
            'conf_password' => 'matches[new_password]',
        ];

        if ($this->validate($rules)) {
            $penggunaModel = new PenggunaModel();

            // Ambil data yang akan di-update
            $dataPengguna = [
                'email'    => $this->request->getPost('email'),
                'username' => $this->request->getPost('username'),
                'peran'    => $this->request->getPost('peran'),
            ];

            // Periksa apakah password baru diisi
            $newPassword = $this->request->getPost('new_password');
            if (!empty($newPassword)) {
                $dataPengguna['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
            }

            // Update data pengguna
            $penggunaModel->update($id, $dataPengguna);

            return redirect()->to('/admin/pengguna')->with('success', 'Pengguna berhasil diperbarui.');
        } else {
            $data['validation'] = $this->validator;
            $data['pengguna'] = (new PenggunaModel())->find($id);

            return view('admin/pengguna', $data);
        }
    }

    public function lowongan()
    {
    // Pastikan hanya admin yang dapat mengakses
    if (session()->get('peran') !== 'admin') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
    }

    // Inisialisasi model dulu
    $lowonganModel = new \App\Models\LowonganModel();

    // Ambil semua data lowongan
    $data['lowongan'] = $lowonganModel->getLowongan();

    // Tampilkan view
    return view('Admin/lowongan', $data);
    }

    public function lapranMagang()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (session()->get('peran') !== 'admin') {
            return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk admin.');
        }

        // Load model
        $laporanMagangModel = new LaporanMagangModel();

        // Ambil data pengguna
        $data['laporan'] = $laporanMagangModel->paginate(10, 'laporan'); // 10 data per halaman
        $data['pager'] = $laporanMagangModel->pager;

        // Kirim data ke view
        return view('Admin/laporanmagang', $data);
    }
}
