<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{

    protected $table      = 'tbl_menu';
    protected $primaryKey = 'id_menu';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_menu'];


  public function allMenu(){
    return $this->db->table('tbl_menu')->get()->getResultArray();
      // ->join('tbl_hak_akses', 'tbl_hak_akses.id_menu = tbl_menu.id_menu', 'left')
      // ->groupBy('nama_menu')
      
  }

  
}
?>