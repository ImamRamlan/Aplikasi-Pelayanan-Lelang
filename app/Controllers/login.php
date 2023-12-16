<?php

namespace App\Controllers;

use App\Models\m_login;

class login extends BaseController
{
    protected $m_login;

    public function __construct()
    {
        $this->m_login = new m_login();
    }

    public function index()
    {
        return view('login/loginadmin');
    }

    public function log()
	{
		$username = $this->request->getPost('212369_usernameadmin');
		$password = $this->request->getPost('212369_sandi');
		$nama = $this->request->getPost('212369_nama');
		
		$cek_admin = $this->m_login->auth_admin($username, $password, $nama);

		if ($cek_admin) {
			session()->set([
				'log' => true,
				'idadmin' => $cek_admin['212369_idadmin'],
				'username' => $cek_admin['212369_usernameadmin'],
				'password' => $cek_admin['212369_sandi'],
				'nama' => $cek_admin['212369_nama']
			]);
			return redirect()->to('/admin');
		} else {
			session()->setFlashdata('gagal', 'Login Gagal');
			session()->setFlashdata('salah', 'Username atau Password salah ');
			return redirect()->to('/login');
		}
	}

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        session()->remove('nama');
        return redirect()->to('/login');
    }
}
