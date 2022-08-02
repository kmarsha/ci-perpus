<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        $rayons = [
            [
                'nama_rayon' => 'Ciawi',
                'jumlah_siswa' => 40,
                'pembimbing' => 'PR Ciawi',
            ],
            [
                'nama_rayon' => 'Cibedug',
                'jumlah_siswa' => 43,
                'pembimbing' => 'PR Cibedug',
            ],
            [
                'nama_rayon' => 'Cicurug',
                'jumlah_siswa' => 65,
                'pembimbing' => 'PR Cicurug',
            ],
            [
                'nama_rayon' => 'Cisarua',
                'jumlah_siswa' => 42,
                'pembimbing' => 'PR Cisarua',
            ],
            [
                'nama_rayon' => 'Sukasari',
                'jumlah_siswa' => 39,
                'pembimbing' => 'PR Sukasari',
            ],
            [
                'nama_rayon' => 'Tajur',
                'jumlah_siswa' => 58,
                'pembimbing' => 'PR Tajur',
            ],
            [
                'nama_rayon' => 'Wikrama',
                'jumlah_siswa' => 112,
                'pembimbing' => 'PR Wikrama',
            ],
        ];

        $this->db->table('rayons')->insertBatch($rayons);

        $rombels = [
            [
                'nama_rombel' => 'Rekayasa Perangkat Lunak',
                'tingkat' => 12
            ],
            [
                'nama_rombel' => 'Teknik Komputer dan Jaringan',
                'tingkat' => 12
            ],
            [
                'nama_rombel' => 'Multimedia',
                'tingkat' => 12
            ],
            [
                'nama_rombel' => 'Olah Tata Kelola Perkantoran',
                'tingkat' => 12
            ],
            [
                'nama_rombel' => 'Bisnis dan Pemasaran',
                'tingkat' => 12
            ],
            [
                'nama_rombel' => 'Hotel',
                'tingkat' => 12
            ],
            [
                'nama_rombel' => 'Tata Boga',
                'tingkat' => 12
            ],
        ];

        $this->db->table('rombels')->insertBatch($rombels);

        $students = [
            [
                'user_id' => 3,
                'nis' => 12007880,
                'nama_siswa' => 'Marsha Kordhawerti',
                'rayon_id' => 2,
                'rombel_id' => 1,
            ],
            [
                'user_id' => 4,
                'nis' => 12007880,
                'nama_siswa' => 'Macca',
                'rayon_id' => 4,
                'rombel_id' => 7,
            ],
        ];

        $this->db->table('students')->insertBatch($students);
    }
}
