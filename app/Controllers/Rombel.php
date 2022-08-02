<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rombel as ModelsRombel;

class Rombel extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsRombel();
    }

    public function index()
    {
        try {
            $data['rombels'] = $this->model->findAll();

            if ($this->request->isAJAX()) {
                return view('rombel/load', $data);
            }

            $data['page'] = 'rombel';

            return view('rombel/index', $data);
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
            if ($this->request->isAJAX()){
              return view('_partials/modals/rombel');
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()){
              $data = [
                'error' => true,
                'msg' => 'Error ' . $th->getMessage(),
              ];

              return $this->response->setJSON($data);
            }
        }
    }

    public function create()
    {
        try {
            $nama_rombel = $this->request->getPost('nama_rombel');
            $tingkat = $this->request->getPost('tingkat');

            $data = [
                'nama_rombel' => $nama_rombel,
                'tingkat' => $tingkat,
            ];

            $this->model->insert($data);

            $msg = 'Berhasil Tambah Data Rombel';

            if ($this->request->isAJAX()){
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
            if ($this->request->isAJAX()){
              $data = [
                'error' => true,
                'msg' => 'Error ' . $th->getMessage(),
              ];

              return $this->response->setJSON($data);
            }
        }
    }

    public function edit($id)
    {
        try {
            $data['rombel'] = $this->model->find($id);

            if ($this->request->isAJAX()){
              return view('_partials/modals/rombel', $data);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()){
              $data = [
                'error' => true,
                'msg' => 'Error ' . $th->getMessage(),
              ];

              return $this->response->setJSON($data);
            }
        }
    }

    public function update($id)
    {
        try {
            $nama_rombel = $this->request->getPost('nama_rombel');
            $tingkat = $this->request->getPost('tingkat');

            $data = [
                'nama_rombel' => $nama_rombel,
                'tingkat' => $tingkat,
            ];

            $this->model->update($id, $data);

            $msg = 'Berhasil Ubah Data Rombel';

            if ($this->request->isAJAX()){
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
            if ($this->request->isAJAX()){
              $data = [
                'error' => true,
                'msg' => 'Error ' . $th->getMessage(),
              ];

              return $this->response->setJSON($data);
            }
        }
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);

            if ($this->request->isAJAX()){
              $data = [
                'success' => true,
                'msg' => 'Berhasil Hapus Data Rombel',
              ];

              return $this->response->setJSON($data);
            }
        } catch (\Throwable $th) {
            //throw $th;
            if ($this->request->isAJAX()){
              $data = [
                'error' => true,
                'msg' => 'Error ' . $th->getMessage(),
              ];

              return $this->response->setJSON($data);
            }
        }
    }
}
