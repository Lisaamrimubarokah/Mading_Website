<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    public function allData()
  {
      return $this->db->table('tbl_jadwal')
      ->join('tbl_status', 'tbl_status.id_status = tbl_jadwal.id_status', 'left')
      ->orderBy('id_jadwal', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_jadwal)
  {
      return $this->db->table('tbl_jadwal')
      ->join('tbl_status', 'tbl_status.id_status = tbl_jadwal.id_status', 'left')
      ->where('id_jadwal', $id_jadwal)
      ->get()->getRowArray();
  }

  public function add($data)
  {
      $this->db->table('tbl_jadwal')->insert($data);

  }

  public function edit($data)
  {
      $this->db->table('tbl_jadwal')
      ->where('id_jadwal', $data['id_jadwal'])
      ->update($data);

  }

  public function delete_data($data)
  {
    $this->db->table('tbl_jadwal')
    ->where('id_jadwal', $data['id_jadwal'])
    ->delete($data);

  }
}
?>