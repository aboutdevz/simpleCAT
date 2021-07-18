<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\FuncCall;

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
	protected $allowedFields        = ['id','id_kategori', 'id_jenis', 'soal', 'opsi_a', 'opsi_b', 'opsi_c', 'opsi_d', 'jawaban', 'status'];

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
		$query1_1 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Verbal' AND `tb_jenis_soal`.`jenis_soal` = 'Sinonim'");
		$query1_2 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Verbal' AND `tb_jenis_soal`.`jenis_soal` = 'Antonim'");
		$query1_3 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Verbal' AND `tb_jenis_soal`.`jenis_soal` = 'Analogi'");
		$query2_1 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Kuantitatif' AND `tb_jenis_soal`.`jenis_soal` = 'Logika Aritmatika'");
		$query2_2 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Kuantitatif' AND `tb_jenis_soal`.`jenis_soal` = 'Matematika'");
		$query3_1 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Logika' AND `tb_jenis_soal`.`jenis_soal` = 'Logika Umum'");
		$query3_2 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Logika' AND `tb_jenis_soal`.`jenis_soal` = 'Logika Penalaran'");
		$query3_3 = $this->db->query("SELECT `tb_kategori`.`kategori`,`tb_jenis_soal`.`jenis_soal`,`tb_soal`.`id`,`soal`,`opsi_a`,`opsi_b`,`opsi_c`,`opsi_d`,`jawaban`,`status` FROM `tb_soal` INNER JOIN `tb_kategori` ON `tb_kategori`.`id` = `id_kategori` INNER JOIN `tb_jenis_soal` ON `tb_jenis_soal`.`id` = `id_jenis` WHERE `tb_kategori`.`kategori` = 'Logika' AND `tb_jenis_soal`.`jenis_soal` = 'Gambar/ Spasial'");


		$rowCount = $query->getNumRows();

		if ($rowCount > 0) {

			$data = [
				'field' => [
					'allSoal' => $query->getResultArray(),
					'sinonim' => $query1_1->getResultArray(),
					'antonim' => $query1_2->getResultArray(),
					'analogi' => $query1_3->getResultArray(),
					'logikaMtk' => $query2_1->getResultArray(),
					'mtk' => $query2_2->getResultArray(),
					'logikaUmum' => $query3_1->getResultArray(),
					'logikaNalar' => $query3_2->getResultArray(),
					'gambar' => $query3_3->getResultArray()
					
				],
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

	public function getJawabanSoal()
	{
		$queryJ = $this->db->query("SELECT `id`,`jawaban` FROM `tb_soal` ");

		return json_encode($queryJ->getResultArray());
	}

	public function getSingleSoal($id)
	{
		$query = $this->db->query("SELECT * FROM `tb_soal` WHERE `id` = $id");
		$rowCount = $query->getNumRows();

		if ($rowCount > 0) {

			$field = json_encode($query->getRow());
			$data = [
				'field' => $field,
				'arrayField' => $query->getRowArray(),
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

}
