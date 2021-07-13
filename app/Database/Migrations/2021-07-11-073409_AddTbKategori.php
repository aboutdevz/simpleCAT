<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTbKategori extends Migration
{

	private $_fKategori = array(
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true
		],
		'kategori' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
		]
	);

	public function up()
	{
		$this->db->disableForeignKeyChecks();

        // Migration rules would go here..
		$this->forge->addField($this->_fKategori);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('tb_kategori');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('tb_kategori');
	}
}
