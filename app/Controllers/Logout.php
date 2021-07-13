<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
	public function index()
	{
		$session = \Config\Services::session();
		$session->destroy();
		return redirect()->to(base_url('Login'));
	}
}
