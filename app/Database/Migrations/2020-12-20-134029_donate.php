<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Donate extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'value' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'donate' => [
				'type' => 'INT',
				'unsigned' => true
			],
			'bonus' => [
				'type' => 'INT',
				'unsigned' => true
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
		$this->forge->createTable('donate');
	}

	public function down()
	{
		$this->forge->dropTable('donate');
	}
}
