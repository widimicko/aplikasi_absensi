<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model {

  protected $table = 'absensi';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id', 'id_semester', 'id_siswa', 'tanggal', 'absen', 'keterangan'];

  public function getAllAbsensi() {
    $builder = $this->db->table('absensi');
    $builder->select('absensi.id as id, absensi.tanggal as tanggal, siswa.nis as nis, siswa.nama as nama, siswa.id_kelas as kelas, absensi.absen as absen, absensi.keterangan as keterangan');
    $builder->join('siswa', 'absensi.id_siswa = siswa.nis');
    $builder->join('semester', 'absensi.id_semester = semester.id');
    // $builder->where('semester.status', 'Aktif');
    $query = $builder->get();

    return $query->getResultArray();
  }
}