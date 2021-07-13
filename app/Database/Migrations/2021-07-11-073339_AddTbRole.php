<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;



class AddTbRole extends Migration
{

	
	private $_fRole = array(
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true
		],
		'role_name' => [
			'type' => 'ENUM',
			'constraint' => ['mahasiswa', 'admin']
		]

	);
	public function up()
	{

		$this->db->disableForeignKeyChecks();

        // Migration rules would go here..
		$this->forge->addField($this->_fRole);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('role');

        $this->db->enableForeignKeyChecks();
		
	}

	public function down()
	{
		$this->forge->dropTable('role');
	}
}
