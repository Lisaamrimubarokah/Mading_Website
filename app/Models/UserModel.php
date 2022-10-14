<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $useTimestamps = true;
    protected $dateFormat    = 'timestamp';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = false;
    protected $allowedFields = ['id_role', 'username', 'email', 'password', 'status','foto'];

    public function allData()
    {
        // return $this->db->table('tbl_user')->get()->getResultArray();
        return $this->db->table('tbl_user')
            ->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left')
            ->orderBy('id_user', 'ASC')
            ->get()->getResultArray();
    }
    public function detailData($id_user)
    {
        return $this->db->table('tbl_user')
            ->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left')
            ->where('id_user', $id_user)
            ->get()->getRowArray();
    }

//     public function detailData2($id_user)
//   {
//     return $this->db->table('tbl_user')->select("tbl_user.id_user, tbl_user.id_role, tbl_user.username, tbl_user.email, tbl_user.password, tbl_user.status, tbl_user.created_at AS 'created_at_user',  tbl_user.foto")
//     ->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left')
//     ->where('id_user', $id_user)
//     ->get()->getRowArray();
//   }

    public function listDataUser()
  {
      return $this->db->table('tbl_user')
      ->join('tbl_role', 'tbl_role.id_role = tbl_user.id_role', 'left')
      ->orderBy('id_user', 'DESC')
      ->limit(4)
      ->get()->getResultArray();
  }


    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }


    public function delete_data($data)
    {
        $this->db->table('tbl_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
    public function getUser($id_user)
    {
        return $this->where(['id_user' => $id_user])->first();
    }

    public function idUser()
    {

        $kode = $this->db->table('tbl_user')
            ->select('RIGHT(id_user,3) as id_user', FALSE)
            ->orderBy('id_user', 'DESC')
            ->limit(1)->get()->getRowArray();

        if ($kode['id_user'] == null) {
            $no = 1;
        } else {
            $no = intval($kode['id_user']) + 1;
        }
        $batas = str_pad($no, 3, "0", STR_PAD_LEFT);
        $id_user = 'U' . $batas;
        return $id_user;
    }
}
