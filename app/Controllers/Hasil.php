<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Hasil extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'hasil'
		];
		return view('Hasil/index',$data);
	}
}
