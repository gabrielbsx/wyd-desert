<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tickets extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_user' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'content' => [
				'type' => 'TEXT'
			],
			'status' => [
				'type' => 'INT',
				'unsigned' =>  true,
				'constraint' => 1
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
		//$this->forge->addForeignKey('id_user', 'users', 'id');
		$this->forge->createTable('tickets');
	}

	public function down()
	{
		$this->forge->dropTable('tickets');
	}
}
