<?php

namespace App\Models;

use CodeIgniter\Model;

class PencariKerjaModel extends Model
{
    protected $table = 'pencari_kerja';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_pengguna', 'nama', 'alamat', 'no_hp'];

    public function getProfilById($id_pengguna)
    {
        return $this->select('pengguna.id, pengguna.email, pengguna.username, pengguna.foto, pencari_kerja.*')
                    ->join('pengguna', 'pengguna.id = pencari_kerja.id_pengguna')
                    ->where('pengguna.id', $id_pengguna)
                    ->first();
    }
}
