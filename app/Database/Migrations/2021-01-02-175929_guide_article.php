<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GuideArticle extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'INT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'id_guide' => [
				'type' => 'INT',
				'constraint' => '1',
				'unsigned' => true,
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'article' => [
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
		$this->forge->createTable('guide_article');
	}

	public function down()
	{
		$this->forge->dropTable('guide_article');
	}
}
