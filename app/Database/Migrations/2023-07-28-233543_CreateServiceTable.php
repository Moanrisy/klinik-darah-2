<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateServiceTable extends Migration
{
    public function up()
    {
        // $this->forge->addField('id');

        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'price' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ]
        ]);

        // Set the 'id' column as the primary key
        $this->forge->addKey('id', true);

        $this->forge->createTable('services');
    }

    public function down()
    {
        $this->forge->dropTable('services');
    }
}
