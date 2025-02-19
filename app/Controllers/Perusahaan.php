<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LowonganModel;
use App\Models\PenggunaModel;
use App\Models\LamaranModel;

class Perusahaan extends BaseController
{
    protected $lowonganModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->lowonganModel = new LowonganModel();
        $this->penggunaModel = new penggunaModel();
    }

    public function index()
    {
        // Pastikan hanya perusahaan yang dapat mengakses
        if (session()->get('peran') !== 'perusahaan') {
            return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
        }

        return view('Perusahaan/dashboard');
    }

    public function lowongan()
    {
    // Pastikan hanya perusahaan yang dapat mengakses
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    $session = session();
    $id_perusahaan = $session->get('id_perusahaan'); // Ambil id_perusahaan dari sesi

    if (!$id_perusahaan) {
        return redirect()->to('/auth/masuk'); // Redirect jika tidak ada sesi perusahaan
    }

    // Ambil data lowongan berdasarkan id_perusahaan
    $data['lowongan'] = $this->lowonganModel->getLowonganByPerusahaanId($id_perusahaan);
    
    return view('Perusahaan/lowongan', $data);
    }

    public function tambahLowongan()
{
    $session = session();
    $id_perusahaan = $session->get('id_perusahaan');

    if (!$id_perusahaan) {
        return redirect()->to('/auth/masuk')->with('error', 'Anda harus login sebagai perusahaan untuk menambahkan lowongan.');
    }

    $poster = $this->request->getFile('poster');

    // Simpan file ke folder khusus untuk poster
    $posterName = $poster->getRandomName();
    $poster->move(ROOTPATH . 'public/uploads/poster', $posterName);

    // Path file yang baru saja diunggah
    $posterPath = ROOTPATH . 'public/uploads/poster/' . $posterName;

    // Atur rasio 1:1 menggunakan Image Manipulation
    $image = \Config\Services::image()
        ->withFile($posterPath)
        ->fit(500, 500, 'center') // Atur ukuran dan rasio 1:1
        ->save($posterPath); // Simpan kembali file yang sudah diubah

    $this->lowonganModel->save([
        'id_perusahaan'   => $id_perusahaan,
        'judul'           => $this->request->getPost('judul'),
        'deskripsi'       => $this->request->getPost('deskripsi'),
        'poster'          => $posterName,
        'kualifikasi'     => $this->request->getPost('kualifikasi'),
        'gaji'            => $this->request->getPost('gaji'),
        'tipe_pekerjaan'  => $this->request->getPost('tipe_pekerjaan'),
        'lokasi'          => $this->request->getPost('lokasi'),
        'tanggal_dipasang' => date('Y-m-d'),
        'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
        'batas_lamaran'   => $this->request->getPost('batas_lamaran')
    ]);

    return redirect()->to('/perusahaan/lowongan')->with('success', 'Lowongan berhasil ditambahkan.');
}

public function editLowongan($id)
{
    // Ambil data lowongan lama
    $lowongan = $this->lowonganModel->find($id);

    // Cek apakah ada file poster baru yang diunggah
    $poster = $this->request->getFile('poster');
    if ($poster && $poster->isValid() && !$poster->hasMoved()) {
        // Simpan file baru dengan nama acak
        $posterName = $poster->getRandomName();
        $poster->move(ROOTPATH . 'public/uploads/poster', $posterName);

        // Path file yang baru saja diunggah
        $posterPath = ROOTPATH . 'public/uploads/poster/' . $posterName;

        // Atur rasio 1:1 menggunakan Image Manipulation
        $image = \Config\Services::image()
            ->withFile($posterPath)
            ->fit(500, 500, 'center') // Atur ukuran dan rasio 1:1
            ->save($posterPath); // Simpan kembali file yang sudah diubah
    } else {
        // Tetap gunakan poster lama jika tidak ada file baru
        $posterName = $lowongan['poster'];
    }

    // Update data
    $this->lowonganModel->update($id, [
        'judul'           => $this->request->getPost('judul'),
        'deskripsi'       => $this->request->getPost('deskripsi'),
        'poster'          => $posterName,
        'kualifikasi'     => $this->request->getPost('kualifikasi'),
        'gaji'            => $this->request->getPost('gaji'),
        'tipe_pekerjaan'  => $this->request->getPost('tipe_pekerjaan'),
        'lokasi'          => $this->request->getPost('lokasi'),
        'tanggal_berakhir'=> $this->request->getPost('tanggal_berakhir'),
        'batas_lamaran'   => $this->request->getPost('batas_lamaran')
    ]);

    // Redirect dengan pesan sukses
    return redirect()->to('/perusahaan/lowongan')->with('success', 'Lowongan berhasil diperbarui.');
}

public function hapusLowongan($id)
{
    // Pastikan hanya perusahaan yang dapat mengakses
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    $session = session();
    $id_perusahaan = $session->get('id_perusahaan'); // Ambil id_perusahaan dari sesi

    // Cek apakah lowongan dengan ID tersebut ada dan milik perusahaan yang login
    $lowongan = $this->lowonganModel->where('id', $id)
                                     ->where('id_perusahaan', $id_perusahaan)
                                     ->first();

    if ($lowongan) {
        // Hapus file poster jika ada
        $posterPath = ROOTPATH . 'public/uploads/poster/' . $lowongan['poster'];
        if (is_file($posterPath)) {
            unlink($posterPath); // Hapus file dari direktori
        }

        // Hapus data lowongan dari database
        $this->lowonganModel->delete($id);

        return redirect()->to('/Perusahaan/lowongan')->with('success', 'Lowongan berhasil dihapus.');
    } else {
        // Jika tidak ditemukan atau bukan milik perusahaan
        return redirect()->to('/Perusahaan/lowongan')->with('error', 'Lowongan tidak ditemukan atau Anda tidak memiliki izin untuk menghapusnya.');
    }
}

public function lihatLamaran($lowongan_id)
{
    $lamaranModel = new LamaranModel();
    $data['lamaran'] = $lamaranModel->getLamaranByLowongan($lowongan_id);

    return view('Perusahaan/lamaran', $data);
}

public function profil()
{
    // Pastikan hanya perusahaan yang dapat mengakses
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    // Ambil username dari sesi
    $username = session()->get('username');

    // Ambil data pengguna dan perusahaan
    $data['profil'] = $this->penggunaModel->getPenggunaWithPerusahaan($username);

    // Periksa apakah data ditemukan
    if (!$data['profil']) {
        return redirect()->to('/perusahaan/dashboard')->with('error', 'Profil tidak ditemukan.');
    }

    return view('Perusahaan/profil', $data);
}

public function terimaLamaran($id)
{
    // Pastikan hanya perusahaan yang dapat mengakses
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    $lamaranModel = new LamaranModel();

    $keterangan = $this->request->getPost('keterangan');
    $id_lowongan = $this->request->getPost('id_lowongan');

    $data = [
        'status'     => 'Diterima',
        'keterangan' => $keterangan,
    ];

    $lamaranModel->update($id, $data);

    // Redirect kembali ke halaman daftar lamaran dengan membawa id_lowongan
    return redirect()->to(base_url('Perusahaan/lihatLamaran/'.$id_lowongan))->with('success', 'Lamaran berhasil diterima.');
}

public function tolakLamaran($id)
{
    // Pastikan hanya perusahaan yang dapat mengakses
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    $lamaranModel = new LamaranModel();

    $keterangan = $this->request->getPost('keterangan');
    $id_lowongan = $this->request->getPost('id_lowongan');

    $data = [
        'status'     => 'Ditolak',
        'keterangan' => $keterangan,
    ];

    $lamaranModel->update($id, $data);

    // Redirect kembali ke halaman daftar lamaran dengan membawa id_lowongan
    return redirect()->to(base_url('Perusahaan/lihatLamaran/'.$id_lowongan))->with('success', 'Lamaran berhasil ditolak.');
}



}
