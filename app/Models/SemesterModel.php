<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model {

  protected $table = 'semester';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $allowedFields = ['id', 'semester', 'status'];

  public function getActiveSemester() {
    $builder = $this->db->table('semester');
    $builder->select('id');
    $builder->where('status', 'Aktif');

    $query = $builder->get();
    return $query->getRow();
  }

}