<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderServiceSeeder extends Seeder
{
    public function run()
    {
        $orderServices = [
            [
                'order_id' => 1, // Replace with the order_id of the first order
                'service_id' => 1, // Replace with the service_id of the first service
            ],
            [
                'order_id' => 1, // Replace with the order_id of the first order
                'service_id' => 2, // Replace with the service_id of the second service
            ],
            [
                'order_id' => 2, // Replace with the order_id of the second order
                'service_id' => 3, // Replace with the service_id of the third service
            ],
            [
                'order_id' => 3, // Replace with the order_id of the third order
                'service_id' => 1, // Replace with the service_id of the first service
            ],
            [
                'order_id' => 3, // Replace with the order_id of the third order
                'service_id' => 4, // Replace with the service_id of the fourth service
            ],
        ];

        // Insert data into the "order_services" table
        $this->db->table('order_services')->insertBatch($orderServices);
    }
}
