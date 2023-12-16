<?php

namespace App\Models;

use CodeIgniter\Model;

class m_penawaran extends Model
{
    protected $table = 'tbl_penawaran_212369';
    protected $primaryKey = '212369_idpenawaran';
    protected $allowedFields = ['212369_idlelang', '212369_iduser', '212369_jumlahpenawaran', '212369_waktupenawaran', '212369_tanggalpenawaran'];
    public function getRiwayatPenawaran($iduser, $idlelang)
    {
        return $this->where('212369_iduser', $iduser)
            ->where('212369_idlelang', $idlelang)
            ->orderBy('212369_tanggalpenawaran', 'DESC')
            ->findAll();
    }
    public function getJumlahPenawaran()
    {
        return $this->countAll();
    }
    public function allData()
    {
        return $this->db->table('tbl_penawaran_212369')
            ->join('tbl_lelang_212369', 'tbl_lelang_212369.212369_idlelang=tbl_penawaran_212369.212369_idlelang', 'left')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser=tbl_penawaran_212369.212369_iduser', 'left')
            ->get()->getResultArray();
    }

    public function getPenawaranByLelang($idlelang)
    {
        return $this->db->table('tbl_penawaran_212369')
            ->join('tbl_lelang_212369', 'tbl_lelang_212369.212369_idlelang=tbl_penawaran_212369.212369_idlelang', 'left')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser=tbl_penawaran_212369.212369_iduser', 'left')
            ->where('tbl_penawaran_212369.212369_idlelang', $idlelang)
            ->get()->getResultArray();
    }
    public function getPenawaranByUser($iduser)
    {
        return $this->db->table('tbl_penawaran_212369')
            ->join('tbl_lelang_212369', 'tbl_lelang_212369.212369_idlelang=tbl_penawaran_212369.212369_idlelang', 'left')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser=tbl_penawaran_212369.212369_iduser', 'left')
            ->where('tbl_penawaran_212369.212369_iduser', $iduser)
            ->get()->getResultArray();
    }

    public function getPreviousBid($idlelang)
    {
        return $this->where('212369_idlelang', $idlelang)
            ->orderBy('212369_idpenawaran', 'desc')
            ->first();
    }
    public function getPemenang($idlelang)
    {
        return $this->db->table('tbl_penawaran_212369')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser = tbl_penawaran_212369.212369_iduser')
            ->where('212369_idlelang', $idlelang)
            ->orderBy('212369_jumlahpenawaran', 'desc')
            ->limit(1)
            ->get()
            ->getRowArray();
    }
    public function getPenawaranByDateRange($start_date, $end_date)
    {
        return $this->db->table('tbl_penawaran_212369')
            ->join('tbl_lelang_212369', 'tbl_lelang_212369.212369_idlelang = tbl_penawaran_212369.212369_idlelang', 'left')
            ->join('tbl_user_212369', 'tbl_user_212369.212369_iduser = tbl_penawaran_212369.212369_iduser', 'left')
            ->where('tbl_penawaran_212369.212369_tanggalpenawaran >=', $start_date)
            ->where('tbl_penawaran_212369.212369_tanggalpenawaran <=', $end_date)
            ->get()
            ->getResultArray();
    }
}
