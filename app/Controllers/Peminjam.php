<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku;
use App\Models\Peminjam as ModelsPeminjam;
use App\Models\Student;

class Peminjam extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsPeminjam();
        $this->studentModel = new Student();
        $this->bukuModel = new Buku();
    }

    public function index()
    {
        try {
            $data = [
                'students' => $this->studentModel->findAll(),
                'books' => $this->bukuModel->findAll(),
            ];
            
            $data['peminjams'] = $this->model->findAll();
            
            $data['page'] = 'peminjam';

            if ($this->request->isAJAX()) {
                return view('peminjam/load', $data);
            }

            return view('peminjam/index', $data);
        } catch (\Throwable $th) {
            //throw $th;

            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Error ' . $th->getMessage(),
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->with('error', 'Error ' . $th->getMessage());
            }
        }
    }

    public function new()
    {
        try {
            $data = [
                'students' => $this->studentModel->findAll(),
                'books' => $this->bukuModel->findAll(),
            ];

            if ($this->request->isAJAX()) {
                return view('_partials/modals/peminjam', $data);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Error ' . $th->getMessage(),
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->with('error', 'Error ' . $th->getMessage());
            }
        }
    }

    public function create()
    {
        try {
            $nama_peminjam = $this->request->getPost('peminjam');
            $judul_buku = $this->request->getPost('buku');
            $tgl_pinjam = $this->request->getPost('tgl_pinjam');
            $tgl_kembali = $this->request->getPost('tgl_kembali');
            $ket = ($tgl_kembali == null) ? 'belum' : 'kembali';

            $peminjams = $this->studentModel->getWhere(['nama' => $nama_peminjam]);

            $bukus = $this->bukuModel->getWhere(['judul' => $judul_buku]);

            $peminjam = $peminjams->getResult();
            $buku = $bukus->getResult();

            $data = [
                'nama' => $peminjam[0]->nama,
                'student_id' => $peminjam[0]->student_id,
                'judul_buku' => $buku[0]->judul,
                'buku_id' => $buku[0]->buku_id,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'ket' => $ket,
            ];

            $this->model->insert($data);

            $msg = 'Berhasil Tambah Data Peminjam';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('peminjam')->with('success', $msg);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Error ' . $th->getMessage(),
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->withInput()->with('error', 'Error ' . $th->getMessage());
            }
        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'students' => $this->studentModel->findAll(),
                'books' => $this->bukuModel->findAll(),
            ];

            $data['peminjam'] = $this->model->find($id);

            if ($this->request->isAJAX()) {
                return view('_partials/modals/peminjam', $data);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Error ' . $th->getMessage(),
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->with('error', 'Error ' . $th->getMessage());
            }
        }
    }

    public function update($id)
    {
        try {
            $nama_peminjam = $this->request->getPost('peminjam');
            $judul_buku = $this->request->getPost('buku');
            $tgl_pinjam = $this->request->getPost('tgl_pinjam');
            $tgl_kembali = $this->request->getPost('tgl_kembali');
            $ket = ($tgl_kembali == null) ? 'belum' : 'kembali';

            $peminjams = $this->studentModel->getWhere(['nama' => $nama_peminjam]);

            $bukus = $this->bukuModel->getWhere(['judul' => $judul_buku]);

            $peminjam = $peminjams->getResult();
            $buku = $bukus->getResult();

            $data = [
                'nama' => $peminjam[0]->nama,
                'student_id' => $peminjam[0]->student_id,
                'judul_buku' => $buku[0]->judul,
                'buku_id' => $buku[0]->buku_id,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'ket' => $ket,
            ];

            $this->model->update($id, $data);

            $msg = 'Berhasil Ubah Data Peminjam';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('peminjam')->with('success', $msg);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Error ' . $th->getMessage(),
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->withInput()->with('error', 'Error ' . $th->getMessage());
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);

            $msg = 'Berhasil Hapus Data Peminjam';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->back()->with('success', $msg);
            }
        } catch (\Throwable $th) {
            //throw $th;

            if ($this->request->isAJAX()) {
                $data = [
                    'error' => true,
                    'msg' => 'Error ' . $th->getMessage(),
                ];

                return $this->response->setJSON($data);
            }
        }
    }
}
