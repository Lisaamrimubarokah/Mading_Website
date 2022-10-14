<?php

namespace App\Models;

use CodeIgniter\Model;

class HakAksesModel extends Model
{

    protected $table      = 'tbl_hak_akses';
    protected $primaryKey = 'id_hak_akses';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_role', 'id_menu'];

    public function allData()
  {
      return $this->db->table('tbl_hak_akses')
      ->join('tbl_role', 'tbl_role.id_role = tbl_hak_akses.id_role', 'left')
      ->join('tbl_menu', 'tbl_menu.id_menu = tbl_hak_akses.id_menu', 'left')
      ->orderBy('id_hak_akses', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_hak_akses)
  {
      return $this->db->table('tbl_hak_akses')
      ->join('tbl_role', 'tbl_role.id_role = tbl_hak_akses.id_role', 'left')
      ->join('tbl_menu', 'tbl_menu.id_menu = tbl_hak_akses.id_menu', 'left')
      ->where('id_hak_akses', $id_hak_akses)
      ->get()->getRowArray();
  }

  public function allData2()
  {
      return $this->db->table('tbl_hak_akses')
      ->join('tbl_role', 'tbl_role.id_role = tbl_hak_akses.id_role', 'left')
      ->join('tbl_menu', 'tbl_menu.id_menu = tbl_hak_akses.id_menu', 'left')
      ->orderBy('id_hak_akses', 'ASC')
      ->groupBy('role')
      ->get()->getResultArray();
  }

  public function hakAksesbyRole($id_role)
  {
      return $this->db->table('tbl_hak_akses')
      ->where('id_role', $id_role)
      ->get()->getRowArray();
  }

  public function roleData($id_role)
  {
      return $this->db->table('tbl_hak_akses')
      ->join('tbl_role', 'tbl_role.id_role = tbl_hak_akses.id_role', 'left')
      ->join('tbl_menu', 'tbl_menu.id_menu = tbl_hak_akses.id_menu', 'left')
      ->orderBy('id_hak_akses', 'ASC')
      ->where('tbl_hak_akses.id_role', $id_role)
      ->get()->getResultArray();
  }

  public function add($data)
  {
      $this->db->table('tbl_hak_akses')->insert($data);
  }

  public function edit($data)
  {
      $this->db->table('tbl_hak_akses')
      ->where('id_hak_akses', $data['id_hak_akses'])
      ->update($data);

  }

  public function delete_byRole($data)
  {
    $this->db->table('tbl_hak_akses')
    ->where('id_role', $data)
    ->delete();

  }
  
}
?>