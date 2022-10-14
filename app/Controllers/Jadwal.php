<?php

namespace App\Controllers;

use App\Models\JadwalModel;
use App\Models\StatusModel;

class Jadwal extends BaseController
{
    public $title = 'Jadwal Perkuliahan';
    public function __construct()
	{
		helper('form');
        $this->JadwalModel = new JadwalModel();
        $this->StatusModel = new StatusModel();
        
		
	}
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'jadwal' => $this->JadwalModel->allData(),
            
        ]; 
        
        return view('jadwal/indexView', $data);
    }

    public function view()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'jadwal' => $this->JadwalModel->allData(),
            
        ]; 
        
        return view('jadwal/jadwalView', $data);
    }
    public function form()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Form '.$this->title,
            'status' => $this->StatusModel->allData(),
        ];
        return view('jadwal/formJadwal', $data);
    }
    public function insert()
    {
        if($this->validate([
            'matkul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
        
        ])){
            // jika valid
            $data = [
                'id_jadwal' => $this->request->getPost('id_jadwal'),
                'matkul' => $this->request->getPost('matkul'),
                'tanggal' => $this->request->getPost('tanggal'),
                'jam_mulai' => $this->request->getPost('jam_mulai'),
                'jam_selesai' => $this->request->getPost('jam_selesai'),
                'ruang_kelas' => $this->request->getPost('ruang_kelas'),
                'dosen' => $this->request->getPost('dosen'),
                'id_status' => $this->request->getPost('id_status'),
            ];
            $this->JadwalModel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('jadwal/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwal/form'));
        }
    }

    public function edit($id_jadwal)
    {
        $data = [
			'title' => $this->title,
            'page' => 'Edit '.$this->title,
            'status' => $this->StatusModel->allData(),
            'jadwal' => $this->JadwalModel->detailData($id_jadwal),
         
		];
		return view('jadwal/editJadwal', $data);
    }

    public function update($id_jadwal)
    {
        if($this->validate([
            'matkul' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
        
        ])){
            // jika valid
            $data = [
                'id_jadwal' => $id_jadwal,
                'matkul' => $this->request->getPost('matkul'),
                'tanggal' => $this->request->getPost('tanggal'),
                'jam_mulai' => $this->request->getPost('jam_mulai'),
                'jam_selesai' => $this->request->getPost('jam_selesai'),
                'ruang_kelas' => $this->request->getPost('ruang_kelas'),
                'dosen' => $this->request->getPost('dosen'),
                'id_status' => $this->request->getPost('id_status'),
            ];
            $this->JadwalModel->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to(base_url('jadwal/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwal/edit' . $id_jadwal));
        }
    }

    public function delete($id_jadwal)
	{
		$data = [
			'id_jadwal' => $id_jadwal
		];
		$this->JadwalModel->delete_data($data);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url('jadwal/index'));
	}


}

