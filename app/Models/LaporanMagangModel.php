<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanMagangModel extends Model
{
    protected $table            = 'laporan_magang';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id_lamaran', 'judul', 'isi_laporan', 'tanggal_submit'];
    protected $useTimestamps    = true;
    protected $createdField     = 'tanggal_submit';
    protected $updatedField     = ''; // kita gak pakai updated_at

    public function getLaporanByPerusahaan($id_pengguna, $perPage = 10)
{
    return $this->select('laporan_magang.*, pencari_kerja.nama, lowongan.judul AS judul_lowongan')
        ->join('lamaran', 'laporan_magang.id_lamaran = lamaran.id')
        ->join('lowongan', 'lamaran.id_lowongan = lowongan.id')
        ->join('perusahaan', 'lowongan.id_perusahaan = perusahaan.id')
        ->join('pencari_kerja', 'lamaran.id_pencari_kerja = pencari_kerja.id')
        ->where('perusahaan.id_pengguna', $id_pengguna)
        ->orderBy('laporan_magang.tanggal_submit', 'DESC')
        ->paginate($perPage, 'laporan');
}


}
