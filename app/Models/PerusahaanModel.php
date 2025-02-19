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
}
