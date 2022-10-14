<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    public function allData()
  {
      return $this->db->table('tbl_status')
      ->orderBy('id_status', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_status)
  {
      return $this->db->table('tbl_status')
      ->where('id_status', $id_status)
      ->get()->getRowArray();
  }

  public function add($data)
  {
      $this->db->table('tbl_status')->insert($data);

  }

  public function edit($data)
  {
      $this->db->table('tbl_status')
      ->where('id_status', $data['id_status'])
      ->update($data);

  }

  public function delete_data($data)
  {
    $this->db->table('tbl_status')
    ->where('id_status', $data['id_status'])
    ->delete($data);

  }
}
?>