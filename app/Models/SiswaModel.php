<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model {

  protected $table = 'siswa';
  protected $primaryKey = 'nis';
  protected $allowedFields = ['nis', 'nama', 'id_kelas', 'angkatan'];

}