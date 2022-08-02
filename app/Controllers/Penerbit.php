<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Penerbit as ModelsPenerbit;

class Penerbit extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsPenerbit();
    }

    public function index()
    {
        try {
            $data['penerbits'] = $this->model->findAll();

            $data['page'] = 'penerbit';

            if ($this->request->isAJAX()) {
                return view('penerbit/load', $data);
            }

            return view('penerbit/index', $data);
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
            if ($this->request->isAJAX()) {
                return view('_partials/modals/penerbit');
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
            $nama = $this->request->getPost('nama_penerbit');
            $perusahaan = $this->request->getPost('perusahaan');

            $data = [
                'nama_penerbit' => $nama,
                'perusahaan' => $perusahaan,
            ];

            $this->model->insert($data);

            $msg = 'Berhasil Tambah Data Penerbit';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('penerbit')->with('success', $msg);
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
            $data['penerbit'] = $this->model->find($id);

            if ($this->request->isAJAX()) {
                return view('_partials/modals/penerbit', $data);
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
            $nama = $this->request->getPost('nama_penerbit');
            $perusahaan = $this->request->getPost('perusahaan');

            $data = [
                'nama_penerbit' => $nama,
                'perusahaan' => $perusahaan,
            ];

            $this->model->update($id, $data);

            $msg = 'Berhasil Ubah Data Penerbit';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('penerbit')->with('success', $msg);
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

            $msg = 'Berhasil Hapus Data Penerbit';

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
