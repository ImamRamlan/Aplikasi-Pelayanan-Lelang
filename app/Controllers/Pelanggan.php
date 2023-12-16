<?php

namespace App\Controllers;

use App\Models\m_login;
use App\Models\m_lelang;
use App\Models\m_penawaran;
use App\Models\m_user;
use App\Models\model_kendaraan;

class Pelanggan extends BaseController
{
    protected $m_login;
    protected $m_lelang;
    protected $m_penawaran;
    protected $m_user;
    protected $model_kendaraan;
    protected $currentRoute;
    
    public function __construct()
    {
        $this->m_login = new m_login();
        $this->m_lelang = new m_lelang();
        $this->m_penawaran = new m_penawaran();
        $this->m_user = new m_user();
        $this->model_kendaraan = new model_kendaraan();
        $this->currentRoute = service('router')->controllerName();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda Pelanggan',
            'lelang' => $this->m_lelang->Data(),
            'penawaran' => $this->m_penawaran->allData(),
            'currentRoute' => $this->currentRoute,
        ];

        return view('pelanggan/index', $data);
    }
    public function tampil($idlelang)
    {
        $lelang = $this->m_lelang->find($idlelang);
        $penawaran = $this->m_penawaran->getPenawaranByLelang($idlelang);
        $pemenang = $this->m_penawaran->getPemenang($idlelang);
        $data = [
            'title' => 'Beranda Pelanggan',
            'lelang' => $lelang,
            'penawaran' => $penawaran,
            'pemenang' => $pemenang,
            'currentRoute' => $this->currentRoute,
        ];

        return view('pelanggan/lelang/index', $data);
    }
    public function buat($idlelang)
    {
        // Check if the user is logged in
        if (!session('log')) {
            return redirect()->to('/auth'); // Redirect to login if not logged in
        }

        $iduser = session('iduser');

        $lelang = $this->m_lelang->find($idlelang);
        $user = $this->m_penawaran->getPenawaranByUser($iduser);
        $penawaran = $this->m_penawaran->getPreviousBid($idlelang);
        helper(['form', 'url']);

        $data = [
            'title' => 'Buat Penawaran',
            'idlelang' => $idlelang,
            'user' => $user,
            'penawaran' => $penawaran,
            'lelang' => $lelang,
            'currentRoute' => $this->currentRoute,
        ];

        return view('pelanggan/lelang/buat', $data);
    }

    public function store()
    {
        // Aturan validasi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'idlelang' => 'required',
            'iduser' => 'required',
            '212369_jumlahpenawaran' => 'required|numeric',
            'waktupenawaran' => 'required',
            'tanggalpenawaran' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $lelang = $this->m_lelang->find($this->request->getPost('idlelang'));

        if ($lelang === null) {
            $errors = ['Lelang tidak ditemukan.'];
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $penawaranSebelumnya = $this->m_penawaran->getPreviousBid($this->request->getPost('idlelang'));

        $data = [
            '212369_idlelang' => $this->request->getPost('idlelang'),
            '212369_iduser' => $this->request->getPost('iduser'),
            '212369_jumlahpenawaran' => $this->request->getPost('212369_jumlahpenawaran'),
            '212369_waktupenawaran' => $this->request->getPost('waktupenawaran'),
            '212369_tanggalpenawaran' => $this->request->getPost('tanggalpenawaran'),
        ];
        $tanggalAkhir = $lelang['212369_tanggal_akhir'];
        if ($data['212369_tanggalpenawaran'] > $tanggalAkhir) {
            $errors = ['Tanggal Penawaran tidak dapat melebihi Tanggal Akhir.'];
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $waktuAkhir = $lelang['212369_waktu_akhir'];
        $tanggalWaktuAkhir = $tanggalAkhir . ' ' . $waktuAkhir;
        $tanggalPenawaran = $data['212369_tanggalpenawaran'] . ' ' . $data['212369_waktupenawaran'];
        if (strtotime($tanggalPenawaran) > strtotime($tanggalWaktuAkhir)) {
            $errors = ['Waktu Penawaran tidak dapat melebihi Waktu Akhir.'];
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        if (!isset($lelang['212369_harga']) || ($penawaranSebelumnya && $data['212369_jumlahpenawaran'] <= $penawaranSebelumnya['212369_jumlahpenawaran'])) {
            $errors = ['Jumlah penawaran harus lebih besar dari penawaran sebelumnya dan harga lelang.'];
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $this->m_penawaran->insert($data);
        session()->setFlashdata('pesan', 'Penawaran berhasil ditambahkan.');
        return redirect()->to('/pelanggan/tampil/' . $data['212369_idlelang']);
    }

}
