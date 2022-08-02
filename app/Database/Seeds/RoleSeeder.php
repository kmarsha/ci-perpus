<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {  
        $data = [
            [
                'name' => 'admin',
                'description' => 'Role Admin',
            ],
            [
                'name' => 'student',
                'description' => 'Role Siswa',
            ],
        ];

        $this->db->table('auth_groups')->insertBatch($data);
    }
}
