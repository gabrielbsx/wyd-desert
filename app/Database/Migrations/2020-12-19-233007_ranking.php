<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ranking extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'nick' => [
				'type' => 'VARCHAR',
				'constraint' => 32
			],
			'level' => [
				'type' => 'INT',
				'constraint' => 4
			],
			'class' => [
				'type' => 'INT',
				'constraint' => 1
			],
			'evolution' => [
				'type' => 'INT',
				'constraint' => 1
			],
			'kingdom' => [
				'type' => 'INT',
				'constraint' => 1
			],
			'guild' => [
				'type' => 'INT',
				'constraint' => 5
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
		$this->forge->createTable('ranking');
	}

	public function down()
	{
		$this->forge->dropTable('ranking');
	}
}
