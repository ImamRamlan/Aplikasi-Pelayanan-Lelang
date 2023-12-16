<?php

namespace App\Models;

use CodeIgniter\Model;

class model_kendaraan extends Model
{
    protected $table = 'tbl_kendaraan_212369';
    protected $primaryKey = '212369_idkendaraan';
    protected $allowedFields = [
        '212369_iduser_penjual',
        '212369_namakendaraan',
        '212369_idkategori',
        '212369_merek',
        '212369_model',
        '212369_no_mesin',
        '212369_no_rangka',
        '212369_deskripsi',
        '212369_mulaiharga'
    ];
    // protected $cascadeDelete = true;
    // public function m_lelang()
    // {
    //     return $this->hasOne(m_lelang::class, '212369_idkendaraan_lelang', '212369_idkendaraan');
    // }
    public function getJumlahKendaraan()
    {
        return $this->countAll(); // Menghitung jumlah registrasi pengguna
    }
    // public function allData()
    // {
    //     return $this->db->table('tbl_kendaraan_212369')
    //         ->join('tbl_kategori_212369', 'tbl_kategori_212369.212369_idkategori=tbl_kendaraan_212369.212369_idkategori', 'left')
    //         ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser=tbl_kendaraan_212369.212369_iduser_penjual', 'left')
    //         ->Get()->getResultArray();
    // }
    public function paginateData($perPage, $table)
    {
        return $this->paginate($perPage, $table);
    }
    public function allDatas($iduser = null)
    {
        return $this->db->table('tbl_kendaraan_212369')
            ->join('tbl_kategori_212369', 'tbl_kategori_212369.212369_idkategori=tbl_kendaraan_212369.212369_idkategori', 'left')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser=tbl_kendaraan_212369.212369_iduser_penjual', 'left')
            ->select('tbl_kendaraan_212369.*, tbl_kategori_212369.212369_namakategori, tbl_user_212369.212369_nama, tbl_kendaraan_212369.212369_idkendaraan') // Include the column here
            ->where('tbl_kendaraan_212369.212369_iduser_penjual', $iduser)
            ->Get()
            ->getResultArray();
    }
    public function allData()
    {
        return $this->db->table('tbl_kendaraan_212369')
            ->join('tbl_kategori_212369', 'tbl_kategori_212369.212369_idkategori=tbl_kendaraan_212369.212369_idkategori', 'left')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser=tbl_kendaraan_212369.212369_iduser_penjual', 'left')
            ->select('tbl_kendaraan_212369.*, tbl_kategori_212369.212369_namakategori, tbl_user_212369.212369_nama, tbl_kendaraan_212369.212369_idkendaraan') // Include the column here
            ->Get()
            ->getResultArray();
    }
    public function getKendaraan($idkendaraan = false)
    {
        if ($idkendaraan == false) {
            return $this->findAll();
        }
        return $this->where(['212369_idkendaraan' => $idkendaraan])->first();
    }
}
