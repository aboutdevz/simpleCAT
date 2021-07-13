<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Soal extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'soal'
		];
		return view('Soal/index',$data);
	}
}
