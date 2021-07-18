<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfDompdf;

class Hasil extends Controller
{
	public function index()
	{
		$session = \Config\Services::session();
		if ($session->credential['role'] == "mahasiswa") {
			$data = $session->sessionHasil;
			$data['title'] = 'hasil';
			return view('Hasil/index', $data);
		} else {
			// $session->destroy();
			// return redirect()->to(base_url('Login'));
		}
	}



	public function sertifikat()
	{

		$session = \Config\Services::session();
		if ($session->credential['role'] == "mahasiswa") {
			$data = $session->sessionHasil;
			$data['title'] = 'hasil';
			$mpdf = new \Mpdf\Mpdf();

			// Write some HTML code:
			$mpdf->WriteHTML(view('Hasil/sertifikat',$data));

			// Output a PDF file directly to the browser
			$mpdf->Output();
		} else {
			// $session->destroy();
			// return redirect()->to(base_url('Login'));
		}
	}

	public function getSertifikat()
	{
		$session = \Config\Services::session();
		if ($session->credential['role'] == "mahasiswa") {
			$data = $session->sessionHasil;
			$data['title'] = 'hasil';
			echo view('Hasil/sertifikat',$data);
		}
	}
}
