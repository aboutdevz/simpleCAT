<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Soal extends Controller
{
	public function index()
	{
		helper(['form','url']);
		$modelSoal = model('Soal');

		$dataSoal = $modelSoal->getSoal();


		$data = [
			'title' => 'soal',
			'dataSoal' => $dataSoal['field']
		];
		return view('Soal/index',$data);
	}
}
