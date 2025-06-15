<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\LowonganModel;
use App\Models\PenggunaModel;
use App\Models\PerusahaanModel;
use App\Models\LamaranModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Perusahaan extends BaseController
{
    protected $lowonganModel;
    protected $penggunaModel;
    protected $perusahaanModel;

    public function __construct()
    {
        $this->lowonganModel = new LowonganModel();
        $this->penggunaModel = new penggunaModel();
        $this->perusahaanModel = new perusahaanModel();
    }

    public function index()
    {
    // Pastikan hanya perusahaan yang dapat mengakses
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    $idPerusahaan = session()->get('id_perusahaan'); // id perusahaan

    // Load model
    $lowonganModel = new \App\Models\LowonganModel();
    $lamaranModel = new \App\Models\LamaranModel();
    $db = \Config\Database::connect();

    // Jumlah lowongan oleh perusahaan ini
    $jmlLowongan = $lowonganModel
        ->where('id_perusahaan', $idPerusahaan)
        ->countAllResults();

    // Jumlah lamaran untuk lowongan milik perusahaan ini
    $jmlLamaran = $lamaranModel
        ->join('lowongan', 'lowongan.id = lamaran.id_lowongan')
        ->where('lowongan.id_perusahaan', $idPerusahaan)
        ->countAllResults();

    // Jumlah laporan magang (JOIN: laporan_magang → lamaran → lowongan)
    $jmlLaporan = $db->table('laporan_magang')
        ->join('lamaran', 'laporan_magang.id_lamaran = lamaran.id')
        ->join('lowongan', 'lowongan.id = lamaran.id_lowongan')
        ->where('lowongan.id_perusahaan', $idPerusahaan)
        ->countAllResults();

    // Ambil data pelamar per bulan (chart)
    $builder = $db->table('lamaran');
    $builder->select("MONTH(lamaran.tanggal_lamaran) as bulan, COUNT(*) as total");
    $builder->join('lowongan', 'lowongan.id = lamaran.id_lowongan');
    $builder->where('lowongan.id_perusahaan', $idPerusahaan);
    $builder->groupBy("MONTH(lamaran.tanggal_lamaran)");
    $builder->orderBy("bulan", "ASC");
    $query = $builder->get()->getResultArray();

    $bulan = [];
    $jumlah = [];

    foreach ($query as $row) {
        $bulan[] = date('F', mktime(0, 0, 0, $row['bulan'], 10));
        $jumlah[] = (int) $row['total'];
    }

    // Kirim semua data ke view
    $data = [
        'jmlLowongan' => $jmlLowongan,
        'jmlLamaran' => $jmlLamaran,
        'jmlLaporan' => $jmlLaporan,
        'bulan' => json_encode($bulan),
        'jumlah' => json_encode($jumlah),
    ];

    return view('Perusahaan/dashboard', $data);
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

// app/Controllers/Perusahaan.php
public function semuaLamaran()
{
    $idPerusahaan = session()->get('id_perusahaan');

    $lamaranModel = new LamaranModel();
    $data['lamaran'] = $lamaranModel->getLamaranAll($idPerusahaan);
    $data['lowongan_id'] = null;

    return view('Perusahaan/lamaran', $data);
}

    public function exportExcelLamaran()
    {
        // Ambil ID perusahaan dari session
        $idPerusahaan = session()->get('id_perusahaan');
        $lamaranModel = new LamaranModel();
        $dataLamaran = $lamaranModel->getLamaranAll($idPerusahaan);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis Judul (Header) Tabel
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Judul Lowongan');
        $sheet->setCellValue('C1', 'Tipe Pekerjaan');
        $sheet->setCellValue('D1', 'Nama Pelamar');
        $sheet->setCellValue('E1', 'Pendidikan');
        $sheet->setCellValue('F1', 'Keahlian');
        $sheet->setCellValue('G1', 'Pengalaman Kerja');
        $sheet->setCellValue('H1', 'Status');
        $sheet->setCellValue('I1', 'Tanggal Lamaran');

        // Menulis Data ke Setiap Baris
        $column = 2; // Baris awal untuk data
        foreach ($dataLamaran as $key => $data) {
            $sheet->setCellValue('A' . $column, $key + 1);
            $sheet->setCellValue('B' . $column, $data['judul']);
            $sheet->setCellValue('C' . $column, $data['tipe_pekerjaan']);
            $sheet->setCellValue('D' . $column, $data['nama']);
            $sheet->setCellValue('E' . $column, $data['pendidikan']);
            $sheet->setCellValue('F' . $column, $data['keahlian']);
            $sheet->setCellValue('G' . $column, $data['pengalaman_kerja']);
            $sheet->setCellValue('H' . $column, $data['status']);
            $sheet->setCellValue('I' . $column, $data['tanggal_lamaran']);
            $column++;
        }

        // Mengatur Style
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle('A1:I1')->applyFromArray($styleArray);

        // Mengatur Auto-size untuk setiap kolom
        foreach (range('A', 'I') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Menulis file ke output
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Lamaran.xlsx';

        // Mengatur header untuk download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }

public function lihatLamaran($lowongan_id)
{
    $lamaranModel = new LamaranModel();
    $data['lamaran'] = $lamaranModel->getLamaranByLowongan($lowongan_id);
    $data['lowongan_id'] = $lowongan_id;

    return view('Perusahaan/lamaran', $data);
}

public function exportExcelByLowongan($lowongan_id)
{
    $lamaranModel = new LamaranModel();
    // Mengambil data lamaran berdasarkan ID lowongan
    $dataLamaran = $lamaranModel->getLamaranByLowongan($lowongan_id); 

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Menulis Judul (Header) Tabel
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Judul Lowongan');
    $sheet->setCellValue('C1', 'Tipe Pekerjaan');
    $sheet->setCellValue('D1', 'Nama Pelamar');
    $sheet->setCellValue('E1', 'Pendidikan');
    $sheet->setCellValue('F1', 'Keahlian');
    $sheet->setCellValue('G1', 'Pengalaman Kerja');
    $sheet->setCellValue('H1', 'Status');
    $sheet->setCellValue('I1', 'Tanggal Lamaran');

    // Menulis Data ke Setiap Baris
    $column = 2;
    foreach ($dataLamaran as $key => $data) {
        $sheet->setCellValue('A' . $column, $key + 1);
        $sheet->setCellValue('B' . $column, $data['judul']);
        $sheet->setCellValue('C' . $column, $data['tipe_pekerjaan']);
        $sheet->setCellValue('D' . $column, $data['nama']);
        $sheet->setCellValue('E' . $column, $data['pendidikan']);
        $sheet->setCellValue('F' . $column, $data['keahlian']);
        $sheet->setCellValue('G' . $column, $data['pengalaman_kerja']);
        $sheet->setCellValue('H' . $column, $data['status']);
        $sheet->setCellValue('I' . $column, $data['tanggal_lamaran']);
        $column++;
    }

    // (Opsi) Ambil judul lowongan untuk nama file
    $judulLowongan = !empty($dataLamaran) ? $dataLamaran[0]['judul'] : 'Lowongan';
    $fileName = 'Data Lamaran - ' . $judulLowongan . '.xlsx';
    
    // Mengatur Style, Auto-size, dan Header (sama seperti fungsi sebelumnya)
    $styleArray = [
        'font' => ['bold' => true],
        'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
    ];
    $sheet->getStyle('A1:I1')->applyFromArray($styleArray);
    foreach (range('A', 'I') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }
    
    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
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

public function profil()
{
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk pencari kerja.');
    }

    $id_pengguna = session()->get('id');

    // Ambil data profil pencari kerja
    $data['profil'] = $this->perusahaanModel->getProfilById($id_pengguna);

    return view('Perusahaan/profil', $data);
}

public function ubahProfil()
    {
        $penggunaModel = new PenggunaModel();
        $perusahaanModel = new PerusahaanModel();
        
        // Ambil data dari form
        $nama_perusahaan = $this->request->getPost('nama_perusahaan');
        $username = $this->request->getPost('username');
        $deskripsi_perusahaan = $this->request->getPost('deskripsi_perusahaan');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        $kontak = $this->request->getPost('kontak');
        $industri = $this->request->getPost('industri');
        
        // Ambil ID pengguna dari session
        $session = session();
        $id_pengguna = $session->get('id');
        
        if (!$id_pengguna) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        // Update tabel pengguna
        $penggunaModel->update($id_pengguna, [
            'username' => $username,
            'email' => $email,
        ]);
        
        // Update tabel pencari_kerja
        $perusahaanModel->where('id_pengguna', $id_pengguna)->set([
            'nama_perusahaan' => $nama_perusahaan,
            'deskripsi_perusahaan' => $deskripsi_perusahaan,
            'alamat' => $alamat,
            'kontak' => $kontak,
            'industri' => $industri,
            
        ])->update();
        
        return redirect()->to('/Perusahaan/profil')->with('success', 'Profil berhasil diperbarui.');
    }

    public function ubahPassword()
{
    if (!session()->has('id')) {
        return redirect()->to('/auth/masuk')->with('error', 'Silakan login terlebih dahulu.');
    }

    helper(['form']);

    $rules = [
        'password'      => 'required|min_length[6]',
        'confpassword'  => 'required|matches[password]'
    ];

    if ($this->validate($rules)) {
        $penggunaModel = new PenggunaModel();
        $id = session()->get('id');

        $data = [
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];

        // Update password
        $penggunaModel->update($id, $data);

        return redirect()->to('/Perusahaan/profil')->with('success', 'Password berhasil diperbarui.');
    } else {
        return redirect()->to('/Perusahaan/profil')->with('error', 'Gagal memperbarui password. Pastikan isian benar.');
    }
}

public function ubahFotoProfil()
{
    if (!session()->has('id')) {
        return redirect()->to('/auth/masuk')->with('error', 'Silakan login terlebih dahulu.');
    }

    $penggunaModel = new PenggunaModel();
    $id = session()->get('id');

    $validationRule = [
        'foto' => [
            'rules' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'uploaded' => 'Harap pilih gambar.',
                'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'is_image' => 'File harus berupa gambar.',
                'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.',
            ],
        ],
    ];

    if (!$this->validate($validationRule)) {
        return redirect()->back()->with('error', $this->validator->listErrors());
    }

    $file = $this->request->getFile('foto');

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $uploadPath = FCPATH . 'uploads/profil/';

        // Pastikan folder ada
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0775, true);
        }

        // Pindahkan file ke folder tujuan
        if ($file->move($uploadPath, $newName)) {
            $filePath = $uploadPath . $newName;

            // Resize & crop otomatis ke 1:1 (500x500)
            \Config\Services::image()
                ->withFile($filePath)
                ->fit(500, 500, 'center')
                ->save($filePath);

            // Ambil data pengguna untuk cek foto lama
            $user = $penggunaModel->find($id);
            $oldFoto = $user['foto'] ?? 'default.png'; // Default jika tidak ada data

            // Hapus foto lama jika bukan default.png
            if ($oldFoto !== 'default.png' && file_exists($uploadPath . $oldFoto)) {
                unlink($uploadPath . $oldFoto);
            }

            // Simpan nama foto baru ke database
            $penggunaModel->update($id, ['foto' => $newName]);

            // Perbarui sesi
            session()->set('foto', $newName);

            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memindahkan file ke direktori.');
        }
    }

    return redirect()->back()->with('error', 'Gagal mengunggah foto.');
}

public function laporanMagang()
{
    if (session()->get('peran') !== 'perusahaan') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk perusahaan.');
    }

    $laporanMagangModel = new \App\Models\LaporanMagangModel();
    $id_pengguna = session()->get('id');

    $data['laporan'] = $laporanMagangModel->getLaporanByPerusahaan($id_pengguna, 10);
    $data['pager'] = $laporanMagangModel->pager;

    return view('Perusahaan/laporanmagang', $data);
}


}
