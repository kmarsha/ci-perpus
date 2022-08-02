<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'marshaa',
                'email' => 'marshak116@gmail.com',
                'password_hash' => '$2y$10$AMVwp/7Pd4qc6qfFk7Fg.eovBO2e.TbQmAQBJMOY.Gre2TfHPt77W', //password
                'active' => 1,
            ],
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password_hash' => '$2y$10$AMVwp/7Pd4qc6qfFk7Fg.eovBO2e.TbQmAQBJMOY.Gre2TfHPt77W',
                'active' => 1,
            ],
            [
                'username' => 'marshak',
                'email' => 'student@gmail.com',
                'password_hash' => '$2y$10$AMVwp/7Pd4qc6qfFk7Fg.eovBO2e.TbQmAQBJMOY.Gre2TfHPt77W',
                'active' => 1,
            ],
            [
                'username' => 'macca',
                'email' => 'student2@gmail.com',
                'password_hash' => '$2y$10$AMVwp/7Pd4qc6qfFk7Fg.eovBO2e.TbQmAQBJMOY.Gre2TfHPt77W',
                'active' => 1,
            ],
        ];

        $this->db->table('users')->insertBatch($data);

        $authorize = service('authorization');

        $authorize->addUserToGroup('1', '1');
        $authorize->addUserToGroup('2', '1'); // 2 = user_id, 1 = group_id
        $authorize->addUserToGroup('3', '2');
        $authorize->addUserToGroup('4', '2');
    }
}
