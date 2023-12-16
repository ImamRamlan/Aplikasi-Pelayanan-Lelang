<?php

namespace App\Controllers;

use App\Models\m_user;

class datauser extends BaseController
{
	protected $m_user;
	public function __construct()
	{
		$this->m_user = new m_user();
	}
	public function index()
	{
		$currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
		$data = [
			'title' => 'Data User',
			'datauser' => $this->m_user->paginateData(5, 'tbl_user_212369'), // Menggunakan fungsi paginasi dari model
			'pager' => $this->m_user->pager,
			'currentPage' => $currentPage,
			'activePage' => 'datauser'
		];

		return view('admin/datauser/index', $data);
	}
	public function detail($id_user)
	{
		if (session()->get('log') != TRUE) {
			return redirect()->to('/login');
		}
		$data = [
			'title' => 'Detail User',
			'datauser' => $this->m_user->getUser($id_user),
			'activePage' => 'datauser'
		];

		return view('admin/datauser/detail', $data);
	}
	public function create()
	{
		if (session()->get('log') != TRUE) {
			return redirect()->to('/login');
		}
		$data = [
			'title' => 'Form Tambah Data User',
			'validation' => \Config\Services::validation(),
			'activePage' => 'datauser'
		];
		return view('admin/datauser/create', $data);
	}
	public function save()
	{
		if (session()->get('log') != TRUE) {
			return redirect()->to('/login');
		}
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
		if (!$this->validate($rules)) {
			return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
		}
		$this->m_user->save([
			'212369_nama' => $this->request->getVar('212369_nama'),
			'212369_nik' => $this->request->getVar('212369_nik'),
			'212369_katasandi' => $this->request->getVar('212369_katasandi'),
			'212369_alamat' => $this->request->getVar('212369_alamat'),
			'212369_jeniskelamin' => $this->request->getVar('212369_jeniskelamin'),
		]);

		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');

		return redirect()->to('/datauser');
	}
	public function delete($iduser)
	{
		if (session()->get('log') != TRUE) {
			return redirect()->to('/login');
		}
		$this->m_user->delete($iduser);
		session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

		return redirect()->to('/datauser');
	}
	public function edit($iduser)
	{
		if (session()->get('log') != TRUE) {
			return redirect()->to('/login');
		}
		$data = [
			'title' => 'Form Ubah Data User',
			'validation' => \Config\Services::validation(),
			'datauser' => $this->m_user->getUser($iduser),
			'activePage' => 'datauser'
		];

		return view('admin/datauser/edit', $data);
	}

	public function update($iduser)
	{
		if (session()->get('log') != TRUE) {
			return redirect()->to('/login');
		}
		$rules = [
			'212369_nik' => [
				'rules' => 'required|min_length[10]|numeric',
				'errors' => [
					'required' => 'Nik Harus Diisi.',
					'min_length' => 'Nik minimal 10 Angka',
					'numeric' => 'Wajib Angka'
				]
			]
		];
		if (!$this->validate($rules)) {
			// session()->setFlashdata('errors',$this->validator->listErrors());
			return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
		}
		$this->m_user->save([
			'212369_iduser' => $iduser,
			'212369_nama' => $this->request->getVar('212369_nama'),
			'212369_nik' => $this->request->getVar('212369_nik'),
			'212369_katasandi' => $this->request->getVar('212369_katasandi'),
			'212369_alamat' => $this->request->getVar('212369_alamat'),
			'212369_jeniskelamin' => $this->request->getVar('212369_jeniskelamin'),
		]);

		session()->setFlashdata('pesan', 'Data Berhasil Diubah.');

		return redirect()->to('/datauser');
	}
	public function exportpdf()
	{
		// Fetch data to be exported
		$data = [
			'title' => 'Data User',
			'datauser' => $this->m_user->allData(), // Assuming you have a function to fetch all data in your model
		];

		// Load the view content into a variable
		$html = view('admin/datauser/pdf', $data);

		// Load dompdf
		$options = new \Dompdf\Options();
		$options->set('isHtml5ParserEnabled', true);
		$options->set('isPhpEnabled', true);
		$dompdf = new \Dompdf\Dompdf($options);

		// Load HTML content
		$dompdf->loadHtml($html);

		// Set paper size
		$dompdf->setPaper('A4', 'portrait');

		// Render PDF (first pass to get the size)
		$dompdf->render();

		// Stream the file or save it
		$dompdf->stream('exported_data.pdf', ['Attachment' => false]);
		// $dompdf->output(); // Use this if you want to save the PDF to a file

		exit();
	}
}
