<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTbJenisSoal extends Migration
{

	private $_fJenis = array(

		'id' => [
			'type' => "INT",
			'null' => false,
			'auto_increment' => true
		],
		'jenis_soal' => [
			'type' => "VARCHAR",
			'constraint' => 255,
			'null' => false
		]
	);


	public function up()
	{
		// Migration rules would go here..
		$this->db->disableForeignKeyChecks();
        
		$this->forge->addField($this->_fJenis);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('tb_jenis_soal');
		$this->db->enableForeignKeyChecks();

	}

	public function down()
	{
		$this->forge->dropTable('tb_jenis_soal');
	}
}
