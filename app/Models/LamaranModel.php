<?php

namespace App\Models;

use CodeIgniter\Model;

class LamaranModel extends Model
{
    protected $table = 'lamaran';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_lowongan', 'id_pencari_kerja', 'surat_lamaran', 'cv', 'pendidikan', 
        'keahlian', 'pengalaman_kerja', 'status', 'tanggal_lamaran', 'keterangan'
    ];

   public function getLamaranAll($idPerusahaan)
    {
    return $this->select('lamaran.*, lamaran.id AS id_lamaran, lowongan.id AS id_lowongan, pencari_kerja.nama, lowongan.judul, lowongan.tipe_pekerjaan')
                ->join('pencari_kerja', 'lamaran.id_pencari_kerja = pencari_kerja.id')
                ->join('lowongan', 'lamaran.id_lowongan = lowongan.id')
                ->where('lowongan.id_perusahaan', $idPerusahaan)
                ->findAll();
    }

    
    public function getLamaranByLowongan($lowongan_id)
    {
        return $this->select('lamaran.*, lamaran.id AS id_lamaran, lowongan.id AS id_lowongan, pencari_kerja.nama, lowongan.judul, lowongan.tipe_pekerjaan')
                    ->join('pencari_kerja', 'lamaran.id_pencari_kerja = pencari_kerja.id')
                    ->join('lowongan', 'lamaran.id_lowongan = lowongan.id')
                    ->where('lamaran.id_lowongan', $lowongan_id)
                    ->findAll();
    }

}
