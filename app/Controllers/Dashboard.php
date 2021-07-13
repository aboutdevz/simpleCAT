<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		$session = service('session');

		if ($session->credential['role'] == "admin") {
			$data = [
				'title' => 'dashboard'
			];
			return view('Dashboard/index', $data);
		} else {
			return redirect()->to(base_url('Login'));
			
		}
	}
}
