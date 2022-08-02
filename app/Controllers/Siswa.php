<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku;
use App\Models\Peminjam;
use App\Models\Penerbit;
use App\Models\Student;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->peminjamModel = new Peminjam();
        $this->bukuModel = new Buku();
        $this->studentModel = new Student();
        $this->penerbitModel = new Penerbit();
    }

    public function books()
    {
        $books = $this->bukuModel->select('*')
            ->join('penerbits as p', 'books.penerbit_id = p.penerbit_id')
            ->get();

        $data['books'] = $books->getResult();

        $user_id = user_id();
        $student = $this->studentModel->getWhere(['user_id' => $user_id])->getResult();
        $student_id = $student[0]->student_id;

        $pinjams = $this->peminjamModel->select('*')
            ->join('books as buku', 'peminjams.buku_id = buku.buku_id')
            ->where(['user_id' => $user_id])
            ->orWhere(['student_id' => $student_id])
            ->get();
            
        $data['buku_pinjams'] = $pinjams->getResult();
        
        $data['page'] = 'buku';

        if ($this->request->isAJAX()) {
            return view('siswa/load', $data);
        }

        return view('siswa/book', $data);
    }
}
