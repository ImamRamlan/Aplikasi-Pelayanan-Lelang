<?php

namespace App\Controllers;
use App\Models\m_lelang;
use App\Models\m_penawaran;
class lelang extends BaseController
{
    protected $m_lelang;
    protected $m_penawaran;
    public function __construct()
    {
        $this->m_lelang = new m_lelang();
        $this->m_penawaran = new m_penawaran();
    }
    
    public function index()
    {
        // $lelang = $this->m_lelang->find($idlelang);
        // $penawaran = $this->m_penawaran->getPenawaranByLelang($idlelang);
        // $pemenang = $this->m_penawaran->getPemenang($idlelang);
        $data = [
            'title' => 'Beranda Pelanggan',

        ];

        return view('pelanggan/lelang/index', $data);
    }
}
