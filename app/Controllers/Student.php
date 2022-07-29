<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student as ModelsStudent;

class Student extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsStudent();
        $this->rayonModel = new Rayon();
        $this->rombelModel = new Rombel();
    }

    public function index()
    {
        try {
            $data = [
                'rayons' => $this->rayonModel->findAll(),
                'rombels' => $this->rombelModel->findAll(),
            ];
            
            $data['students'] = $this->model->findAll();

            $data['page'] = 'student';

            if ($this->request->isAJAX()) {
                return view('student/load', $data);
            }

            return view('student/index', $data);
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
                'rayons' => $this->rayonModel->findAll(),
                'rombels' => $this->rombelModel->findAll(),
            ];
            
            if ($this->request->isAJAX()) {
                return view('_partials/modals/student', $data);
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
            $nis = $this->request->getPost('nis_siswa');
            $nama = $this->request->getPost('nama_siswa');
            $rayon = $this->request->getPost('rayon');
            $rombel = $this->request->getPost('rombel');

            $data = [
                'nis' => $nis,
                'nama' => $nama,
                'rayon_id' => $rayon,
                'rombel_id' => $rombel,
            ];

            $this->model->insert($data);

            $msg = 'Berhasil Tambah Data Siswa';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('student')->with('success', $msg);
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
                'rayons' => $this->rayonModel->findAll(),
                'rombels' => $this->rombelModel->findAll(),
            ];

            $data['student'] = $this->model->find($id);

            if ($this->request->isAJAX()) {
                return view('_partials/modals/student', $data);
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
            $nis = $this->request->getPost('nis_siswa');
            $nama = $this->request->getPost('nama_siswa');
            $rayon = $this->request->getPost('rayon');
            $rombel = $this->request->getPost('rombel');

            $data = [
                'nis' => $nis,
                'nama' => $nama,
                'rayon_id' => $rayon,
                'rombel_id' => $rombel,
            ];

            $this->model->update($id, $data);

            $msg = 'Berhasil Ubah Data Siswa';

            if ($this->request->isAJAX()) {
                $data = [
                    'success' => true,
                    'msg' => $msg,
                ];

                return $this->response->setJSON($data);
            } else {
                return redirect()->route('student')->with('success', $msg);
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

            $msg = 'Berhasil Hapus Data Siswa';

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
