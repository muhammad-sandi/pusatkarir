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
}
