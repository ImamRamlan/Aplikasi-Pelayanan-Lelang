<?php

namespace App\Models;

use CodeIgniter\Model;

class M_login extends Model
{  
    public function auth_admin($username, $password)
    {
        return $this->db->table('tbl_admin_212369')
            ->where([
                '212369_usernameadmin' => $username,
                '212369_sandi' => $password,
            ])
            ->get()
            ->getRowArray();
    }

    // public function getDataByUsername($username)
    // {
    //     return $this->db->table('tbl_admin_212369')
    //         ->select('212369_nama') // Pilih kolom yang ingin diambil
    //         ->where('212369_usernameadmin', $username)
    //         ->get()
    //         ->getRowArray();
    // }
}

