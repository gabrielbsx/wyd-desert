<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rankcity extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'city' => [
				'type' => 'VARCHAR',
				'constraint' => '20'
			],
			'guild' => [
				'type' => 'VARCHAR',
				'constraint' => '30'
			],
			'guildmark' => [
				'type' => 'VARCHAR',
				'constraint' => '50'
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
		$this->forge->createTable('rankcity');
	}

	public function down()
	{
		$this->forge->dropTable('rankcity');
	}
}
