<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTbHasil extends Migration
{

	private $_fHasil = array(
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true
		],
		'id_mahasiswa' => [
			'type' => 'INT'
		],
		'skor' => [
			'type' => 'VARCHAR',
			'constraint' => 255
			
		],
		'scp' => [
			'type' => 'VARCHAR',
			'constraint' => 255
		]

	);

	public function up()
	{
		$this->db->disableForeignKeyChecks();

        // Migration rules would go here..
		$this->forge->addField($this->_fHasil);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('id_mahasiswa','tb_mahasiswa','id');
		$this->forge->createTable('tb_hasil');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('tb_hasil');
	}
}
