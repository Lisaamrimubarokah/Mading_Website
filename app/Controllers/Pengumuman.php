<?php

namespace App\Controllers;
use App\Models\PengumumanModel;
use App\Models\KategoriModel;
use App\Models\UserModel;
use App\Models\BeritaModel;

class Pengumuman extends BaseController
{
    public $title = 'Pengumuman';
    public function __construct()
	{
		helper('form');
        helper('text');
        helper('date');
        $this->KategoriModel = new KategoriModel();
        $this->PengumumanModel = new PengumumanModel();
        $this->UserModel = new UserModel();
        $this->BeritaModel = new BeritaModel();
		
	}
    public function index()
    {
       
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'pengumuman' => $this->PengumumanModel->allData(),
            
            
        ]; 
        
        return view('pengumuman/indexView', $data);
    }

    public function full()
    {
        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'user' => $this->UserModel->allData(),
            'pengumuman' => $this->PengumumanModel->listData(),
            'list'=> $this->PengumumanModel->listDataHome(),
            
        ]; 
        
        return view('pengumuman/fullView', $data);
    }

    public function baca($id_pengumuman)
    {
        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'user' => $this->UserModel->allData(),
            'pengumuman' => $this->PengumumanModel->detailData($id_pengumuman),
            'list'=> $this->PengumumanModel->listDataHome(),
            'recent' => $this->BeritaModel->listRecent(),
            
            
        ]; 
        
        return view('pengumuman/readView', $data);
    }

    
    public function all()
    {
        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'pengumuman' => $this->PengumumanModel->allData(),
            'recent' => $this->BeritaModel->listRecent(),
            'list'=> $this->PengumumanModel->listDataHome(),
            
        ]; 
        
        return view('pengumuman/allPengumuman', $data);
    }

    public function form()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Form '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'user' => $this->UserModel->allData(),
        ];
        return view('pengumuman/formPengumuman', $data);
    }

    public function insert()
    {
        if($this->validate([
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'judul' => [
                'label' => 'Judul Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                    
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                    
                ]
            ],
            'medpengumuman' => [
                'label' => 'Media Pengumuman',
                'rules' => 'uploaded[medpengumuman]|max_size[medpengumuman,100024]|is_image[medpengumuman]|mime_in[medpengumuman,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                
                    'uploaded' => '{field} Silahkan isi terlebih dahulu',
                    'max_size' => 'Ukuran {field} maks. 1MB ',
                    'is_image' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png',
                    'mime_in' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png'
                    
                ]
            ],
        
        ])){
            
            $media = $this->request->getFile('medpengumuman');
              //ambil nama file
            $newNamaMed = $media->getRandomName();
            // jika valid
            $id_pengumuman = $this->PengumumanModel->idPengumuman();
            $id_user = session()->get('id_user');
            $data = array(
                'id_pengumuman' => $id_pengumuman,
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_user' => $id_user,
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'medpengumuman' => $newNamaMed,
            );
            //pindah file
            $media->move('med_pengumuman', $newNamaMed);
            $this->PengumumanModel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('pengumuman/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengumuman/form'));
        }
    }

    public function delete($id_pengumuman)
	{
        //menghapus foto lama
        $pengumuman = $this->PengumumanModel->detailData($id_pengumuman);
        if($pengumuman['medpengumuman'] != "" ){
            unlink('med_pengumuman/' . $pengumuman['medpengumuman']);
        }
		$data = [
			'id_pengumuman' => $id_pengumuman,
		];
		$this->PengumumanModel->delete_data($data);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url('pengumuman/index'));
	}

    public function edit($id_pengumuman)
    {
        $data = [
			'title' => $this->title,
            'page' => 'Edit '.$this->title,
            'pengumuman' => $this->PengumumanModel->detailData($id_pengumuman),
            'kategori' => $this->KategoriModel->allData(),
         
		];
		return view('pengumuman/editPengumuman', $data);
    }

    public function update($id_pengumuman)
    {
        if($this->validate([
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'judul' => [
                'label' => 'Judul Pengumuman',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                    
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                    
                ]
            ],
            'medpengumuman' => [
                'label' => 'Media Pengumuman',
                'rules' => 'max_size[medpengumuman,100024]|is_image[medpengumuman]|mime_in[medpengumuman,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maks. 1MB ',
                    'is_image' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png',
                    'mime_in' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png'
                    
                ]
            ],
        
        ])){

            $media = $this->request->getFile('medpengumuman');

            if($media->getError() == 4 ){
                //jika foto tidak diganti
                // $id_pengumuman = $this->PengumumanModel->idPengumuman();
                $id_user = session()->get('id_user');
                $data = array(
                    'id_pengumuman' => $id_pengumuman,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_user' => $id_user,
                    'judul' => $this->request->getPost('judul'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    
                );
                $this->PengumumanModel->edit($data);
            

            }else{
                //menghapus foto lama
                $pengumuman = $this->PengumumanModel->detailData($id_pengumuman);
                if($pengumuman['medpengumuman'] != "" ){
                    unlink('med_pengumuman/' . $pengumuman['medpengumuman']);
                }

                  //ambil nama file
                $newNamaMed = $media->getRandomName();
                // $id_pengumuman = $this->PengumumanModel->idPengumuman();
                $id_user = session()->get('id_user');
                //// jika valid
                $data = array(
                    'id_pengumuman' => $id_pengumuman,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_user' => $id_user,
                    'judul' => $this->request->getPost('judul'),
                    'deskripsi' => $this->request->getPost('deskripsi'),
                    'medpengumuman' => $newNamaMed,
                  
                );
                //pindah file
                $media->move('med_pengumuman', $newNamaMed);
                $this->PengumumanModel->edit($data);
                
            }
            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            return redirect()->to(base_url('pengumuman/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('pengumuman/edit/' . $id_pengumuman));
        }
    }
}
