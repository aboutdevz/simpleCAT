<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_mahasiswa';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 1;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','nama_mhs','id_role','nim','nama_mhs','password','ttl','jenis_kelamin','prodi','email','no_hp','foto'];

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


	public function getMahasiswa($id)
	{
		$query = $this->db->query("SELECT * FROM tb_mahasiswa  WHERE `id` = $id LIMIT 1");
		$rowCount = $query->getNumRows();

			if ($rowCount > 0)
			{
				
				$field = json_encode($query->getRow()) ;
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


	public function getUser($username)
	{

			$query = $this->db->query("SELECT `tb_mahasiswa`.`id`,`tb_mahasiswa`.`nama_mhs`,`tb_mahasiswa`.`password`,`tb_mahasiswa`.`nim`,`role`.`role_name`,`tb_mahasiswa`.`ttl`,`tb_mahasiswa`.`jenis_kelamin`,`tb_mahasiswa`.`prodi`,`tb_mahasiswa`.`email`,`tb_mahasiswa`.`no_hp`,`tb_mahasiswa`.`foto` FROM tb_mahasiswa INNER JOIN `role` ON `role`.`id` = `tb_mahasiswa`.`id_role` WHERE `nim` = $username LIMIT 1");
		
			$rowCount = $query->getNumRows();

			if ($rowCount > 0)
			{
				echo 'mahasiswa berhasil';
				$field = $query->getRow();
				$data = [
					'field' => $field,
					'status' => true
				];
				return $data;
			}
			else
			{
				echo 'mahasiswa gagal';
				
				return false;
			}

	}
}
