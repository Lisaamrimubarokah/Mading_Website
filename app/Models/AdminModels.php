<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModels extends Model
{
    

    public function jmlberita()
    {
        return $this->db->table('tbl_berita')
        ->countAll();
    }
    public function jmlpengumuman()
    {
        return $this->db->table('tbl_pengumuman')
        ->countAll();
    }
    public function jmluser()
    {
        return $this->db->table('tbl_user')
        ->countAll();
    }
    public function jmljadwal()
    {
        return $this->db->table('tbl_jadwal')
        ->countAll();
    }
   


}