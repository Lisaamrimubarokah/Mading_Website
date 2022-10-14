<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\PengumumanModel;
use App\Models\KategoriModel;
use App\Models\JadwalModel;
use App\Models\BeritaModel;

class Front extends BaseController
{
    // protected $beritaModel;
    public $title = 'Home';

    public function __construct(){
        helper('form');
        helper('text');
        helper('date');
        $this->KategoriModel = new KategoriModel();
        $this->PengumumanModel = new PengumumanModel();
        $this->JadwalModel = new JadwalModel();
        $this->BeritaModel = new BeritaModel();
    }

    public function index()
    {

        // $keyword = $this->request->getVar('keyword');
        // if($keyword){
        //     $pengumuman = $this->PengumumanModel->search($keyword);
        // }else{
        //     $pengumuman = $this->PengumumanModel->listDataHome();
        // }
        // d($this->request->getVar('keyword'));

        $data = [
            'title' => $this->title,
            'page' => 'List '.$this->title,
            'kategori' => $this->KategoriModel->allData(),
            // 'pengumuman' => $pengumuman,
            'pengumuman' => $this->PengumumanModel->listDataHome(),
            'berita' => $this->BeritaModel->listRecent2(),
            
        ]; 
        return view('home/home', $data);

    
    }

    public function jadwal(){
        $data = [
            'page' => 'Data '.$this->title,
            'jadwal' => $this->JadwalModel->allData(),
            
        ];

        echo view('front/header', $data);
        echo view('front/jadwalFront');
        echo view('front/footer');
    }
}
