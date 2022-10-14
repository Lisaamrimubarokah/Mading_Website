<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model

{
    protected $useTimestamps = true;
    protected $dateFormat    = 'timestamp';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $table      = 'tbl_berita';
    protected $primaryKey = 'id_berita';

    protected $useAutoIncrement = false;
    protected $allowedFields    = [
        'judul_berita','desk_berita','id_kategori','med_berita'
    ];
    
    public function allData()
  {
      return $this->db->table('tbl_berita')
      ->join('kategori', 'kategori.id = tbl_berita.id_kategori', 'left')
      ->orderBy('id_berita', 'ASC')
      ->get()->getResultArray();
  }
  public function detailData($id_berita)
  {
      return $this->db->table('tbl_berita')->select("tbl_berita.id_berita, tbl_berita.id_kategori, tbl_berita.id_user, tbl_berita.judul_berita, tbl_berita.desk_berita, tbl_berita.med_berita, tbl_berita.created_at AS 'created_at_berita',  tbl_berita.updated_at, kategori.kategori_nama, kategori.created_at")
      ->join('kategori', 'kategori.id = tbl_berita.id_kategori', 'left')
      ->where('id_berita', $id_berita)
      ->get()->getRowArray();
  }

  public function add($data)
  {
      $this->db->table('tbl_berita')->insert($data);

  }

  public function listData()
  {
      return $this->db->table('tbl_berita')
      ->join('kategori', 'kategori.id = tbl_berita.id_kategori', 'left')
      ->orderBy('id_berita', 'ASC')
      ->limit(4)
      ->get()->getResultArray();
  }

  public function listRecent()
  {
      return $this->db->table('tbl_berita')
      ->join('kategori', 'kategori.id = tbl_berita.id_kategori', 'left')
      ->orderBy('id_berita', 'DESC')
      ->limit(4)
      ->get()->getResultArray();
  }

  public function listRecent2()
  {
      return $this->db->table('tbl_berita')
      ->join('kategori', 'kategori.id = tbl_berita.id_kategori', 'left')
      ->orderBy('id_berita', 'DESC')
      ->limit(3)
      ->get()->getResultArray();
  }

  public function edit($data)
  {
      $this->db->table('tbl_berita')
      ->where('id_berita', $data['id_berita'])
      ->update($data);

  }

  public function delete_data($data)
  {
    $this->db->table('tbl_berita')
    ->where('id_berita', $data['id_berita'])
    ->delete($data);

  }

  public function getBerita($id_berita)
  {
    return $this->where(['id_berita' => $id_berita])->first();

  }   

  public function idBerita()
  {
     
      $kode = $this->db->table('tbl_berita')
      ->select('RIGHT(id_berita,3) as id_berita', FALSE)
      ->orderBy('id_berita','DESC')
      ->limit(1)->get()->getRowArray();

      if ($kode['id_berita'] == null) {
          $no = 1;
      } else {
          $no = intval($kode['id_berita']) + 1;
      }
      $batas = str_pad($no,3,"0", STR_PAD_LEFT);
      $id_berita = 'B'.$batas;
      return $id_berita;

  }

	
}



?>