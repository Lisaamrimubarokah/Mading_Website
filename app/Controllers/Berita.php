<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\PengumumanModel;

class Berita extends BaseController
{
    public $title = 'Berita';
    public function __construct()
	{
		helper('form');
        helper('text');
        helper('date');
        $this->KategoriModel = new KategoriModel();
        $this->BeritaModel = new BeritaModel();
        $this->PengumumanModel = new PengumumanModel();
		
	}
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'berita' => $this->BeritaModel->allData(),
            
        ]; 
        
        return view('berita/indexView', $data);
    }

    public function full()
    {
        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'berita' => $this->BeritaModel->listData(),
            'recent' => $this->BeritaModel->listRecent(),
            
        ]; 
        
        return view('berita/fullView', $data);
    }

    public function all()
    {
        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'berita' => $this->BeritaModel->allData(),
            'recent' => $this->BeritaModel->listRecent(),
            'list'=> $this->PengumumanModel->listDataHome(),
            
        ]; 
        
        return view('berita/allBerita', $data);
    }

    public function baca($id_berita)
    {
        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'berita' => $this->BeritaModel->detailData($id_berita),
            'recent' => $this->BeritaModel->listRecent(),
            'list'=> $this->PengumumanModel->listDataHome(),
            
            
        ]; 
        
        return view('berita/readView', $data);
    }

    public function form()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Form '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
        ];
        return view('berita/formBerita', $data);
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
            'judul_berita' => [
                'label' => 'Judul Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'desk_berita' => [
                'label' => 'Deskripsi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'med_berita' => [
                'label' => 'Media Berita',
                'rules' => 'uploaded[med_berita]|max_size[med_berita,100024]|is_image[med_berita]|mime_in[med_berita,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                
                    'uploaded' => '{field} Silahkan isi terlebih dahulu',
                    'max_size' => 'Ukuran {field} maks. 1MB ',
                    'is_image' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png',
                    'mime_in' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png'
                    
                ]
            ],
        
        ])){
            
            $media = $this->request->getFile('med_berita');
              //ambil nama file
            $newNamaMed = $media->getRandomName();
            $id_berita = $this->BeritaModel->idBerita();
            $id_user = session()->get('id_user');
            // jika valid
            $data = array(
                'id_berita' => $id_berita,
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_user' => $id_user,
                'judul_berita' => $this->request->getPost('judul_berita'),
                'desk_berita' => $this->request->getPost('desk_berita'),
                'med_berita' => $newNamaMed,
                'created_at' => $this->request->getPost('created_at'),
               
            );
            //pindah file
            $media->move('medberita', $newNamaMed);
            $this->BeritaModel->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('berita/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('berita/form'));
        }
    }

    public function edit($id_berita)
    {
        $data = [
			'title' => $this->title,
            'page' => 'Edit '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            'berita' => $this->BeritaModel->detailData($id_berita)
         
		];
		return view('berita/editBerita', $data);
    }

    public function update($id_berita)
    {
        if($this->validate([
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'judul_berita' => [
                'label' => 'Judul Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'desk_berita' => [
                'label' => 'Deskripsi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'med_berita' => [
                'label' => 'Media Berita',
                'rules' => 'max_size[med_berita,100024]|is_image[med_berita]|mime_in[med_berita,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [
                
                    'max_size' => 'Ukuran {field} maks. 1MB ',
                    'is_image' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png',
                    'mime_in' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png'
                    
                ]
            ],
        
        ])){
            
            $media = $this->request->getFile('med_berita');
            $id_user = session()->get('id_user');

            if($media->getError() == 4 ){
                //jika foto tidak diganti
                $data = array(
                    'id_berita' => $id_berita,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_user' => $id_user,
                    'judul_berita' => $this->request->getPost('judul_berita'),
                    'desk_berita' => $this->request->getPost('desk_berita'),
                  
                );
                $this->BeritaModel->edit($data);

            }else{
                //menghapus foto lama
                $berita = $this->BeritaModel->detailData($id_berita);
                if($berita['med_berita'] != "" ){
                    unlink('medberita/' . $berita['med_berita']);
                }

                  //ambil nama file
                $newNamaMed = $media->getRandomName();
                $id_user = session()->get('id_user');
                //jika valid
                $data = array(
                    'id_berita' => $id_berita,
                    'id_kategori' => $this->request->getPost('id_kategori'),
                    'id_user' => $id_user,
                    'judul_berita' => $this->request->getPost('judul_berita'),
                    'desk_berita' => $this->request->getPost('desk_berita'),
                    'med_berita' => $newNamaMed
                  
                );
                //pindah file
                $media->move('medberita', $newNamaMed);
                $this->BeritaModel->edit($data);
                
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('berita/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('berita/edit/' . $id_berita));
        }
    }

    public function delete($id_berita)
	{
        //menghapus foto lama
        $berita = $this->BeritaModel->detailData($id_berita);
        if($berita['med_berita'] != "" ){
            unlink('medberita/' . $berita['med_berita']);
        }
		$data = [
			'id_berita' => $id_berita,
		];
		$this->BeritaModel->delete_data($data);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to(base_url('berita/index'));
	}
}
