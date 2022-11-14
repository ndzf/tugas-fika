<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                "username"			=> "admin",
                "name"				=> "Admin 1",
                "password"			=> password_hash("admin", PASSWORD_BCRYPT),
            ]

        ];

        $this->db->table("users")->insertBatch($users);
    }
}
