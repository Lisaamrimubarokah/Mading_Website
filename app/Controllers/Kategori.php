<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public $title = 'Kategori';
    public function __construct()
	{
		helper('form');
        $this->KategoriModel = new KategoriModel();
		
	}
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            
        ]; 
        
        return view('kategori/indexView', $data);
    }
    public function form()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Form '.$this->title,
        ];
        return view('kategori/formView', $data);
    }
    public function insert()
    {
        if($this->validate([
            'kategori_nama' => [
                'label' => 'Nama Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
        
        ])){
            // jika valid
            $data = [
                'id' => $this->request->getPost('id'),
                'kategori_nama' => $this->request->getPost('kategori_nama'),
            ];
            $this->KategoriModel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('kategori/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kategori/form'));
        }
    }

    public function edit($id_kategori)
    {
        $data = [
			'title' => $this->title,
            'page' => 'Edit '.$this->title,
            'kategori' => $this->KategoriModel->detailData($id_kategori),
         
		];
		return view('kategori/editKategori', $data);
    }

    public function update($id_kategori)
    {
        if($this->validate([
            'kategori_nama' => [
                'label' => 'Nama Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
        
        ])){
            // jika valid
            $data = [
                'id' => $id_kategori,
                'kategori_nama' => $this->request->getPost('kategori_nama'),
            ];
            $this->KategoriModel->edit($data);
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to(base_url('kategori/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kategori/edit' . $id_kategori));
        }
    }

    public function delete($id_kategori)
	{
		$data = [
			'id' => $id_kategori
		];
		$this->KategoriModel->delete_data($data);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url('kategori/index'));
	}


}

