<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $orders = [
            [
                'user_id' => 1, // Replace with the user_id of the user placing this order
                'total_price' => 250.00,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2, // Replace with the user_id of the user placing this order
                'total_price' => 330.75,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 2, // Replace with the user_id of the user placing this order
                'total_price' => 180.50,
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data into the "orders" table
        $this->db->table('orders')->insertBatch($orders);
    }
}
