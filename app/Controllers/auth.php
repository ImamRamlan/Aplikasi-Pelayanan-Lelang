<?php

namespace App\Controllers;

use App\Models\m_auth;

class auth extends BaseController
{
    protected $m_auth;

    public function __construct()
    {
        $this->m_auth = new m_auth();
    }

    public function index()
    {
        return view('pelanggan/login');
    }

    public function log()
    {
        $iduser = $this->request->getPost('212369_iduser');
        $nik = $this->request->getPost('212369_nik');
        $password = $this->request->getPost('212369_katasandi');
        $nama = $this->request->getPost('212369_nama');

        $cek_admin = $this->m_auth->auth_pelanggan($nik, $password, $nama,$iduser);

        if ($cek_admin) {
            session()->set([
                'log' => true,
                'nik' => $cek_admin['212369_nik'],
                'password' => $cek_admin['212369_katasandi'],
                'nama' => $cek_admin['212369_nama'],
                'iduser' => $cek_admin['212369_iduser']
            ]);
            return redirect()->to('/pelanggan');
        } else {
            session()->setFlashdata('gagal', 'Login Gagal');
            session()->setFlashdata('salah', 'Nik atau Kata sandi salah ');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nik');
        session()->remove('password');
        session()->remove('nama');
        session()->remove('iduser');
        return redirect()->to('/auth');
    }
}
