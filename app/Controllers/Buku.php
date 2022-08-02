<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku as ModelsBuku;
use App\Models\Penerbit;

class Buku extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsBuku();
        $this->penerbitModel = new Penerbit();
    }

    public function index()
    {
        try {
            $books = $this->model->select('*')
                ->join('penerbits as p', 'books.penerbit_id = p.penerbit_id')
                ->get();

            $data = [
                'books' => $books->getResult(),
            ];

            $data['page'] = 'book';    

            if ($this->request->isAJAX()) {
                return view('book/load', $data);
            }

            return view('book/index', $data);
        } catch (\Throwable $th) {
            // throw $th;
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
                'penerbits' => $this->penerbitModel->findAll(),
            ];
            
            if ($this->request->isAJAX()) {
                return view('_partials/modals/book', $data);
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
            $judul = $this->request->getPost('judul_buku');
            $penulis = $this->request->getPost('penulis_buku');
            $penerbit_id = $this->request->getPost('penerbit');
            $tahun_terbit = $this->request->getPost('tahun_terbit');

            $data = [
                'judul_buku' => $judul,
                'penulis' => $penulis,
                'penerbit_id' => $penerbit_id,
                'tahun_terbit' => $tahun_terbit,
            ];

            $this->model->insert($data);

            $msg = 'Berhasil Tambah Data Buku';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('book')->with('success', $msg);
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
                'penerbits' => $this->penerbitModel->findAll(),
            ];

            $data['book'] = $this->model->find($id);

            if ($this->request->isAJAX()) {
                return view('_partials/modals/book', $data);
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
            $judul = $this->request->getPost('judul_buku');
            $penulis = $this->request->getPost('penulis_buku');
            $penerbit_id = $this->request->getPost('penerbit');
            $tahun_terbit = $this->request->getPost('tahun_terbit');

            $data = [
                'judul_buku' => $judul,
                'penulis' => $penulis,
                'penerbit_id' => $penerbit_id,
                'tahun_terbit' => $tahun_terbit,
            ];

            $this->model->update($id, $data);

            $msg = 'Berhasil Ubah Data Buku';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('book')->with('success', $msg);
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

            $msg = 'Berhasil Hapus Data Buku';

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
