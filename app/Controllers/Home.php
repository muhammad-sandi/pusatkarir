<?php

namespace App\Controllers;
use App\Models\LowonganModel;
use App\Models\LamaranModel;
use App\Models\PencariKerjaModel;
use App\Models\PenggunaModel;

class Home extends BaseController
{
    protected $lowonganModel;
    protected $lamaranModel;
    protected $pencariKerjaModel;
    protected $penggunaModel;

    public function __construct()
    {
        $this->lowonganModel = new LowonganModel();
        $this->lamaranModel = new LamaranModel();
        $this->pencariKerjaModel = new PencariKerjaModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index(): string
    {
        $data['lowongan'] = $this->lowonganModel->getLowonganByPerusahaan();
        $data['lowonganmagang'] = $this->lowonganModel->getLowonganMagangByPerusahaan();
        return view('Publik/home', $data);
    }

    public function detailLowongan($id)
    {
    $lowonganModel = new LowonganModel();
    $lowongan = $lowonganModel->getLowonganById($id);

    if (!$lowongan) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Lowongan tidak ditemukan.');
    }

    $data = [
        'lowongan' => $lowongan
    ];

    return view('Publik/detaillowongan', $data); // Pastikan view sesuai dengan struktur folder Anda
    }
    
    public function lamarLowongan()
{
    if (session()->get('peran') !== 'pencari_kerja') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk pencari kerja.');
    }

    $idLowongan = $this->request->getPost('id_lowongan');
    
    // Ambil data lowongan
    $lowonganModel = new LowonganModel();
    $lowongan = $lowonganModel->find($idLowongan);

    if (!$lowongan) {
        return redirect()->back()->with('error', 'Lowongan tidak ditemukan.');
    }

    // Cek apakah batas lamaran masih tersedia
    if ($lowongan['batas_lamaran'] <= 0) {
        return redirect()->back()->with('error', 'Maaf, batas lamaran sudah habis.');
    }

    // 🔥 Cek apakah pencari kerja sudah melamar di lowongan ini
    $lamaranModel = new LamaranModel();
    $existingLamaran = $lamaranModel
        ->where('id_lowongan', $idLowongan)
        ->where('id_pencari_kerja', session()->get('id_pencari_kerja'))
        ->first();

    if ($existingLamaran) {
        return redirect()->back()->with('error', 'Maaf, Anda sudah pernah melamar di perusahaan ini.');
    }

    // Ambil file CV & Surat Lamaran
    $cv = $this->request->getFile('cv');
    $suratLamaran = $this->request->getFile('surat_lamaran');

    if (!$cv->isValid() || $cv->hasMoved()) {
        return redirect()->back()->with('error', 'File CV tidak valid atau sudah dipindahkan.');
    }

    if (!$suratLamaran->isValid() || $suratLamaran->hasMoved()) {
        return redirect()->back()->with('error', 'File Surat Lamaran tidak valid atau sudah dipindahkan.');
    }

    $allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    
    if (!in_array($cv->getMimeType(), $allowedTypes) || !in_array($suratLamaran->getMimeType(), $allowedTypes)) {
        return redirect()->back()->with('error', 'Format file harus PDF, DOC, atau DOCX.');
    }

    if ($cv->getSize() > 2048000 || $suratLamaran->getSize() > 2048000) {
        return redirect()->back()->with('error', 'Ukuran file tidak boleh lebih dari 2MB.');
    }

    $cvName = $cv->getRandomName();
    $suratName = $suratLamaran->getRandomName();
    
    $cv->move(ROOTPATH . 'public/uploads/cv', $cvName);
    $suratLamaran->move(ROOTPATH . 'public/uploads/surat_lamaran', $suratName);

    // Simpan data lamaran
    $data = [
        'id_lowongan' => $idLowongan,
        'id_pencari_kerja' => session()->get('id_pencari_kerja'),
        'cv' => $cvName,
        'surat_lamaran' => $suratName,
        'pendidikan' => $this->request->getPost('pendidikan'),
        'keahlian' => $this->request->getPost('keahlian'),
        'pengalaman_kerja' => $this->request->getPost('pengalaman_kerja'),
        'status' => 'Diajukan',
        'tanggal_lamaran' => date('Y-m-d H:i:s'),
        'keterangan' => 'Lamaran anda sedang diajukan ke perusahaan terkait.',
    ];
    $lamaranModel->save($data);

    // Kurangi batas lamaran
    $lowonganModel->update($idLowongan, ['batas_lamaran' => $lowongan['batas_lamaran'] - 1]);

    return redirect()->to('/home/detaillowongan/' . $idLowongan)
                     ->with('success', 'Lamaran berhasil dikirim.');
}

public function search()
{
    $keyword = $this->request->getGet('search'); // Ambil input pencarian dari form
    
    // Panggil model untuk mendapatkan data lowongan berdasarkan keyword
    $lowonganModel = new \App\Models\LowonganModel();
    $lowongan = $lowonganModel->getLowonganBySearching($keyword);
    
    // Kirim data ke view
    return view('publik/hasil_pencarian', ['lowongan' => $lowongan, 'keyword' => $keyword]);
}

public function profil()
{
    if (session()->get('peran') !== 'pencari_kerja') {
        return redirect()->to('/auth/masuk')->with('error', 'Akses hanya untuk pencari kerja.');
    }

    $id_pengguna = session()->get('id');

    // Ambil data profil pencari kerja
    $data['profil'] = $this->pencariKerjaModel->getProfilById($id_pengguna);

    return view('Publik/profil', $data);
}

public function ubahProfil()
    {
        $penggunaModel = new PenggunaModel();
        $pencariKerjaModel = new PencariKerjaModel();
        
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');
        
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
        $pencariKerjaModel->where('id_pengguna', $id_pengguna)->set([
            'nama' => $nama,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
        ])->update();
        
        return redirect()->to('/Home/profil')->with('success', 'Profil berhasil diperbarui.');
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

        return redirect()->to('/Home/profil')->with('success', 'Password berhasil diperbarui.');
    } else {
        return redirect()->to('/Home/profil')->with('error', 'Gagal memperbarui password. Pastikan isian benar.');
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

}
