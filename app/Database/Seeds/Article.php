<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Article extends Seeder
{
    public function run()
    {
        //
        $data = [
            "title" => "The standard Lorem Ipsum passage",
            "text" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum"
        ];

        for($i = 1; $i < 100; $i++){
            
    
            $this->db->table('article')->insert($data);
        }
    }
}
