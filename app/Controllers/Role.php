<?php

namespace App\Controllers;

use App\Models\RoleModel;


class Role extends BaseController
{
    public $title = 'Role';
    public function __construct()
	{
		helper('form');
        $this->RoleModel = new RoleModel();
    
	}
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'role' => $this->RoleModel->allData(),
            
        ]; 
        
        return view('role/indexView', $data);
    }
  

}

