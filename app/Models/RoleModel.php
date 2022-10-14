<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{

  protected $table      = 'tbl_role';
    protected $primaryKey = 'id_role';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['role'];
    public function allData()
  {
      return $this->db->table('tbl_role')
      ->orderBy('id_role', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_role)
  {
      return $this->db->table('tbl_role')
      ->where('id_role', $id_role)
      ->get()->getRowArray();
  }

  public function add($data)
  {
      $this->db->table('tbl_role')->insert($data);

  }

  public function edit($data)
  {
      $this->db->table('tbl_role')
      ->where('id_role', $data['id_role'])
      ->update($data);

  }

  public function delete_data($data)
  {
    $this->db->table('tbl_role')
    ->where('id_role', $data['id_role'])
    ->delete($data);

  }
  public function allRole()
  {
    return $this->db->table('tbl_role')->get()->getResultArray();
    // ->join('tbl_hak_akses', 'tbl_hak_akses.id_role = tbl_role.id_role', 'left')
    //   ->where('id_menu', $id_menu)
    //   ->groupBy('nama_menu')
      

  }

  
}
