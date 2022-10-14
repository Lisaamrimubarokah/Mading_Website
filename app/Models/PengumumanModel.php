<?php

namespace App\Models;

use CodeIgniter\Model;
use Prophecy\Promise\ReturnPromise;

class PengumumanModel extends Model
{
    protected $useTimestamps = true;
    protected $dateFormat    = 'timestamp';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $table      = 'tbl_pengumuman';
    protected $primaryKey = 'id_pengumuman';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_kategori', 'id_user', 'judul', 'deskripsi', 'medpengumuman'];
    
    public function allData()
  {
      return $this->db->table('tbl_pengumuman')
      ->join('kategori', 'kategori.id = tbl_pengumuman.id_kategori', 'left')
      ->orderBy('id_pengumuman', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_pengumuman)
  {
    return $this->db->table('tbl_pengumuman')->select("tbl_pengumuman.id_pengumuman, tbl_pengumuman.id_kategori, tbl_pengumuman.id_user, tbl_pengumuman.judul, tbl_pengumuman.deskripsi, tbl_pengumuman.medpengumuman, tbl_pengumuman.created_at AS 'created_at_pengumuman',  tbl_pengumuman.updated_at, kategori.kategori_nama, kategori.created_at")
    ->join('kategori', 'kategori.id = tbl_pengumuman.id_kategori', 'left')
    ->where('id_pengumuman', $id_pengumuman)
    ->get()->getRowArray();
  }
  public function listData()
  {
      return $this->db->table('tbl_pengumuman')
      ->join('kategori', 'kategori.id = tbl_pengumuman.id_kategori', 'left')
      ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user', 'left')
      ->orderBy('id_pengumuman', 'ASC')
      ->limit(4)
      ->get()->getResultArray();
  }
  public function listDataHome()
  {
      return $this->db->table('tbl_pengumuman')
      ->join('kategori', 'kategori.id = tbl_pengumuman.id_kategori', 'left')
      ->join('tbl_user', 'tbl_user.id_user = tbl_pengumuman.id_user', 'left')
      ->orderBy('id_pengumuman', 'DESC')
      ->limit(4)
      ->get()->getResultArray();
  }

  public function add($data)
  {
      $this->db->table('tbl_pengumuman')->insert($data);

  }

  public function edit($data)
  {
      $this->db->table('tbl_pengumuman')
      ->where('id_pengumuman', $data['id_pengumuman'])
      ->update($data);

  }

  public function delete_data($data)
  {
    $this->db->table('tbl_pengumuman')
    ->where('id_pengumuman', $data)
    ->delete();

  }

  public function getPengumuman($id_pengumuman)
  {
    return $this->where(['id_pengumuman' => $id_pengumuman])->first();

  }   

  public function idPengumuman()
  {
     
      $kode = $this->db->table('tbl_pengumuman')
      ->select('RIGHT(id_pengumuman,3) as id_pengumuman', FALSE)
      ->orderBy('id_pengumuman','DESC')
      ->limit(1)->get()->getRowArray();

      if ($kode['id_pengumuman'] == null) {
          $no = 1;
      } else {
          $no = intval($kode['id_pengumuman']) + 1;
      }
      $batas = str_pad($no,3,"0", STR_PAD_LEFT);
      $id_pengumuman = 'P'.$batas;
      return $id_pengumuman;

  }

  public function search($keyword)
  {
      
        // $builder = $this->table('tbl_pengumuman');
        // $builder->like('judul', $keyword);
        // return $builder;

        return $this->table('tbl_pengumuman')->like('judul', $keyword);
        
  }
}
?>