<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class Home extends BaseController
{
	public function index()
	{
		$session = service('session');

		if ($session->credential['role'] == "mahasiswa")
		{
			$data = [
				'title' => 'Home'
			];
			return view('Home/index',$data);

		}
		else
		{
			return redirect()->to(base_url('Dashboard'));
		}
	}

}
