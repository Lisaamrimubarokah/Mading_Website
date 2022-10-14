<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    public function allData()
  {
      return $this->db->table('kategori')
      ->orderBy('id', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_kategori)
  {
      return $this->db->table('kategori')
      ->where('id', $id_kategori)
      ->get()->getRowArray();
  }

  public function add($data)
  {
      $this->db->table('kategori')->insert($data);

  }

  public function edit($data)
  {
      $this->db->table('kategori')
      ->where('id', $data['id'])
      ->update($data);

  }

  public function delete_data($data)
  {
    $this->db->table('kategori')
    ->where('id', $data['id'])
    ->delete($data);

  }
}
?>