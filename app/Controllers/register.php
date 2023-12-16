<?php

namespace App\Controllers;
use App\Models\m_user;
class register extends BaseController
{
    protected $m_user;
	public function __construct()
	{
		$this->m_user = new m_user();
	}
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pelanggan/register',$data);
    }
    public function save()
	{
		$rules = [
			'212369_nik' => [
				'rules' => 'required|is_unique[tbl_user_212369.212369_nik]|min_length[10]|numeric',
				'errors' => [
					'required' => 'Nik Harus Diisi.',
					'is_unique' => 'Nik Sudah Terdaftar.',
                    'min_length' => 'Nik minimal 10 Angka',
                    'numeric' => 'Wajib Angka'
				]
			]
		];
		if(!$this->validate($rules)){
			return redirect()->back()->withInput()->with('errors',$this->validator->listErrors());
		}
		$this->m_user->save([
            '212369_nama' => $this->request->getVar('212369_nama'),
			'212369_nik' => $this->request->getVar('212369_nik'),
            '212369_katasandi' => $this->request->getVar('212369_katasandi'),
            '212369_alamat' => $this->request->getVar('212369_alamat'),
            '212369_jeniskelamin' => $this->request->getVar('212369_jeniskelamin'),
		]);

		session()->setFlashdata('pesan','Registrasi akun berhasil.');

		return redirect()->to('/register');
	}
}
