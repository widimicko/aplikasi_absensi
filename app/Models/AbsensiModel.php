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
    $query = $builder->get();

    return $query->getResultArray();
  }

  public function getCurrentAbsensi() {
    $builder = $this->db->table('absensi');
    $builder->select('absensi.id as id, absensi.tanggal as tanggal, siswa.nis as nis, siswa.nama as nama, siswa.id_kelas as kelas, absensi.absen as absen, absensi.keterangan as keterangan');
    $builder->join('siswa', 'absensi.id_siswa = siswa.nis');
    $builder->join('semester', 'absensi.id_semester = semester.id');
    $builder->where('semester.status', 'Aktif');
    $query = $builder->get();

    return $query->getResultArray();
  }

  public function getAllRekapData() {
    $sql = "SELECT siswa.nis as nis, siswa.nama as nama, siswa.id_kelas as 'kelas',
      /* ----------- jumlah sakit ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Sakit'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS sakit,

      /* ----------- jumlah ijin ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Ijin'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS ijin,

      /* ----------- jumlah alpa ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Alpha'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS alpha,

      /* ----------- jumlah telat ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Terlambat'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS terlambat

    FROM siswa
    GROUP BY siswa.nis
    ORDER BY siswa.nis ASC;";

    $db = db_connect();
    $query = $db->query($sql);

    return $query->getResult('array');
    
  }

  public function getRekapByKelas($id_kelas, $id_semester) {
    $sql = "SELECT siswa.nis as nis, siswa.nama as nama,
      /* ----------- jumlah sakit ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Sakit'
      AND absensi.id_semester = '$id_semester'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                WHERE siswa.id_kelas = '$id_kelas'
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS sakit,

      /* ----------- jumlah ijin ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Ijin'
      AND absensi.id_semester = '$id_semester'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                WHERE siswa.id_kelas = '$id_kelas'
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS ijin,

      /* ----------- jumlah alpa ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Alpha'
      AND absensi.id_semester = '$id_semester'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                WHERE siswa.id_kelas = '$id_kelas'
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS alpha,

      /* ----------- jumlah telat ------------*/
      IFNULL((SELECT COUNT(absensi.absen)
      from absensi
      WHERE absensi.absen = 'Terlambat'
      AND absensi.id_semester = '$id_semester'
      AND absensi.id_siswa = siswa.nis
      AND absensi.id_siswa IN (SELECT siswa.nis
                FROM siswa
                WHERE siswa.id_kelas = '$id_kelas'
                ORDER BY siswa.nis ASC)
      GROUP BY absensi.id_siswa
      ORDER BY absensi.id_siswa ASC), 0) AS terlambat

    FROM siswa
    WHERE siswa.id_kelas = '$id_kelas'
    GROUP BY siswa.nis
    ORDER BY siswa.nis ASC;";

    $db = db_connect();
    $query = $db->query($sql);

    return $query->getResult('array');
    
  }
}