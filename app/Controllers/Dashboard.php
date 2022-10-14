<?php

namespace App\Controllers;
use App\Models\AdminModels;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\PengumumanModel;
class Dashboard extends BaseController
{
    public $title = 'Dashboard';
    public function __construct()
    {
        helper('form');
        helper('text');
        helper('date');
        $this->UserModel = new UserModel();
        $this->RoleModel = new RoleModel();
        $this->AdminModels = new AdminModels();
        $this->PengumumanModel = new PengumumanModel();
        
    }
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Dashboard '.$this->title,
            'jmlberita' => $this->AdminModels->jmlberita(),
            'jmlpengumuman' => $this->AdminModels->jmlpengumuman(),
            'jmluser' => $this->AdminModels->jmluser(),
            'jmljadwal' => $this->AdminModels->jmljadwal(),
            'user' => $this->UserModel->listDataUser(),
            'pengumuman' => $this->PengumumanModel->listDataHome(),
            
        ];
        return view('dashboard/dashboard', $data);
    }

    public function menu_adm_konten()
    {
        // if (session()->get('id_role') <> 2) {
        //     return redirect()->to(base_url('auth/index'));

        // }
        $data = [
            'title' => $this->title,
            'page' => 'Dashboard '.$this->title,
            'jmlberita' => $this->AdminModels->jmlberita(),
            'jmlpengumuman' => $this->AdminModels->jmlpengumuman(),
            'jmluser' => $this->AdminModels->jmluser(),
            'jmljadwal' => $this->AdminModels->jmljadwal(),
            
        ];
        return view('dashboard/dashboard', $data);
    }
    public function menu_admin_dosen()
    {
        // if (session()->get('id_role') <> 3) {
        //     return redirect()->to(base_url('auth/index'));

        // }
        $data = [
            'title' => $this->title,
            'page' => 'Dashboard '.$this->title,
            'jmlberita' => $this->AdminModels->jmlberita(),
            'jmlpengumuman' => $this->AdminModels->jmlpengumuman(),
            'jmluser' => $this->AdminModels->jmluser(),
            'jmljadwal' => $this->AdminModels->jmljadwal(),
            
        ];
        return view('dashboard/dashboard', $data);
    }
    public function menu_user()
    {
        // if (session()->get('id_role') <> 4) {
        //     return redirect()->to(base_url('auth/index'));

        // }
        $data = [
            'title' => $this->title,
            'page' => 'Dashboard '.$this->title,
            'jmlberita' => $this->AdminModels->jmlberita(),
            'jmlpengumuman' => $this->AdminModels->jmlpengumuman(),
            'jmluser' => $this->AdminModels->jmluser(),
            'jmljadwal' => $this->AdminModels->jmljadwal(),
            
        ];
        return view('dashboard/dashboard', $data);
    }
}
