<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;
use CodeIgniter\Controller;
use Myth\Auth\Password;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;
use PHPUnit\Util\Xml\Validator;

class Login extends Controller
{


	public function index()
	{
		$session = \Config\Services::session();

		helper(['form','url']);

		return view('Login/index');
	}


	public function auth()
	{


		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$loginState = $this->check($username,$password);

		if ($loginState)
		{
			return redirect()->to(base_url('Home'));
		}
		else
		{
			return redirect()->to(base_url('Soal'));
		}
	}



	private function check($username, $password)
	{
		$session = \Config\Services::session();

		$loginModelAdmin = model('Admin');
		$loginModelMhs = model('Mahasiswa');
		$dataAdmin = $loginModelAdmin->getUser($username);
		

		if ($dataAdmin['status'])
		{
			$passCheck = password_verify($password, $dataAdmin['field']->password);
			
			if ($dataAdmin['field']->username == $username && $passCheck) 
			{
				$credential = [
					'credential' => [
						'dataAdmin' => $dataAdmin['field'],
						'role' => $dataAdmin['field']->role_name
					]
				];
				$session->set($credential);
				return true;
			} 
			else 
			{
				return false;
			}
		} 
		elseif ($loginModelMhs->getUser($username)['status'])
		{
			$dataMhs = $loginModelMhs->getUser($username);
			$passCheck = password_verify($password, $dataMhs['field']->password);
			
			if ($dataMhs['field']->nim == $username && $passCheck) 
			{
				$credential = [
					'credential' => [
						'dataMhs' => $dataMhs['field'],
						'role' => $dataMhs['field']->role_name
					]
				];
				$session->set($credential);
				return true;
			} 
			else 
			{
				return false;
			}
		}





		
	}
}
