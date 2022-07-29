<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rayon as ModelsRayon;
use CodeIgniter\HTTP\Response;

class Rayon extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsRayon();
    }

    public function index()
    {
        try {
            $data['rayons'] = $this->model->findAll();

            $data['page'] = 'rayon';

            if ($this->request->isAJAX()) {
                return view('rayon/load', $data);
            }

            return view('rayon/index', $data);
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
                return view('_partials/modals/rayon');
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
            $nama = $this->request->getPost('nama_rayon');
            $jmlh = $this->request->getPost('jumlah_siswa');
            $pembimbing = $this->request->getPost('pembimbing');

            $data = [
                'nama' => $nama,
                'jumlah_siswa' => $jmlh,
                'pembimbing' => $pembimbing,
            ];

            $this->model->insert($data);

            $msg = 'Berhasil Tambah Data Rayon';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('rayon')->with('success', $msg);
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
            $data['rayon'] = $this->model->find($id);

            if ($this->request->isAJAX()) {
                return view('_partials/modals/rayon', $data);
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
            $nama = $this->request->getPost('nama_rayon');
            $jmlh = $this->request->getPost('jumlah_siswa');
            $pembimbing = $this->request->getPost('pembimbing');

            $data = [
                'nama' => $nama,
                'jumlah_siswa' => $jmlh,
                'pembimbing' => $pembimbing,
            ];

            $this->model->update($id, $data);

            $msg = 'Berhasil Ubah Data Rayon';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('rayon')->with('success', $msg);
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

            $msg = 'Berhasil Hapus Data Rayon';

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
