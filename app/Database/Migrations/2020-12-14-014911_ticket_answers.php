<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TicketAnswers extends Migration
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
			'id_ticket' => [
				'type' => 'INT',
				'unsigned' => true
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
		//$this->forge->addForeignKey('id_ticket', 'tickets', 'id');
		$this->forge->createTable('ticket_answers');
	}

	public function down()
	{
		$this->forge->dropTable('ticket_answers');
	}
}
