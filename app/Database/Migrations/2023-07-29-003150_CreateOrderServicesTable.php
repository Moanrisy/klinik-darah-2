<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderServicesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'service_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('order_id', 'orders', 'id');
        $this->forge->addForeignKey('service_id', 'services', 'id');

        $this->forge->createTable('order_services');
    }

    public function down()
    {
        $this->forge->dropTable('order_services');
    }
}
