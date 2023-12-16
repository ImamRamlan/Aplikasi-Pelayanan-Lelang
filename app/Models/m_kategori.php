<?php

namespace App\Models;

use CodeIgniter\Model;

class m_kategori extends Model
{
    protected $table            = 'tbl_kategori_212369';
    protected $primaryKey       = '212369_idkategori'; //untuk bisa hapus maka pasang primarykey
    protected $allowedFields    = ['212369_namakategori'];

    public function getKategori($idkategori = false)
    {
        if($idkategori == false ){
            return $this->findAll();
        }
        return $this->where(['212369_idkategori' => $idkategori])->first();
    }
    public function Data()
    {
        return $this->db->table('tbl_kategori_212369')
            ->Get()->getResultArray();
    }
    function insertData($namakategori){
        $sql = "INSERT INTO tbl_kategori_212369(212369_namakategori) VALUES('$namakategori')";

        $query = $this->db->query($sql);
        return $query;
    }
    

}