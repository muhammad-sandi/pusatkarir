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

    public function getRiwayatLamaran($id_pencari_kerja)
{
    return $this->db->table('lamaran')
        ->select('lamaran.id, lamaran.tanggal_lamaran, lamaran.status, lamaran.keterangan, perusahaan.nama_perusahaan, lowongan.judul, lowongan.tipe_pekerjaan, lowongan.lokasi,')
        ->join('lowongan', 'lowongan.id = lamaran.id_lowongan')
        ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
        ->where('lamaran.id_pencari_kerja', $id_pencari_kerja)
        ->orderBy('lamaran.tanggal_lamaran', 'DESC')
        ->get()
        ->getResultArray();
}


}
