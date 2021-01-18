<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				//'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '12'
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '60'
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'status' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => '1'
			],
			'access' => [
				'type' => 'INT',
				'unsigned' => true,
				'constraint' => '1'
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
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');	
	}
}
