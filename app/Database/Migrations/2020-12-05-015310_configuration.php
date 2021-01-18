<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Configuration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '16'
			],
			'recaptcha_secret' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'recaptcha_site' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'vps_token' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'vps_rest_address' => [
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
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('configuration');
	}

	public function down()
	{
		$this->forge->dropTable('configuration');
	}
}
