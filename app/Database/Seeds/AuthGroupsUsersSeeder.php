<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsUsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
          [
            'group_id' => 1,
            'user_id' => 1
          ],
        ];
  
        $this->db->table('auth_groups_users')->insertBatch($data);
    }
}
