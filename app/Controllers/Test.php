<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use phpDocumentor\Reflection\Types\Mixed_;
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class Test extends BaseController
{
	public function index()
	{
		$soalModel = model('soal');
		$inputFileName = ROOTPATH."public/file/daftar_soal.xlsx";
		
		$spreadsheet = IOFactory::load($inputFileName);
		$sheetData = $spreadsheet->getActiveSheet();
		$rowIndex = 4;
		$data = array();

		foreach($sheetData->getRowIterator() as $row)
		{
			$p1 = $sheetData->getCell('A'.$rowIndex)->getCalculatedValue();
			$p2 = $sheetData->getCell('D'.$rowIndex)->getCalculatedValue();
			$p3 = $sheetData->getCell('F'.$rowIndex)->getCalculatedValue();
			$p4 = $sheetData->getCell('J'.$rowIndex)->getCalculatedValue();

			if (!empty($p1 && $p2 && $p3 && $p4) )
			{
				echo "<br><br>";
				$sheetData->getCell('A'.$rowIndex)->getCalculatedValue();
				$jenis = $sheetData->getCell('C'.$rowIndex)->getCalculatedValue();
				switch($jenis)
				{
					case "Sinonim":
					$jenis = 1;
					break;
					case "Antonim":
					$jenis = 2;
					break;
					case "Analogi":
					$jenis = 3;
					break;
					case "Logika Aritmatika":
					$jenis = 4;
					break;
					case "Matematika":
					$jenis = 5;
					break;
					case "Logika Umum":
					$jenis = 6;
					break;
					case "Logika Penalaran ":
					$jenis = 7;
					break;
					case "Gambar/ Spasial":
					$jenis = 8;
					break;
					default:
					$jenis = null;
				}
				$dataIn['id_jenis'] = $jenis;

				$kategori =  $sheetData->getCell('B'.$rowIndex)->getCalculatedValue();

				if ($kategori == "Verbal")
				{
					$kategori = 1;
				} 
				elseif($kategori == "Kuantitatif")
				{
					$kategori = 2;
				}
				elseif($kategori == "Logika")
				{
					$kategori = 3;
				}
				else
				{
					$kategori = null;
				}
				$dataIn['id_kategori'] = $kategori;

				$dataIn['soal'] = $sheetData->getCell('D'.$rowIndex)->getCalculatedValue();
				$soalData = preg_match('/(\d[abcd|\d]*\.png)([^\d\.png](.*)[^\d\.png])/', $dataIn['soal'], $output);
				$gambar = '';
				if ($soalData)
				{
					
					$gambar = imgAsset('soal/'.$output[1]) ;
					$soal = $output[3];
					
					$dataIn['soal'] = $soal;
				}
				else
				{
					$dataIn['soal'] = $sheetData->getCell('D'.$rowIndex)->getCalculatedValue();
				}
				
				$dataIn['opsi_a'] = $sheetData->getCell('E'.$rowIndex)->getCalculatedValue();
				$dataIn['opsi_b'] = $sheetData->getCell('F'.$rowIndex)->getCalculatedValue();
				$dataIn['opsi_c'] = $sheetData->getCell('G'.$rowIndex)->getCalculatedValue();
				$dataIn['opsi_d'] = $sheetData->getCell('H'.$rowIndex)->getCalculatedValue();
				$dataIn['jawaban'] = $sheetData->getCell('I'.$rowIndex)->getCalculatedValue();
				$dataIn['gambar'] = $gambar;
				$dataIn['status'] = $sheetData->getCell('J'.$rowIndex)->getCalculatedValue();
					
			}
			
			
			$rowIndex++;
		}
		
	}
}
