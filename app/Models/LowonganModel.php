<?php

namespace App\Models;

use CodeIgniter\Model;

class LowonganModel extends Model
{
    protected $table = 'lowongan';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_perusahaan', 'judul', 'deskripsi', 'poster', 'kualifikasi', 
        'gaji', 'tipe_pekerjaan', 'lokasi', 
        'tanggal_dipasang', 'tanggal_berakhir', 'batas_lamaran'
    ];

    public function getLowonganByPerusahaan()
    {
        return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak')
                    ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                    ->findAll();
    }

    public function getLowonganMagangByPerusahaan()
    {
        return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak')
                    ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                    ->where('tipe_pekerjaan', 'Magang')
                    ->findAll();
    }

    public function getLowonganById($id)
    {
        return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak')
                    ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                    ->where('lowongan.id', $id)
                    ->first();
    }

    public function getLowonganByPerusahaanId($id_perusahaan)
    {
        return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak')
                    ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                    ->where('lowongan.id_perusahaan', $id_perusahaan)
                    ->findAll();
    }

    public function getLowonganBySearching($keyword = null)
{
    $builder = $this->db->table('lowongan');
    $builder->select('lowongan.*, perusahaan.nama_perusahaan');
    $builder->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id');

    // Jika ada keyword, tambahkan kondisi pencarian
    if ($keyword) {
        $builder->groupStart()
                ->like('lowongan.judul', $keyword)
                ->orLike('lowongan.deskripsi', $keyword)
                ->orLike('perusahaan.nama_perusahaan', $keyword)
                ->orLike('lowongan.lokasi', $keyword)
                ->orLike('lowongan.tipe_pekerjaan', $keyword)
                ->groupEnd();
    }

    return $builder->get()->getResultArray();
}

}
