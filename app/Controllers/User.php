<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class User extends BaseController
{

    public $title = 'User';

    public function __construct()
    {
        helper('form');
        helper('text');
        helper('date');
        $this->UserModel = new UserModel();
        $this->RoleModel = new RoleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'page' => 'Data ' . $this->title,
            'user' => $this->UserModel->allData()
        ];
        return view('user/indexView', $data);
    }

    public function form()
    {
        $data = [
            'title' => 'Tambah User',
            'page' => 'Form ' . $this->title,
            'role' => $this->RoleModel->allData(),
        ];
        return view('user/formUser', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile User',
            'page' => 'Data ' . $this->title,
            'user' => $this->UserModel->allData(),
            // 'profile' => $this->UserModel->detailData2($id_user),

        ];

        return view('user/profile', $data);
    }



    public function insert()
    {
        if ($this->validate([

            'id_role' => [
                'label' => 'ID Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'username' => [
                'email' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'email' => [
                'label' => 'Email',
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
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,100024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [

                    'uploaded' => '{field} Silahkan isi terlebih dahulu',
                    'max_size' => 'Ukuran {field} maks. 1MB ',
                    'is_image' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png',
                    'mime_in' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png'

                ]
            ],

        ])){
            $id_user = $this->UserModel->idUser();
            $media = $this->request->getFile('foto');
            //ambil nama file
            $newNamaMed = $media->getRandomName();
            // jika valid
            $data = [
                'id_user' => $id_user,
                'id_role' => $this->request->getPost('id_role'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'status' => $this->request->getPost('status'),
                'foto' => $newNamaMed,
            ];
            //pindah file
            $media->move('meduser', $newNamaMed);
            $this->UserModel->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
            return redirect()->to(base_url('user/index'));
        }else{
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/form'));

        }
    }

    public function edit($id_user)
    {
        $data = [
            'title' => 'Edit User',
            'page' => 'Edit Data ' . $this->title,
            'role' => $this->RoleModel->allData(),
            'user' => $this->UserModel->detailData($id_user),

        ];
        return view('user/editUser', $data);
    }

    public function update($id_user)
    {

        if ($this->validate([

            'id_role' => [
                'label' => 'ID Role',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'username' => [
                'email' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'email' => [
                'label' => 'Email',
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
            'status' => [
                'label' => 'Status',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Silahkan isi terlebih dahulu'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,100024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]',
                'errors' => [

                    'max_size' => 'Ukuran {field} maks. 1MB ',
                    'is_image' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png',
                    'mime_in' => 'Pastikan file yang anda pilih berupa jpg,jpeg,atau png'

                ]
            ],

        ])) {

            $media = $this->request->getFile('foto');

            if ($media->getError() == 4) {
                //jika foto tidak diganti
                $data = array(
                    'id_user' => $id_user,
                    'id_role' => $this->request->getPost('id_role'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'status' => $this->request->getPost('status'),

                );
                $this->UserModel->edit($data);
            } else {
                //menghapus foto lama
                $user = $this->UserModel->detailData($id_user);
                if ($user['foto'] != "") {
                    unlink('meduser/' . $user['foto']);
                }

                //ambil nama file
                $newNamaMed = $media->getRandomName();
                //// jika valid
                $data = array(
                    'id_user' => $id_user,
                    'id_role' => $this->request->getPost('id_role'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'status' => $this->request->getPost('status'),
                    'foto' => $newNamaMed,

                );
                //pindah file
                $media->move('meduser', $newNamaMed);
                $this->UserModel->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil Diubah');
            return redirect()->to(base_url('user/index'));
        } else {
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user/edit/' . $id_user));
        }
    }

    public function delete($id_user)
    {
        //menghapus foto lama
        $user = $this->UserModel->detailData($id_user);
        if ($user['foto'] != "") {
            unlink('meduser/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user
        ];
        $this->UserModel->delete_data($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('user/index'));
    }
}
