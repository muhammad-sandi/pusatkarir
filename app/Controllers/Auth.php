<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\PencariKerjaModel;

class Auth extends BaseController
{
    public function daftar()
    {
        // Include helper form
        helper(['form']);
        $data = [];
        echo view('auth/daftar', $data); // View file dalam folder "auth"
    }

    public function prosesDaftar()
    {
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
            'email'    => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'peran'    => $this->request->getVar('peran'),
            'foto'    => 'default.png'
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
                'nama' => $this->request->getVar('nama')
            ];
            $pencariKerjaModel->save($dataPencariKerja);
        }

        return redirect()->to('/auth/masuk')->with('success', 'Registrasi berhasil, silakan masuk.');
    } else {
        $data['validation'] = $this->validator;
        echo view('auth/daftar', $data); // Jika gagal, kembali ke halaman daftar dengan error
    }
    }


    public function masuk()
    {
        helper(['form']);
        echo view('auth/masuk');
    } 
 
    public function prosesMasuk()
    {
    $session = session();
    $model = new PenggunaModel();

    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');

    // Gunakan metode getPenggunaWithData untuk mendapatkan data lengkap pengguna
    $data = $model->getPenggunaWithData($username);

    if ($data) {
        $pass = $data['password'];
        $verify_pass = password_verify($password, $pass);

        if ($verify_pass) {
            // Buat data sesi dengan id_perusahaan
            $ses_data = [
                'id'            => $data['id'],
                'email'         => $data['email'],
                'username'      => $data['username'],
                'peran'         => $data['peran'],
                'foto'          => $data['foto'],
                'id_pencari_kerja' => $data['id_pencari_kerja'],
                'id_perusahaan' => $data['id_perusahaan'],
                'nama_perusahaan' => $data['nama_perusahaan'],
                'logged_in'     => TRUE
            ];

            $session->set($ses_data);

            // Redirect berdasarkan peran
            if ($data['peran'] == 'pencari_kerja') {
                return redirect()->to('/home');
            } elseif ($data['peran'] == 'admin') {
                return redirect()->to('/admin');
            } elseif ($data['peran'] == 'perusahaan') {
                return redirect()->to('/perusahaan');
            }
        } else {
            $session->setFlashdata('msg', 'Password Salah');
            return redirect()->to('auth/masuk');
        }
    } else {
        $session->setFlashdata('msg', 'Username Tidak Ditemukan');
        return redirect()->to('auth/masuk');
    }
    }

    public function keluar()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/home');
    }
}
