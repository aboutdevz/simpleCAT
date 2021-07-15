<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		helper(['form','url']);
		$session = service('session');
		$Kategori = model('Kategori')->findAll();
		$jenis = model('jenisSoal')->findAll();
		$dataMahasiswa = model('Mahasiswa')->findAll();
		$dataSoal = model('Soal')->getSoal();
		if ($session->credential['role'] == "admin") {
			$data = [
				'title' => 'dashboard',
				'kategoriform' => $Kategori,
				'jenisform' => $jenis,
				'dataMahasiswa' => $dataMahasiswa,
				'dataSoal' => $dataSoal['field']
				
			];
			
			return view('Dashboard/index', $data);
		} else {
			return redirect()->to(base_url('Login'));
			
		}
	}

	public function tambahMahasiswa()
	{
		if($this->request->isAJAX())
		{
			$data = $this->request->getPost();
			$data['id_role'] = 2;
			$data['password'] =  password_hash($data['password'],PASSWORD_DEFAULT);
			$files = $this->request->getFile('profile');
			try {
				//code...
				$modelMhs = model('Mahasiswa');
				if ($files > 0)
				{
					$file = $this->request->getFile('profile');
					$data['foto'] = imgAsset('profil/'.$file->getName());
					$file->move(ROOTPATH . 'public/image/profil');
				}
				if($data['kelamin'] == "L")
				{
					$data['kelamin'] = "Laki-Laki";
				}
				else
				{
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
}
