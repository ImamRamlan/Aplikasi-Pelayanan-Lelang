<?php

namespace App\Controllers;
use App\Models\m_login;
use App\Models\m_lelang;
use App\Models\m_penawaran;
use App\Models\m_user;
use App\Models\model_kendaraan;
class admin extends BaseController
{
    protected $m_login;
    protected $m_lelang;
    protected $m_penawaran;
    protected $m_user;
    protected $model_kendaraan;
    public function __construct()
    {
        $this->m_login = new m_login();
        $this->m_lelang = new m_lelang();
        $this->m_penawaran = new m_penawaran();
        $this->m_user = new m_user();
        $this->model_kendaraan = new model_kendaraan();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda Admin',
            'jumlahuser' => $this->m_user->getJumlahUser(),
            'jumlahlelang' => $this->m_lelang->getJumlahLelang(),
            'jumlahpenawaran' => $this->m_penawaran->getJumlahPenawaran(),
            'jumlahkendaraan' => $this->model_kendaraan->getJumlahKendaraan(),
            'activePage' => 'admin'
        ];

        return view('admin/index', $data);
    }
}
