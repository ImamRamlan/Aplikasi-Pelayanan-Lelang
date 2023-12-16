<?php

namespace App\Controllers;

use App\Models\m_kategori;

class kategori extends BaseController
{
	protected $m_kategori;
	public function __construct()
	{
		$this->m_kategori = new m_kategori();
	}
    public function index()
    {
        if(session()->get('log') != TRUE){
            return redirect()->to('/login');
        }
        $currentPage = $this->request->getVar('page_kategori') ? $this->request->getVar('page_kategori') : 1;
        $data = [
            'title' => 'Kategori Produk',
            'kategori' => $this->m_kategori->Data(),
			'pager' => $this->m_kategori->pager,
			'currentPage' => $currentPage,
            'activePage' => 'kategori'
        ];
        return view('admin/kategori/index',$data);
    }
    // public function create()
	// {
	// 	if(session()->get('log') != TRUE){
    //         return redirect()->to('/login');
    //     }
	// 	$data = [
	// 		'title' => 'Form Tambah Data Lelang',
    //         'kendaraan' => $this->model_kendaraan->AllData()
	// 	];
	// 	return view ('admin/datalelang/create', $data);
	// }
    public function save()
    {
        $namakategori = $this->request->getVar('namakategori');

        $this->m_kategori->insertData($namakategori);
        session()->setFlashdata('pesan','Data Berhasil Ditambahkan.');
        return redirect()->to('/kategori');
    }
}
