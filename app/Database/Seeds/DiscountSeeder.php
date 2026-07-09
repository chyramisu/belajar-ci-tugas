<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        // tanggal hari ini
        $tanggal = date('Y-m-d');

        for ($i = 0; $i < 10; $i++) {

            $data[] = [
                'tanggal'   => date('Y-m-d', strtotime("+$i days", strtotime($tanggal))),
                'nominal'   => rand(10000, 100000),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
                'deleted_at'=> null,
            ];
        }

        $this->db->table('discount')->insertBatch($data);
    }
}