<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Soal extends Controller
{
	public function index()
	{
		helper(['form', 'url']);
		$modelSoal = model('Soal');

		$dataSoal = $modelSoal->getSoal();


		$data = [
			'title' => 'soal',
			'dataSoal' => [
				'verbal' => $dataSoal['field']['verbal'],
				'kuantitatif' => $dataSoal['field']['kuantitatif'],
				'logika' => $dataSoal['field']['logika'],
			]
		];
		return view('Soal/index', $data);
	}

	public function selesai()
	{
		if ($this->request->isAJAX()) {
			$session = \Config\Services::session();

			$modelHasil = model('Hasil');
			$data = $this->request->getPost();
			$data['id_mahasiswa'] = (int)$session->credential['dataMhs']->id;
			$sessionHasil = [
				'sessionHasil' => [
					'nama' => $session->credential['dataMhs']->nama_mhs,
					'nim' => $session->credential['dataMhs']->nim,
					'jurusan' => $session->credential['dataMhs']->prodi,
					'foto' => $session->credential['dataMhs']->foto,
					'verbal' => $data['verbal'],
					'kuantitatif' => $data['kuantitatif'],
					'logika' => $data['logika'],
					'skor' => $data['skor'],
					'scp' => $data['scp']
				]
			];
			$session->set($sessionHasil);
			$ada = $modelHasil->adaHasil($data['id_mahasiswa']);
			try {
				if ($ada['status']) {
					$data['id'] = $ada['id'];
					$modelHasil->save($data);
				} else {
					$modelHasil->save($data);
				}
			} catch (\Exception $th) {

				throw $th;
			}
		}
		return redirect()->to(base_url('Hasil'));
	}

	public function cekJawaban()
	{


		echo (model('Soal')->getJawabanSoal());
	}
}
