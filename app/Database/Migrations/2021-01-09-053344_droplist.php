<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Droplist extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'mobname' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'itemname' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'deleted_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('droplist');
	}

	public function down()
	{
		$this->forge->dropTable('droplist');
	}
}
