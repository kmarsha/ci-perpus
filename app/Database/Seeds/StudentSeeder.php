<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $rayons = [
            [
                'nama' => 'Ciawi',
                'jumlah_siswa' => 40,
                'pembimbing' => 'PR Ciawi',
            ],
            [
                'nama' => 'Cibedug',
                'jumlah_siswa' => 43,
                'pembimbing' => 'PR Cibedug',
            ],
            [
                'nama' => 'Cicurug',
                'jumlah_siswa' => 65,
                'pembimbing' => 'PR Cicurug',
            ],
            [
                'nama' => 'Cisarua',
                'jumlah_siswa' => 42,
                'pembimbing' => 'PR Cisarua',
            ],
            [
                'nama' => 'Sukasari',
                'jumlah_siswa' => 39,
                'pembimbing' => 'PR Sukasari',
            ],
            [
                'nama' => 'Tajur',
                'jumlah_siswa' => 58,
                'pembimbing' => 'PR Tajur',
            ],
            [
                'nama' => 'Wikrama',
                'jumlah_siswa' => 112,
                'pembimbing' => 'PR Wikrama',
            ],
        ];

        $this->db->table('rayons')->insertBatch($rayons);

        $rombels = [
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'tingkat' => 12
            ],
            [
                'nama' => 'Teknik Komputer dan Jaringan',
                'tingkat' => 12
            ],
            [
                'nama' => 'Multimedia',
                'tingkat' => 12
            ],
            [
                'nama' => 'Olah Tata Kelola Perkantoran',
                'tingkat' => 12
            ],
            [
                'nama' => 'Bisnis dan Pemasaran',
                'tingkat' => 12
            ],
            [
                'nama' => 'Hotel',
                'tingkat' => 12
            ],
            [
                'nama' => 'Tata Boga',
                'tingkat' => 12
            ],
        ];

        $this->db->table('rombels')->insertBatch($rombels);

        $students = [
            [
                'nis' => 12007880,
                'nama' => 'Marsha Kordhawerti',
                'rayon_id' => 2,
                'rombel_id' => 1,
            ],
            [
                'nis' => 12007880,
                'nama' => 'Macca',
                'rayon_id' => 4,
                'rombel_id' => 7,
            ],
        ];

        $this->db->table('students')->insertBatch($students);
    }
}
