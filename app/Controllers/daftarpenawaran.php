<?php

namespace App\Controllers;

use App\Models\m_lelang;
use App\Models\m_penawaran;
use App\Models\M_User;

class daftarpenawaran extends BaseController
{
    protected $m_penawaran;
    protected $m_lelang;
    protected $m_User;

    public function __construct()
    {
        $this->m_penawaran = new m_penawaran();
        $this->m_lelang = new m_lelang();
        $this->m_User = new M_User();
    }

    public function index()
    {
        if (!session()->get('log')) {
            return redirect()->to('/login');
        }
        $data = [
            'title' => 'Daftar Penawaran',
            'lelang' => $this->m_lelang->Data(),
            'activePage' => 'daftarpenawaran'
        ];
        return view('admin/daftarpenawaran/index', $data);
    }

    public function tampil($idlelang)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        $lelang = $this->m_lelang->find($idlelang);

        $penawaran = $this->m_penawaran->getPenawaranByLelang($idlelang);
        $pemenang = $this->m_penawaran->getPemenang($idlelang);

        $data = [
            'title' => 'Form',
            'lelang' => $lelang,
            'penawaran' => $penawaran,
            'pemenang' => $pemenang,
            'activePage' => 'daftarpenawaran'
        ];

        return view('admin/daftarpenawaran/tampil', $data);
    }

    public function create($idlelang)
    {
        if (session()->get('log') !== TRUE) {
            return redirect()->to('/login');
        }

        $lelang = $this->m_lelang->find($idlelang);
        $penawaran = $this->m_penawaran->getPreviousBid($idlelang);
        helper(['form', 'url']);

        $data = [
            'title' => 'Create Penawaran',
            'idlelang' => $idlelang,
            'penawaran' => $penawaran,
            'user' => $this->m_User->findAll(),
            'lelang' => $lelang,
            'activePage' => 'daftarpenawaran'
        ];

        return view('admin/daftarpenawaran/create', $data);
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
        return redirect()->to('/daftarpenawaran/tampil/' . $data['212369_idlelang']);
    }
    public function delete($idpenawaran)
    {
        $this->m_penawaran->delete($idpenawaran);
        session()->setFlashdata('hapus', 'Penawaran berhasil dihapus.');
        return redirect()->to('/daftarpenawaran');
    }
    public function printPDF()
    {
        // Load the Dompdf library
        $dompdf = new \Dompdf\Dompdf();

        // Fetch data needed for the PDF
        $start_date = $this->request->getPost('start_date');
        $end_date = $this->request->getPost('end_date');
        
        // Fetch data for the PDF content (replace with your logic)
        $data = [
            'title' => 'Laporan Penawaran',
            'penawaran' => $this->m_penawaran->getPenawaranByDateRange($start_date, $end_date), // Replace with your method to get data by date range
        ];

        // Load the view file into Dompdf
        $html = view('admin/daftarpenawaran/pdf', $data);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size (A4)
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first render to check for errors, then stream to browser)
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('laporan_penawaran.pdf', ['Attachment' => 0]);
    }
}
