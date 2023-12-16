<?php

namespace App\Models;

use CodeIgniter\Model;

class m_lelang extends Model
{
    protected $table = 'tbl_lelang_212369';
    protected $primaryKey = '212369_idlelang';
    protected $allowedFields = ['212369_idkendaraan_lelang', '212369_namalelang', '212369_tanggal_mulai', '212369_tanggal_akhir', '212369_waktu_mulai', '212369_waktu_akhir', '212369_harga', '212369_gambar', '212369_status'];

    public function getJumlahLelang()
    {
        return $this->countAll(); // Menghitung jumlah registrasi pengguna
    }
    public function Data()
    {
        return $this->db->table('tbl_lelang_212369')
            ->join('tbl_kendaraan_212369', 'tbl_kendaraan_212369.212369_idkendaraan=tbl_lelang_212369.212369_idkendaraan_lelang', 'left')
            ->Get()->getResultArray();
    }
    public function allDatas($iduser = null)
    {
        return $this->db->table('tbl_lelang_212369')
            ->join('tbl_kendaraan_212369', 'tbl_kendaraan_212369.212369_idkendaraan=tbl_lelang_212369.212369_idkendaraan_lelang', 'left')
            ->where('tbl_user_212369.212369_iduser', $iduser)
            ->Get()
            ->getResultArray();
    }
    function insertData($idkendaraan, $namalelang, $tanggalmulai, $tanggalakhir, $waktumulai, $waktuakhir, $harga, $foto, $status)
    {
        $sql = "INSERT INTO tbl_lelang_212369(212369_idkendaraan_lelang,212369_namalelang   , 212369_tanggal_mulai, 212369_tanggal_akhir,212369_waktu_mulai,212369_waktu_akhir,212369_harga,212369_gambar,212369_status) VALUES('$idkendaraan','$namalelang','$tanggalmulai','$tanggalakhir','$waktumulai','$waktuakhir','$harga','$foto','$status')";

        $query = $this->db->query($sql);
        return $query;
    }
    public function updateData($idLelang, $namalelang, $idkendaraan, $tanggalmulai, $tanggalakhir, $waktumulai, $waktuakhir, $harga, $status, $gambar)
    {
        try {
            $data = [
                '212369_idkendaraan_lelang' => $idkendaraan,
                '212369_namalelang' => $namalelang,
                '212369_tanggal_mulai' => $tanggalmulai,
                '212369_tanggal_akhir' => $tanggalakhir,
                '212369_waktu_mulai' => $waktumulai,
                '212369_waktu_akhir' => $waktuakhir,
                '212369_harga' => $harga,
                '212369_gambar' => $gambar,
                '212369_status' => $status
            ];

            $this->where('212369_idlelang', $idLelang)->set($data)->update();

            return true; // Return true if the update is successful
        } catch (\Exception $e) {
            return false; // Return false if there's an exception during the update
        }
    }
    public function updateStatus($idLelang, $status)
    {
        try {
            $data = [
                '212369_status' => $status
            ];

            $this->where('212369_idlelang', $idLelang)->set($data)->update();

            return true; // Return true if the update is successful
        } catch (\Exception $e) {
            return false; // Return false if there's an exception during the update
        }
    }
}
