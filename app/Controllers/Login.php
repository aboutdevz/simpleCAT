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
		$session = \Config\Services::session();

		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		$loginState = $this->check($username,$password);

		if ($loginState)
		{
			
			return redirect()->to(base_url('Home'));
		}
		else
		{
			$session->setFlashdata('salahAkun',true);
			return redirect()->to(base_url('Login'));
		}
	}



	private function check($username, $password)
	{
		helper(['gambar']);
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
		else
		{
			try {
				
				$dataMhs = $loginModelMhs->getUser($username);
			} catch (\Exception $th) {
				return false;
			}
			$passCheck = password_verify($password, $dataMhs['field']->password);
			
			if ($dataMhs['field']->nim == $username && $passCheck) 
			{
				$credential = [
					'credential' => [
						'dataMhs' => $dataMhs['field'],
						'role' => $dataMhs['field']->role_name
					]
				];
				$foto = ($credential['credential']['dataMhs']->foto == !null) ? ($credential['credential']['dataMhs']->foto) : (imgAsset('appImg/person-icon.png'));
				$credential['credential']['dataMhs']->foto = $foto;
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
