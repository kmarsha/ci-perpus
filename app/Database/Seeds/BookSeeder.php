<?php

namespace App\Database\Seeds;

use App\Models\Buku;
use CodeIgniter\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run()
    {
        $dataPenerbit = [
            [
                'nama_penerbit' => 'Gramedia Pustaka Utama',
                'perusahaan' => 'Gramedia Indonesa',
            ],
            [
                'nama_penerbit' => 'Erlangga',
                'perusahaan' => 'Penerbit Erlangga'
            ],
        ];

        $this->db->table('penerbits')->insertBatch($dataPenerbit);

        $dataBuku = [
            [
                'judul_buku' => 'Bumi',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2014'
            ],
            [
                'judul_buku' => 'Bulan',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2015'
            ],
            [
                'judul_buku' => 'Matahari',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2016'
            ],
            [
                'judul_buku' => 'Bintang',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2017'
            ],
            [
                'judul_buku' => 'Komet',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2018',
            ],
            [
                'judul_buku' => 'Nebula',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2019',
            ],
            [
                'judul_buku' => 'Selena',
                'penulis' => 'Tere Liye',
                'penerbit_id' => 1,
                'tahun_terbit' => '2020',
            ],
        ];

        $this->db->table('books')->insertBatch($dataBuku);
    }
}
