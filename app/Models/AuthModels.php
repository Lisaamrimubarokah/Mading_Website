<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModels extends Model
{
    public function login_user($username, $password)
    {
        return $this->db
            ->table('tbl_user')
            ->where([
                'username' => $username,
                'password' => $password,
            ])
            ->get()
            ->getRowArray();
    }

    public function login($username, $password)
    {
        return $this->db
            ->table('tbl_user')
            ->where([
                'username' => $username,
                'password' => $password,
                'status' => 'aktif'
            ])
            ->get()
            ->getRowArray();
    }
}
?>
