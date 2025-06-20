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

    public function getLowongan()
    {
    return $this->db->table('lowongan')
        ->select('lowongan.*, perusahaan.nama_perusahaan')
        ->join('perusahaan', 'perusahaan.id = lowongan.id_perusahaan')
        ->get()
        ->getResultArray();
    }


    public function getLowonganByPerusahaan()
    {
    return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak, pengguna.foto')
                ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                ->join('pengguna', 'perusahaan.id_pengguna = pengguna.id')
                ->where('lowongan.tanggal_berakhir >=', date('Y-m-d'))
                ->where('lowongan.batas_lamaran >', 0)
                ->orderBy('lowongan.tanggal_dipasang', 'DESC')
                ->limit(6)
                ->findAll();
    }
    
    public function getLowonganMagangByPerusahaan()
    {
    return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak, pengguna.foto')
                ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                ->join('pengguna', 'perusahaan.id_pengguna = pengguna.id')
                ->where('lowongan.tipe_pekerjaan', 'Magang')
                ->where('lowongan.tanggal_berakhir >=', date('Y-m-d'))
                ->where('lowongan.batas_lamaran >', 0)
                ->orderBy('lowongan.tanggal_dipasang', 'DESC')
                ->limit(6)
                ->findAll();
    }

    public function getLowonganByPerusahaanAll()
    {
    return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak, pengguna.foto')
                ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                ->join('pengguna', 'perusahaan.id_pengguna = pengguna.id')
                ->where('lowongan.tanggal_berakhir >=', date('Y-m-d'))
                ->where('lowongan.batas_lamaran >', 0)
                ->orderBy('lowongan.tanggal_dipasang', 'DESC')
                ->findAll();
    }

    public function getLowonganMagangByPerusahaanAll()
    {
    return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak, pengguna.foto')
                ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                ->join('pengguna', 'perusahaan.id_pengguna = pengguna.id')
                ->where('lowongan.tipe_pekerjaan', 'Magang')
                ->where('lowongan.tanggal_berakhir >=', date('Y-m-d'))
                ->where('lowongan.batas_lamaran >', 0)
                ->orderBy('lowongan.tanggal_dipasang', 'DESC')
                ->findAll();
    }

    public function getLowonganById($id)
    {
        return $this->select('lowongan.*, perusahaan.nama_perusahaan, perusahaan.deskripsi_perusahaan, perusahaan.alamat, perusahaan.industri, perusahaan.kontak, pengguna.foto')
                    ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
                    ->join('pengguna', 'pengguna.id = perusahaan.id_pengguna')
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

    // Filter: Hanya yang masih aktif dan masih ada kuota
    $builder->where('lowongan.tanggal_berakhir >=', date('Y-m-d'));
    $builder->where('lowongan.batas_lamaran >', 0);

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
