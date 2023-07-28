<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Service A',
                'price' => 100.00,
            ],
            [
                'name' => 'Service B',
                'price' => 150.50,
            ],
            [
                'name' => 'Service C',
                'price' => 75.25,
            ],
            [
                'name' => 'Service D',
                'price' => 200.00,
            ],
            [
                'name' => 'Service E',
                'price' => 80.75,
            ],
        ];

        // Insert the data into the "services" table
        $this->db->table('services')->insertBatch($services);
    }
}
