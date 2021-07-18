<?php

namespace App\Models;

use CodeIgniter\Model;

class Hasil extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'tb_hasil';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 1;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['id','id_mahasiswa','jawaban','verbal','kuantitatif','logika','skor','scp'];

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

	public function getHasil()
	{
		$query = $this->db->query("SELECT `tb_hasil`.*,`tb_mahasiswa`.`nama_mhs`,`tb_mahasiswa`.`nim` FROM tb_hasil INNER JOIN `tb_mahasiswa` ON `tb_mahasiswa`.`id` = `tb_hasil`.`id_mahasiswa`");
		$rowCount = $query->getNumRows();

		if ($rowCount > 0) {

			$field = $query->getResultArray();
			$data = [
				'field' => $field,
				'status' => true
			];
			return $data;
		} else {

			$data = [
				'field' => null,
				'status' => false
			];
			return $data;
		}
	}


	public function adaHasil($idMahasiswa)
	{
		$query = $this->db->query("SELECT * FROM `tb_hasil` WHERE `id_mahasiswa` = $idMahasiswa LIMIT 1");
		$rowCount = $query->getNumRows();

		if ($rowCount > 0) {

			$field = $query->getRowArray();
			$data = [
				'id' => $field['id'],
				'status' => true
			];
			return $data;
		} else {

			$data = [
				'field' => null,
				'status' => false
			];
			return $data;
		}
	}

	public function deleteCascade($id)
	{
		$query = $this->db->query("DELETE FROM `tb_hasil` WHERE `id_mahasiswa` = $id");

		if ($this->db->affectedRows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}
