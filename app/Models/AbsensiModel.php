<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model {

  protected $table = 'absensi';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id', 'id_semester', 'id_siswa', 'tanggal', 'absen', 'keterangan'];

}