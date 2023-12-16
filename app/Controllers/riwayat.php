<?php

namespace App\Controllers;
use App\Models\m_penawaran;

class riwayat extends BaseController
{
    protected $currentRoute;
    protected $m_penawaran;
    public function __construct()
    {
        $this->m_penawaran = new m_penawaran();
        $this->currentRoute = service('router')->controllerName();
    }
    public function index()
    {
        $iduser = session()->get('iduser');
        $data = [
            'title' => 'Pelayanan Lelang Online',
            'penawaran' => $this->m_penawaran->getPenawaranByUser($iduser),
            'currentRoute' => $this->currentRoute,
        ];
        return view('pelanggan/riwayat',$data);
    }
}
