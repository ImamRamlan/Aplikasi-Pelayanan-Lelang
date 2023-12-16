<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\m_lelang;
use App\Models\model_kendaraan;
use App\Models\m_user;

class datalelang extends BaseController
{
    protected $m_lelang;
    protected $model_kendaraan;
    protected $m_user;
    public function __construct()
    {
        $this->m_lelang = new m_lelang();
        $this->model_kendaraan = new model_kendaraan();
        $this->m_user = new m_user();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_lelang') ? $this->request->getVar('page_lelang') : 1;
        $gambarList = array_diff(scandir(WRITEPATH . 'uploads'), ['.', '..']);
        $data = [
            'title' => 'Data Lelang',
            'datalelang' => $this->m_lelang->Data(),
            'pager' => $this->m_lelang->pager,
            'currentPage' => $currentPage,
            'activePage' => 'datalelang'
        ];
        return view('admin/datalelang/index', $data, ['gambarList' => $gambarList]);
    }

    public function create()
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }

        helper(['form', 'url']); // Memuat helper form dan url

        $data = [
            'title' => 'Form Tambah Data Lelang',
            'kendaraan' => $this->model_kendaraan->AllData(),
            'user' => $this->m_user->findAll(),
            'activePage' => 'datalelang'
        ];
        return view('admin/datalelang/create', $data);
    }

    public function save()
    {
        $idkendaraan = $this->request->getVar('212369_idkendaraan_lelang');
        $namalelang = $this->request->getVar('212369_namalelang');
        $tanggalmulai = $this->request->getVar('212369_tanggal_mulai');
        $tanggalakhir = $this->request->getVar('212369_tanggal_akhir');
        $waktumulai = $this->request->getVar('212369_waktu_mulai');
        $waktuakhir = $this->request->getVar('212369_waktu_akhir');
        $harga = $this->request->getVar('212369_harga');
        $status = $this->request->getVar('212369_status');
        $gambar = $this->request->getFile('212369_gambar');

        $mulaiHargaKendaraan = $this->model_kendaraan->find($idkendaraan)['212369_mulaiharga'];

        if ($harga < $mulaiHargaKendaraan) {
            return redirect()->to('/datalelang/create')->with('errors', 'Harga tidak boleh kurang dari Mulai Harga Kendaraan.');
        }
        // Pastikan file ada sebelum mencoba upload
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            // Tentukan direktori upload
            $uploadPath = './assets/foto/';

            // Pindahkan file ke direktori upload
            $gambar->move($uploadPath);

            // Dapatkan nama file setelah di-upload
            $foto = $gambar->getName();
        } else {
            echo "Gagal Upload";
            die();
        }

        $insertResult = $this->m_lelang->insertData($idkendaraan, $namalelang, $tanggalmulai, $tanggalakhir, $waktumulai, $waktuakhir, $harga, $foto, $status);

        if ($insertResult) {
            return redirect()->to('/datalelang');
        } else {
            return redirect()->to('/datalelang/create')->with('errors', 'Harga tidak boleh kurang dari Mulai Harga Kendaraan.');
        }
    }
    public function delete($idlelang)
    {
        $this->m_lelang->delete($idlelang);
        session()->setFlashdata('hapus', 'Data Berhasil Dihapus.');

        return redirect()->to('/datalelang');
    }
    public function edit($idlelang)
    {
        if (session()->get('log') != TRUE) {
            return redirect()->to('/login');
        }
        helper(['form', 'url']);
        $data = [
            'title' => 'Form Edit Data Lelang',
            'kendaraan' => $this->model_kendaraan->AllData(),
            'user' => $this->m_user->findAll(),
            'lelang' => $this->m_lelang->find($idlelang),
            'activePage' => 'datalelang'
        ];

        return view('admin/datalelang/edit', $data);
    }

    public function update()
    {
        $idkendaraan = $this->request->getVar('212369_idkendaraan_lelang');
        $namalelang = $this->request->getVar('212369_namalelang');
        $tanggalmulai = $this->request->getVar('212369_tanggal_mulai');
        $tanggalakhir = $this->request->getVar('212369_tanggal_akhir');
        $waktumulai = $this->request->getVar('212369_waktu_mulai');
        $waktuakhir = $this->request->getVar('212369_waktu_akhir');
        $harga = $this->request->getVar('212369_harga');
        $status = $this->request->getVar('212369_status');
        $idLelang = $this->request->getVar('212369_idlelang'); // ID Lelang yang akan diupdate

        // Ambil Mulai Harga Kendaraan untuk validasi
        $mulaiHargaKendaraan = $this->model_kendaraan->find($idkendaraan)['212369_mulaiharga'];

        // Validasi harga
        if ($harga < $mulaiHargaKendaraan) {
            return redirect()->to("/datalelang/edit/{$idLelang}")->with('errors', 'Harga tidak boleh kurang dari Mulai Harga Kendaraan.');
        }

        // Ambil gambar saat ini
        $gambarSaatIni = $this->m_lelang->find($idLelang)['212369_gambar'];

        // Periksa apakah ada file gambar baru diupload
        $gambarBaru = $this->request->getFile('212369_gambar');

        try {
            // Cek apakah ada gambar baru yang diupload
            if ($gambarBaru->getSize() > 0) {
                // Tentukan direktori upload
                $uploadPath = './assets/foto/';

                // Hapus gambar saat ini (jika ada)
                if (!empty($gambarSaatIni) && file_exists($uploadPath . $gambarSaatIni)) {
                    unlink($uploadPath . $gambarSaatIni);
                }

                // Pindahkan file ke direktori upload
                $gambarBaru->move($uploadPath);

                // Dapatkan nama file setelah di-upload
                $gambar = $gambarBaru->getName();
            } else {
                // Gunakan gambar saat ini jika tidak ada gambar baru
                $gambar = $gambarSaatIni;
            }

            // Gunakan metode ORM untuk update data
            $updateResult = $this->m_lelang->update($idLelang, [
                '212369_idkendaraan_lelang' => $idkendaraan,
                '212369_namalelang' => $namalelang,
                '212369_tanggal_mulai' => $tanggalmulai,
                '212369_tanggal_akhir' => $tanggalakhir,
                '212369_waktu_mulai' => $waktumulai,
                '212369_waktu_akhir' => $waktuakhir,
                '212369_harga' => $harga,
                '212369_gambar' => $gambar,
                '212369_status' => $status
            ]);

            if ($updateResult) {
                return redirect()->to('/datalelang')->with('success', 'Data lelang berhasil diupdate.');
            } else {
                return redirect()->to("/datalelang/edit/{$idLelang}")->with('errors', 'Gagal mengupdate data lelang.');
            }
        } catch (\Exception $e) {
            // Log the exception or print the error message for debugging
            return redirect()->to("/datalelang/edit/{$idLelang}")->with('errors', 'Exception: ' . $e->getMessage());
        }
    }

    public function export_pdf()
    {
        $data['datalelang'] = $this->m_lelang->Data();

        // Load library dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load the view file into the HTML variable
        $html = view('admin/datalelang/export_pdf', $data);

        $dompdf->loadHtml($html, 'UTF-8');

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the PDF (first rendering pass to get the total pages)
        $dompdf->render();

        // Stream the file
        $dompdf->stream('Data_lelang.pdf', ['Attachment' => false]);
    }
    public function status($status, $idLelang)
    {
        // Validasi status yang diterima (opsional, tergantung kebutuhan)
        $validStatus = ['Aktif', 'Selesai', 'Batal'];
        if (!in_array($status, $validStatus)) {
            return redirect()->to('/datalelang')->with('errors', 'Status tidak valid.');
        }

        // Update status pada database
        $updateResult = $this->m_lelang->updateStatus($idLelang, $status);

        if ($updateResult) {
            return redirect()->to('/datalelang')->with('success', 'Status berhasil diupdate.');
        } else {
            return redirect()->to('/datalelang')->with('errors', 'Gagal mengupdate status.');
        }
    }
}
