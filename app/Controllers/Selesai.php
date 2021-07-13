<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Selesai extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'selesai'
		];
		return view('Selesai/index',$data);
	}
}
