<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
      $this->call('UserSeeder');
      $this->call('AuthGroupsSeeder');
      $this->call('AuthGroupsUsersSeeder');
    }
}
