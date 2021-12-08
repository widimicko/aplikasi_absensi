<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
      $data = [
        [
          'id' => 1,
          'name' => 'admin',
          'description' => 'Admin Account',
        ],
      ];

      $this->db->table('auth_groups')->insertBatch($data);
    }
}
