<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTbMahasiswa extends Migration
{

	private $_fMahasiswa = array(
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true
		],
		'id_role' => [
			'type' => 'INT',
			'null' => false
		],
		'nim' => [
			'type' => 'INT',
			'null' => false
		],
		'nama_mhs' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false
		],
		'password' => [
			'type' => 'text',
			'null' => false
		],
		'ttl' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false
		],
		'jenis_kelamin' => [
			'type' => 'ENUM',
			'constraint' => ['L', 'P']
		],
		'prodi' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false
		],
		'email' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false
		],
		'no_hp' => [
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => false
		],
		'foto' => [
			'type' => 'TEXT',
			'null' => false
		]
		

	);

	public function up()
	{
		$this->db->disableForeignKeyChecks();

        // Migration rules would go here..
		$this->forge->addField($this->_fMahasiswa);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('id_role','role','id');
		$this->forge->createTable('tb_mahasiswa');

        $this->db->enableForeignKeyChecks();
	}

	public function down()
	{
		$this->forge->dropTable('tb_mahasiswa');
	}
}
