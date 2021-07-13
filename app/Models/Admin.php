<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_admin';
	protected $primaryKey           = 'id_admin';
	protected $useAutoIncrement     = true;
	protected $insertID             = 1;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','id_role','username','password'];

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


	public function getUser($username)
	{
		$query = $this->db->query("SELECT `username`,`password`,`role`.`role_name` FROM tb_admin INNER JOIN `role` ON `role`.`id` = `tb_admin`.`id_role` WHERE `username` = '$username' LIMIT 1");
		
		$rowCount = $query->getNumRows();

		if($rowCount > 0)
		{
			echo 'admin berhasil';
			
			$field = $query->getRow();
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
