<?php

namespace App\Models;

use CodeIgniter\Model;

class m_user extends Model
{
    protected $table            = 'tbl_user_212369';
    protected $primaryKey       = '212369_iduser'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212369_nama', '212369_nik','212369_katasandi','212369_alamat','212369_jeniskelamin'];
    public function getJumlahUser()
    {
        return $this->countAll(); // Menghitung jumlah registrasi pengguna
    }
    public function getUser($iduser = false)
    {
        if($iduser == false ){
            return $this->findAll();
        }
        return $this->where(['212369_iduser' => $iduser])->first();
    }
    public function allData()
    {
        return $this->db->table('tbl_user_212369')
            ->Get()->getResultArray();
    }
    public function paginateData($perPage, $table)
    {
        return $this->paginate($perPage, $table);
    }
    

}