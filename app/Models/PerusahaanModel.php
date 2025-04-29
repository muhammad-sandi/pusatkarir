<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table = 'perusahaan';
    protected $primaryKey = 'id';
    protected $allowedFields = [	
        'id',
        'id_pengguna',
        'nama_perusahaan',
        'deskripsi_perusahaan',
        'alamat',
        'industri',
        'kontak'
    ];

    public function getProfilById($id_pengguna)
    {
        return $this->select('pengguna.id, pengguna.email, pengguna.username, pengguna.foto, perusahaan.*')
                    ->join('pengguna', 'pengguna.id = perusahaan.id_pengguna')
                    ->where('pengguna.id', $id_pengguna)
                    ->first();
    }
}
