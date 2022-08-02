<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku;
use App\Models\Peminjam as ModelsPeminjam;
use App\Models\Student;
use App\Models\UserModel;

class Peminjam extends BaseController
{
    public function __construct()
    {
        $this->model = new ModelsPeminjam();
        $this->studentModel = new Student();
        $this->bukuModel = new Buku();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        try {
            $peminjams = $this->model->select('*')
                ->join('students as siswa', 'peminjams.student_id = siswa.student_id')
                ->join('books as buku', 'peminjams.buku_id = buku.buku_id')
                ->get();

            $data['peminjams'] = $peminjams->getResult();
            
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
                echo $th->getMessage();
                // return redirect()->back()->with('error', 'Error ' . $th->getMessage());
            }
        }
    }

    public function new()
    {
        try {
            $data = [
                'students' => $this->studentModel->findAll(),
                'books' => $this->bukuModel->getWhere(['status' => 'tersedia'])->getResult(),
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
            $buku_id = $this->request->getPost('buku');
            $tgl_pinjam = $this->request->getPost('tgl_pinjam');
            $tgl_kembali = $this->request->getPost('tgl_kembali');
            $ket = ($tgl_kembali == null || $tgl_kembali == '0000-00-00') ? 'belum' : 'kembali';

            if (in_groups('admin')) {
                $student_id = $this->request->getPost('peminjam');
                $student = $this->studentModel->find($student_id);

                if (! empty($student)) {
                    $user_id = $student->user_id;
                }
                
            } elseif (in_groups('student')) {
                $user_id = user()->id;
                $peminjams = $this->studentModel->getWhere(['user_id' => $user_id]);
                $peminjam = $peminjams->getResult();
                $val_peminjam = $peminjam[0];
                $student_id = $val_peminjam->student_id;
            }

            $data = [
                'user_id' => $user_id,
                'student_id' => $student_id,
                'buku_id' => $buku_id,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'ket' => $ket,
            ];

            $this->model->insert($data);

            $this->bukuModel->update($buku_id, [
                'status' => 'dipinjam'
            ]);

            if (in_groups('admin')) {
                $msg = 'Berhasil Tambah Data Peminjam';
            } elseif (in_groups('student')) {
                $msg = 'Buku Telah Dipinjam';
            }

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
                'books' => $this->bukuModel->getWhere(['status' => 'tersedia'])->getResult(),
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
            $buku_id = $this->request->getPost('buku_id');

            $tgl_pinjam = $this->request->getPost('tgl_pinjam');
            $tgl_kembali = $this->request->getPost('tgl_kembali');
            $ket = ($tgl_kembali == null || $tgl_kembali == '0000-00-00') ? 'belum' : 'kembali';
            $status = ($ket == 'kembali') ? 'tersedia' : 'dipinjam';

            $student_id = $this->request->getPost('student_id');
            $student = $this->studentModel->find($student_id);

            if (! empty($student)) {
                $user_id = $student->user_id;
            }

            $data = [
                'user_id' => $user_id,
                'student_id' => $student_id,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'ket' => $ket,
            ];

            $this->model->update($id, $data);

            $this->bukuModel->update($buku_id, [
                'status' => $status
            ]);

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
