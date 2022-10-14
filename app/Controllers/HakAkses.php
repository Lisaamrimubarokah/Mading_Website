<?php

namespace App\Controllers;

use App\Models\HakAksesModel;
use App\Models\MenuModel;
use App\Models\RoleModel;

class HakAkses extends BaseController
{
    public $title = 'Hak Akses';
    public function __construct()
	{
		helper('form');
        $this->HakAksesModel = new HakAksesModel();
        $this->MenuModel = new MenuModel();
        $this->RoleModel = new RoleModel();
		
	}
    public function index()
    {
       
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'hakAkses' => $this->HakAksesModel->allData2(),
            'role' => $this->RoleModel->allRole(),
        ]; 
        
        return view('hakAkses/akses_v', $data);
    }

    public function form($id_role)
    {
        $data = [
            'title' => $this->title,
            'page' => 'Form '.$this->title,
            'menu' => $this->MenuModel->allMenu(),
            'hakAkses'=> $this->HakAksesModel->roleData($id_role),
            'id_role' =>$id_role,
        ];
        return view('hakAkses/akses_input', $data);
        // var_dump($data['hakAkses']);
    }

    public function aksesEdit($id_role)
    {
        $data = [
            'title' => $this->title,
            'page' => 'Form '.$this->title,
            'menu' => $this->MenuModel->allMenu(),
            'hakAkses'=> $this->HakAksesModel->roleData($id_role),
            'id_role' =>$id_role,
        ];
        return view('hakAkses/akses_edit', $data);
        // var_dump($data['hakAkses']);
    }


    public function edit($id_hak_akses)
    {
        $data = [
			'title' => $this->title,
            'page' => 'Edit '.$this->title,
            'hakAkses' => $this->HakAksesModel->detailData($id_hak_akses),
         
		];
		return view('hakAkses/akses_edit', $data);
    }

    public function insert($id_role){
        $data = $this->request->getPost('akses');
        
        for ($i=0; $i < sizeof($data); $i++) 
        { 
            $idmenu = $data[$i];
                $arrData = array(
                    'id_menu' => $idmenu,
                    'id_role' => $id_role);
                $this->HakAksesModel->add($arrData);
        }
        $dataKirimView = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'hakAkses' => $this->HakAksesModel->allData2(),
            'role' => $this->RoleModel->allRole(),
        ]; 
        
        return view('hakAkses/akses_v', $dataKirimView);
    }


    public function update($id_role)
    {
        if (isset($_POST['simpan'])) {
            $data = $this->request->getPost('akses');

            //kode hapus data hak akses berdasarkan id;
            $this->HakAksesModel->delete_byRole($id_role);
            
            for ($i=0; $i < sizeof($data); $i++) 
            { 
                $idmenu = $data[$i];
                    $arrData = array(
                        'id_menu' => $idmenu,
                        'id_role' => $id_role);
                    $this->HakAksesModel->add($arrData);
            }
            $dataKirimView = [
                'title' => $this->title,
                'page' => 'Data '.$this->title,
                'hakAkses' => $this->HakAksesModel->allData2(),
                'role' => $this->RoleModel->allRole(),
            ]; 
        }
        
        
        return view('hakAkses/akses_v', $dataKirimView);
       
    }

    // public function delete($id_role){
    //     $this->HakAksesModel->delete_data($id_role);
    //     session()->setFlashdata('pesan','Data Berhasil Dihapus.');
    //     return redirect()->to('hakAkses/akses_v');
    // }
}
