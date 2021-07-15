<?php

namespace App\Models;

use CodeIgniter\Model;

class Soal extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_soal';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 1;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id_kategori','id_jenis','soal','opsi_a','opsi_b','opsi_c','opsi_d','jawaban','status'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	public function getSoal()
	{
		$query = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis`");
		
		$rowCount = $query->getNumRows();

		if($rowCount > 0)
		{
			
			$field = $query->getResultArray();
			$data = [
				'field' => $field,
				'status' => true
			];
			return $data;
		}
		else
		{
			$data = [
				'field' => null,
				'status' => false
			];
			return $data;
			
		}
		
		
	}


}