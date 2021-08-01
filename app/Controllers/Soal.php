<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

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
				'sinonim' => $dataSoal['field']['sinonim'],
				'antonim' => $dataSoal['field']['antonim'],
				'analogi' => $dataSoal['field']['analogi'],
				'logikaMtk' => $dataSoal['field']['logikaMtk'],
				'mtk' => $dataSoal['field']['mtk'],
				'logikaUmum' => $dataSoal['field']['logikaUmum'],
				'logikaNalar' => $dataSoal['field']['logikaNalar'],
				'gambar' => $dataSoal['field']['gambar']
			]
		];

		

	
		return view('Soal/index', $data);
	}

	public function selesai()
	{
		helper(['gambar']);
		if ($this->request->isAJAX()) {
			$session = \Config\Services::session();

			$modelHasil = model('Hasil');
			$data = $this->request->getPost();
			$data['id_mahasiswa'] = (int)$session->credential['dataMhs']->id;
			$time = new Time('now');
		
			$data['tgl'] = $time->toLocalizedString('d MMMM yyyy');

			$sessionHasil = [
				'sessionHasil' => [
					'nama' => $session->credential['dataMhs']->nama_mhs,
					'nim' => $session->credential['dataMhs']->nim,
					'jurusan' => $session->credential['dataMhs']->prodi,
					'foto' => ($session->credential['dataMhs']->foto == !null) ? ($session->credential['dataMhs']->foto) : (imgAsset('appImg/person-icon.png')),
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
		return redirect()->to(base_url('Selesai'));
	}

	public function cekJawaban()
	{
		if($this->request->isAjax())
		{
			try {
				//code...
				$data = model('Soal')->getJawabanSoal();
				$this->response->setJSON($data);
				echo $data;
				$this->response->setStatusCode(200);
			} catch (\Exception $th) {
				echo $th->getMessage();
				die($th->getMessage());
			}
			
		}

	}
}
