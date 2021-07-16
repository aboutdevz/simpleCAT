<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		helper(['form', 'url']);
		$session = service('session');
		$Kategori = model('Kategori')->findAll();
		$jenis = model('jenisSoal')->findAll();
		$dataMahasiswa = model('Mahasiswa')->findAll();
		$dataSoal = model('Soal')->getSoal();
		$dataHasil = model('Hasil')->getHasil();
		if ($session->credential['role'] == "admin") {
			$data = [
				'title' => 'dashboard',
				'kategoriform' => $Kategori,
				'jenisform' => $jenis,
				'dataMahasiswa' => $dataMahasiswa,
				'dataSoal' => $dataSoal['field']['allSoal'],
				'dataHasil' => $dataHasil['field']

			];

			return view('Dashboard/index', $data);
		} else {
			return redirect()->to(base_url('Login'));
		}
	}

	public function getSoal()
	{
		$id = $this->request->getPost('id');

		$modelSoal = model('Soal')->getSingleSoal($id);
		try {
			//code...
			if ($modelSoal['status']) {
				echo $modelSoal['field'];
			} else {
				$this->response->setStatusCode(404)->setBody("not found data mahasiswa");
			}
		} catch (\Exception $th) {
			$this->response->setStatusCode(404)->setBody("not found data mahasiswa");
			throw $th;
		}
	}
	
	public function getAllMahasiswa()
	{
		$data = [
			'data' => model('Mahasiswa')->findAll()
		];
		return json_encode($data) ;
	}

	public function updateSoal()
	{
		$dataPost = $this->request->getPost();

		$modelSoal = model('Soal');

		try {
			$modelSoal->save($dataPost);
		} catch (\Exception $th) {
			throw $th;
		}
	}

	public function hapusSoal()
	{
		$id = $this->request->getPost('id');
		$modelSoal = model('Soal');

		try {
			$modelSoal->delete($id);
		} catch (\Exception $th) {
			throw $th;
		}
	}

	public function tambahSoal()
	{
		$dataPost = $this->request->getPost();
		$modelSoal = model('Soal');

		try {
			$modelSoal->save($dataPost);
		} catch (\Exception $th) {
			throw $th;
		}
	}

	public function tambahMahasiswa()
	{
		if ($this->request->isAJAX()) {
			$data = $this->request->getPost();
			$data['id_role'] = 2;
			$data['password'] =  password_hash($data['password'], PASSWORD_DEFAULT);
			$files = $this->request->getFile('profile');
			try {
				//code...
				$modelMhs = model('Mahasiswa');
				if ($files > 0) {
					$file = $this->request->getFile('profile');
					$data['foto'] = imgAsset('profil/' . $file->getName());
					$file->move(ROOTPATH . 'public/image/profil');
				}
				if ($data['kelamin'] == "L") {
					$data['kelamin'] = "Laki-Laki";
				} else {
					$data['kelamin'] = "Perempuan";
				}
				try {
					//code...
					$modelMhs->save($data);
				} catch (\Exception $th) {
					die($th->getMessage());
				}
			} catch (\CodeIgniter\Database\Exceptions\DataException $th) {
				die($th->getMessage());
			}
		}
	}


	public function getMahasiswa()
	{
		if ($this->request->isAJAX()) {
			$id = $this->request->getPost('id');
			

			try {
				//code...
				$modelMhs = model('Mahasiswa')->getMahasiswa($id);
				if ($modelMhs['status']) {
					echo $modelMhs['field'];
				} else {
					$this->response->setStatusCode(404)->setBody("not found data mahasiswa");
				}
			} catch (\Exception $th) {
				throw $th;
			}
		}
	}

	public function updateMahasiswa()
	{
		if ($this->request->isAJAX()) {
			$data = $this->request->getPost();
			
			$data['id_role'] = 2;
			$data['password'] =  password_hash($data['password'], PASSWORD_DEFAULT);
			$files = $this->request->getFile('profile');
			try {
				//code...
				$modelMhs = model('Mahasiswa');
				if ($files > 0) {
					$file = $this->request->getFile('profile');
					$data['foto'] = imgAsset('profil/' . $file->getName());
					$file->move(ROOTPATH . 'assets/img/profil');
				}
				
				try {
					//code...
					$modelMhs->save($data);
				} catch (\Exception $th) {
					die($th->getMessage());
				}
			} catch (\CodeIgniter\Database\Exceptions\DataException $th) {
				die($th->getMessage());
			}
		}
	}

	public function hapusMahasiswa()
	{
		$id = $this->request->getPost('id');
		$modelMhs = model('Mahasiswa');

		try {
			$modelMhs->delete($id);
		} catch (\Exception $th) {
			throw $th;
		}
	}

}
