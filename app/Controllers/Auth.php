<?php

namespace App\Controllers;

use App\Models\AuthModels;

class Auth extends BaseController
{
    public $title = 'Login';
    public function __construct()
    {
        helper('form');
        helper('text');
        helper('date');
        $this->AuthModels = new AuthModels();
    }
	public function index()
	{
		$data = [
			'title' => $this->title,
            'page' => 'Data '.$this->title,
		];
		return view('loginv/index', $data);
	}

    public function ceklogin()
    {
        // $hak = $this->request->getPost('hak');
        // $username = $this->request->getPost('username');
        // $password = $this->request->getPost('password');
      
        if($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
        ])){
              //jika valid
            
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cekuser = $this->AuthModels->login_user($username,$password);
            $status = $this->AuthModels->login($username,$password);
                if($cekuser){
                    if ($status) {
                        session()->set('log', true);
                        session()->set('id_user', $cekuser['id_user']);
                        session()->set('username', $cekuser['username']);
                        session()->set('email', $cekuser['email']);
                        session()->set('id_role', $cekuser['id_role']);
                        session()->set('status', $cekuser['status']);
                        session()->set('foto', $cekuser['foto']);
                    
                        //login
                        return redirect()->to(base_url('front'));
                    } else {
                        session()->setFlashdata('pesan', 'Login gagal, User tidak aktif');
                        return redirect()->to(base_url('auth/index'));
                    }
                   
                        
                } else {
                    session()->setFlashdata('pesan', 'Login gagal, Username atau Password salah');
                    return redirect()->to(base_url('auth/index'));
                }
              
    
            
        }else{
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth/index'));
        }

        
    }

    public function logout(){
        session()->remove('log');
        session()->remove('id_user');
        session()->remove('username');
        session()->remove('email');
        session()->remove('foto');
        session()->remove('id_role');
        session()->remove('status');
        session()->setFlashdata('sukses', 'Berhasil Logout');
        return redirect()->to(base_url('front/index'));

    }
}
