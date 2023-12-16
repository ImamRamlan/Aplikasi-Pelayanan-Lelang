<?php

namespace App\Models;

use CodeIgniter\Model;

class m_auth extends Model
{  
    public function auth_pelanggan($nik, $password)
    {
        return $this->db->table('tbl_user_212369')
            ->where([
                '212369_nik' => $nik,
                '212369_katasandi' => $password,
            ])
            ->get()
            ->getRowArray();
    }
}

