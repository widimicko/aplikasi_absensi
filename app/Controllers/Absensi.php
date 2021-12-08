<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\SemesterModel;
use App\Models\SiswaModel;

class Absensi extends BaseController
{
    protected $absensiModel;
    protected $semesterModel;
    protected $siswaModel;

    public function __construct() {
        $this->absensiModel = new AbsensiModel();
        $this->semesterModel = new SemesterModel();
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $data = [
            'title' => "Absensi",
            'absensi' => $this->absensiModel->getAllAbsensi()
        ];

        return view('absensi/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => "Absensi",
            'siswa' => $this->siswaModel->findAll(),
        ];

        return view('absensi/add', $data);
    }

    public function create()
    {

       // Validate input
        if (!$this->validate([
            'nis' =>  'required',
            'tanggal' => 'required',
            'absen' => 'required',
        ])) {
            session()->setFlashData('tx_error_message', 'Error validasi, perhatikan isian form');
            return redirect()->back()->withInput();
        }

        $siswaAbsen = $this->absensiModel->where('id_siswa', $this->request->getVar('nis'))->where('tanggal', date('Y-m-d', strtotime($this->request->getVar('tanggal'))))->findAll();

        if (!empty($siswaAbsen)) {
            session()->setFlashData('tx_error_message', 'Error, Siswa tersebut sudah absen pada tanggal yang sama');
            return redirect()->back()->withInput();
        }

        $this->absensiModel->insert([
            'id_siswa' => $this->request->getVar('nis'),
            'id_semester' => $this->semesterModel->where('status', 'Aktif')->first()['id'],
            'tanggal' => date('Y-m-d', strtotime($this->request->getVar('tanggal'))),
            'absen' => $this->request->getVar('absen'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
    
        session()->setFlashData('tx_success_message','Absensi Berhasil Ditambahkan');
        return redirect()->to('absensi');
    }

    public function edit($id)
    {
        $data = [
            'title' => "Absensi",
            'absensi' => $this->absensiModel->find($id),
            'siswa' => $this->siswaModel->findAll(),
        ];

        return view('absensi/edit', $data);
    }

    public function update($id)
    {

       // Validate input
        if (!$this->validate([
            'nis' =>  'required',
            'tanggal' => 'required',
            'absen' => 'required',
        ])) {
            session()->setFlashData('tx_error_message', 'Error validasi, perhatikan isian form');
            return redirect()->back()->withInput();
        }


        $this->absensiModel->update($id, [
            'id_siswa' => $this->request->getVar('nis'),
            'id_semester' => $this->semesterModel->where('status', 'Aktif')->first()['id'],
            'tanggal' => date('Y-m-d', strtotime($this->request->getVar('tanggal'))),
            'absen' => $this->request->getVar('absen'),
            'keterangan' => $this->request->getVar('keterangan')
        ]);
    
        session()->setFlashData('tx_success_message', 'Absensi Berhasil Diubah');
        return redirect()->to('absensi');
    }

    public function delete($id)
    {
        $absensi = $this->absensiModel->find($id);

        if(empty($absensi)) {
            session()->setFlashData('tx_error_message', 'Data tidak ditemukan');
            return redirect()->back();
        }

        $this->absensiModel->delete($id);
      
        session()->setFlashData('tx_success_message','Data Berhasil Dihapus');
        return redirect()->to('absensi');
    }
}
