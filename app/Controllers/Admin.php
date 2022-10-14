<?php

namespace App\Controllers;

use App\Models\AdminModels;

class Admin extends BaseController
{
    public $title = 'Admin';

    public function __construct()
    {
        $this->AdminModels = new AdminModels;
        
    }
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Dashboard '.$this->title,
            'jmlberita' => $this->AdminModels->jmlberita(),
            'jmlpengumuman' => $this->AdminModels->jmlpengumuman(),
            'jmluser' => $this->AdminModels->jmluser(),
            
        ];
        return view('dashboard/dashboard', $data);
    }
}
