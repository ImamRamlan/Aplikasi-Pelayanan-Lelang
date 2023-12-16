<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\model_kendaraan;
use App\Models\m_kategori;
use App\Models\m_user;

class DataKendaraan extends BaseController
{
    protected $m_kendaraan;
    protected $m_kategori;
    protected $m_user;
    public function __construct()
    {
        $this->m_kendaraan = new model_kendaraan();
        $this->m_kategori = new m_kategori();
        $this->m_user = new m_user();
    }
    public function index()
    {
        $model = new model_kendaraan();
        $currentPage = $this->request->getVar('page_kendaraan') ? $this->request->getVar('page_kendaraan') : 1;

        // Memanggil fungsi pada model
        $someData = $this->m_kendaraan->allData();

        $data = [
            'title' => 'Data Kendaraan',
            'kendaraans' => $model->paginateData(5, 'tbl_kendaraan_212369'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'someData' => $someData, // Menyertakan data hasil panggilan fungsi
            'activePage' => 'datakendaraan'
        ];

        return view('admin/datakendaraan/index', $data);
    }

    public function create()
    {
        $model = new m_kategori();
        $model_user = new m_user();

        $data = [
            'title' => 'Form Tambah Data',
            'kategori' => $model->findAll(),
            'user' => $model_user->findAll(),
            'activePage' => 'datakendaraan'
        ];

        return view('admin/datakendaraan/create', $data);
    }

    public function store()
    {
        $model = new model_kendaraan();

        // Validation rules
        $validationRules = [
            '212369_iduser_penjual' => 'required',
            '212369_namakendaraan' => 'required',
            '212369_idkategori' => 'required',
            '212369_merek' => 'required',
            '212369_model' => 'required',
            '212369_no_mesin' => 'required|numeric',
            '212369_no_rangka' => 'required|numeric',
            '212369_deskripsi' => 'required',
            '212369_mulaiharga' => 'required|numeric',
        ];

        // Custom error messages
        $validationMessages = [
            '212369_iduser_penjual' => [
                'required' => 'Masukkan Nama Penjual.'
            ],
            '212369_namakendaraan' => [
                'required' => 'Masukkan Nama Kendaraan.'
            ],
            '212369_idkategori' => [
                'required' => 'Masukkan Nama Kategori.'
            ],
            '212369_merek' => [
                'required' => 'Masukkan Merek Kendaraan.'
            ],
            '212369_model' => [
                'required' => 'Masukkan Model Kendaraan.'
            ],
            '212369_no_mesin' => [
                'required' => 'Masukkan No Mesin.',
                'numeric' => 'No Mesin Harus Angka.'
            ],
            '212369_no_rangka' => [
                'required' => 'Masukkan No Rangka.',
                'numeric' => 'No Rangka Harus Angka.'
            ],
            '212369_deskripsi' => [
                'required' => 'Deskripsi Anda.'
            ],
            '212369_mulaiharga' => [
                'required' => 'Masukkan Harga.',
                'numeric' => 'Harga harus angka.'
            ],
        ];

        // Validate the form data
        if ($this->request->getMethod() === 'post' && $this->validate($validationRules, $validationMessages)) {
            // Save data to the database
            $model->save($this->request->getPost());
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to('/datakendaraan');
        } else {
            return redirect()->to('/datakendaraan/create')->withInput()->with('validation', $this->validator);
        }
    }

    public function edit($idkendaraan)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Form Ubah Data',
            'kendaraan' => $this->m_kendaraan->getKendaraan($idkendaraan),
            'kategori' => $this->m_kategori->findAll(),
            'user' => $this->m_user->findAll(),
            'validation' => \Config\Services::validation(),
            'activePage' => 'datakendaraan'
        ];

        return view('admin/datakendaraan/edit', $data);
    }

    public function update($idkendaraan)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $this->m_kendaraan->save([
            '212369_idkendaraan' => $idkendaraan,
            '212369_iduser_penjual' => $this->request->getVar('212369_iduser_penjual'),
            '212369_namakendaraan' => $this->request->getVar('212369_namakendaraan'),
            '212369_idkategori' => $this->request->getVar('212369_idkategori'),
            '212369_merek' => $this->request->getVar('212369_merek'),
            '212369_model' => $this->request->getVar('212369_model'),
            '212369_no_mesin' => $this->request->getVar('212369_no_mesin'),
            '212369_no_rangka' => $this->request->getVar('212369_no_rangka'),
            '212369_deskripsi' => $this->request->getVar('212369_deskripsi'),
            '212369_mulaiharga' => $this->request->getVar('212369_mulaiharga'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diupdate.');

        return redirect()->to('/datakendaraan');
    }

    public function delete($idkendaraan)
    {
        $model = new \App\Models\model_kendaraan();
        $model->delete($idkendaraan);

        // Set success message
        session()->setFlashdata('pesan', 'Data Kendaraan Berhasil Dihapus.');

        return redirect()->to('/datakendaraan');
    }
    public function export_pdf()
    {
        helper('url');
        $model = new model_kendaraan();
        $data['kendaraan'] = $model->allData();

        // Load library dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load the view file into the HTML variable
        $html = view('admin/datakendaraan/export_pdf', $data);

        $dompdf->loadHtml($html, 'UTF-8');

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF (first rendering pass to get the total pages)
        $dompdf->render();

        // Stream the file
        $dompdf->stream('Data_kendaraan.pdf', ['Attachment' => false]);
    }
}
