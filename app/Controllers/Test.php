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
		$files = $this->request->getFile('file');
		try {
			//code...
			$modelSoal = model('Soal');
			if ($files > 0) {
				$file = $this->request->getFile('file')->getTempName();
				$inputFileName = $file;
				echo 'ada file';
				$spreadsheet = IOFactory::load($inputFileName);
				$sheetData = $spreadsheet->getActiveSheet();
				$rowIndex = 2;
				$dataIn = array();

				foreach ($sheetData->getRowIterator() as $row) {
					$p1 = $sheetData->getCell('A' . $rowIndex)->getCalculatedValue();
					$p2 = $sheetData->getCell('D' . $rowIndex)->getCalculatedValue();
					$p3 = $sheetData->getCell('F' . $rowIndex)->getCalculatedValue();
					$p4 = $sheetData->getCell('J' . $rowIndex)->getCalculatedValue();
					if (!empty($p1 || $p2 || $p3 || $p4)) {
						echo "<br><br>";
						$kategori =  $sheetData->getCell('B' . $rowIndex)->getCalculatedValue();

						if ($kategori == "Verbal") {
							$kategori = 1;
						} elseif ($kategori == "Kuantitatif") {
							$kategori = 2;
						} elseif ($kategori == "Logika") {
							$kategori = 3;
						} else {
							$kategori = null;
						}
						$dataIn['id_kategori'] = $kategori;

						$sheetData->getCell('A' . $rowIndex)->getCalculatedValue();
						$jenis = $sheetData->getCell('C' . $rowIndex)->getCalculatedValue();
						switch ($jenis) {
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

						

						$dataIn['soal'] = $sheetData->getCell('D' . $rowIndex)->getCalculatedValue();
						$dataIn['opsi_a'] = $sheetData->getCell('E' . $rowIndex)->getCalculatedValue();
						$dataIn['opsi_b'] = $sheetData->getCell('F' . $rowIndex)->getCalculatedValue();
						$dataIn['opsi_c'] = $sheetData->getCell('G' . $rowIndex)->getCalculatedValue();
						$dataIn['opsi_d'] = $sheetData->getCell('H' . $rowIndex)->getCalculatedValue();
						$soalData = preg_match('/(\d[abcd|\d]*\.png)([^\d\.png](.*)[^\d\.png])/', $dataIn['soal'], $output); 
						$soalDataOpt = preg_match('/(\d[abcd|\d]*\.png)/', $dataIn['soal'], $output); 
						$aData = preg_match('/(\d[abcd|\d]*\.png)/', $dataIn['opsi_a'], $outputA);
						$bData = preg_match('/(\d[abcd|\d]*\.png)/', $dataIn['opsi_b'], $outputB);
						$cData = preg_match('/(\d[abcd|\d]*\.png)/', $dataIn['opsi_c'], $outputC); 
						$dData = preg_match('/(\d[abcd|\d]*\.png)/', $dataIn['opsi_d'], $outputD); 
						$gambar = '';
						$gambarA = '';
						$gambarB = '';
						$gambarC = '';
						$gambarD = '';
						if ($soalData || $soalDataOpt) {

							$gambar = imgAsset('tpa/' . $output[1]);
							
							if ($soalDataOpt)
							{
								$soal = $output[1];
								$dataIn['soal'] = '<img src="'.$gambar.'" style="width:100px;height:100px">';
							}
							else
							{

								$soal = $output[3];
							}

						} 
						if($aData)
						{
							$gambarA = imgAsset('tpa/' . $outputA[1]);
							$dataIn['opsi_a'] = '<img src="'.$gambarA.'" style="width:100px;height:100px">';
						}
						if($bData)
						{
							$gambarB = imgAsset('tpa/' . $outputB[1]);
							$dataIn['opsi_b'] = '<img src="'.$gambarB.'" style="width:100px;height:100px">';
						}
						if($cData)
						{
							$gambarC = imgAsset('tpa/' . $outputC[1]);
							$dataIn['opsi_c'] = '<img src="'.$gambarC.'" style="width:100px;height:100px">';
						}
						if($dData)
						{
							$gambarD = imgAsset('tpa/' . $outputD[1]);
							$dataIn['opsi_d'] = '<img src="'.$gambarD.'" style="width:100px;height:100px">';
						}

						// $dataIn['opsi_a'] = $sheetData->getCell('E' . $rowIndex)->getCalculatedValue();
						// $dataIn['opsi_b'] = $sheetData->getCell('F' . $rowIndex)->getCalculatedValue();
						// $dataIn['opsi_c'] = $sheetData->getCell('G' . $rowIndex)->getCalculatedValue();
						// $dataIn['opsi_d'] = $sheetData->getCell('H' . $rowIndex)->getCalculatedValue();
						$dataIn['jawaban'] = $sheetData->getCell('I' . $rowIndex)->getCalculatedValue();
						// $dataIn['gambar'] = $gambar;
						$dataIn['status'] = $sheetData->getCell('J' . $rowIndex)->getCalculatedValue();
						var_dump($dataIn);
						try {
							
							$modelSoal->save($dataIn);
							echo 'suksess save';
							
						} catch (\Exception $th) {
							die($th->getMessage());
							return redirect()->to(base_url('Dashboard'));
							echo 'gagal save';
						}
					}


					$rowIndex++;
				}
				return redirect()->to(base_url('Dashboard'));
				
			}
		} catch (\CodeIgniter\Database\Exceptions\DataException $th) {
			die($th->getMessage());
			return redirect()->to(base_url('Dashboard'));
			echo 'gagal luar';
		}
	}
}
