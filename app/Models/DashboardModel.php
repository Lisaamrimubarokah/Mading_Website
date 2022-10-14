<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model{
    protected $table = 'tbl_berita';
    protected $primaryKey = 'id_berita';
    protected $useTimeStamps = true;
}