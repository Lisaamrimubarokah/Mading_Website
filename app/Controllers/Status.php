<?php

namespace App\Controllers;

use App\Models\StatusModel;


class Status extends BaseController
{
    public $title = 'Status';
    public function __construct()
	{
		helper('form');
        $this->StatusModel = new StatusModel();
      
    
	}
    public function index()
    {
        $data = [
            'title' => $this->title,
            'page' => 'Data '.$this->title,
            'status' => $this->StatusModel->allData(),
            
        ]; 
        
        return view('status/indexView', $data);
    }
  

}

