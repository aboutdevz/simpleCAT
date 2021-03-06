<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Config;
use CodeIgniter\Database\Database;

class AddTbSoal extends Migration
{
	

	private $_fSoal = array(
		'id' => [
			'type' => 'INT',
			'null' => false,
			'auto_increment' => true
		],
		'id_kategori' => [
			'type' => 'INT',
			'null' => false
		],
		'id_jenis' => [
			'type' => 'INT',
			'null' => false
		],
		'paragraf' => [
			'type' => 'TEXT'
			
		],
		'soal' => [
			'type' => 'LONGTEXT'
		],
		'opsi_a' => [
			'type' => 'LONGTEXT'
		],
		'opsi_b' => [
			'type' => 'LONGTEXT'
		],
		'opsi_c' => [
			'type' => 'LONGTEXT'
		],
		'opsi_d' => [
			'type' => 'LONGTEXT'
		],
		'jawaban' => [
			'type' => 'VARCHAR',
			'constraint' => 255
		],
		'gambar' => [
			'type' => 'VARCHAR',
			'constraint' => 255
		],
		'status' => [
			'type' => 'ENUM',
			'constraint' => ['aktif', 'mati']
		]
		

	);

	public function up()
	{

		

        // Migration rules would go here..
		
        // Migration rules would go here..
		$this->db->disableForeignKeyChecks();
        
		$this->forge->addField($this->_fSoal);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('id_kategori','tb_kategori','id');
		$this->forge->addForeignKey('id_jenis','tb_jenis_soal','id');
		$this->forge->createTable('tb_soal');
		
        $this->db->enableForeignKeyChecks();
		

	}

	public function down()
	{
		$this->forge->dropTable('tb_soal');
	}
}
