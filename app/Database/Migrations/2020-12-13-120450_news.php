<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
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
			'category' => [
				'type' => 'INT',
				'constraint' => 1,
				'unsigned' => true
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'content' => [
				'type' => 'TEXT'
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
		$this->forge->createTable('news');
	}

	public function down()
	{
		$this->forge->dropTable('news');
	}
}
