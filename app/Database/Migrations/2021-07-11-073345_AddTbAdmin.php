<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;




class AddTbAdmin extends Migration
{

	private $_fAdmin = array(
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true
		],
		'id_role' => [
			'type' => 'INT',
			'null' => false
		],
		'username' => [
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => false
		],
		'password' => [
			'type' => 'TEXT',
			'null' => false
		]
	
	);

	public function up()
	{
		$this->db->disableForeignKeyChecks();

        // Migration rules would go here..
		$this->forge->addField($this->_fAdmin);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('id_role','role','id');
		$this->forge->createTable('tb_admin');

        $this->db->enableForeignKeyChecks();
		
	}

	public function down()
	{
		$this->forge->dropTable('tb_admin');
	}
}
