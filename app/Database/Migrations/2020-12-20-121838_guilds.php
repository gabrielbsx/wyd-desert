<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Guilds extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_guild' => [
				'type' => 'INT',
				'constraint' => '5'
			],
			'guildname' => [
				'type' => 'VARCHAR',
				'constraint' => '30'
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
		$this->forge->createTable('guilds');
	}

	public function down()
	{
		$this->forge->dropTable('guilds');
	}
}
