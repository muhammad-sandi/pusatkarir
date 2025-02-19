<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'password', 'peran', 'foto', 'tanggal_dibuat'];
    protected $useTimestamps = true;

    public function getPengguna()
    {
        return $this->findAll();
    }

    public function getPenggunaWithData($username)
    {
        return $this->select('pengguna.*, perusahaan.id as id_perusahaan, perusahaan.nama_perusahaan, pencari_kerja.id as id_pencari_kerja')
                ->join('perusahaan', 'pengguna.id = perusahaan.id_pengguna', 'left')
                ->join('pencari_kerja', 'pengguna.id = pencari_kerja.id_pengguna', 'left')
                ->where('pengguna.username', $username)
                ->first();
    }

    // public function getPenggunaWithPencaker($username)
    // {
    //     return $this->select('pengguna.*, pencari_kerja.id as id_pencari_kerja')
    //             ->join('pencari_kerja', 'pengguna.id = pencari_kerja.id_pengguna')
    //             ->where('pengguna.username', $username)
    //             ->first();
    // }
}
