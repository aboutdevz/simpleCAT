<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllData extends Seeder
{
	public function run()
	{
		$modelRole = model('Role');
		$modelAdmin = model('Admin');
		$modelMahasiswa = model('Mahasiswa');
		$modelKategori = model('Kategori');
		$modelHasil = model('Hasil');
		$modelSoal = model('Soal');
		$modelJenisSoal = model('JenisSoal');

		$modelRole->insert([
			'role_name'      => "admin"
		]);
		$modelRole->insert([
			'role_name'      => "mahasiswa"
		]);
		$modelKategori->insert([
			'kategori' => "Verbal"
		]);
		$modelKategori->insert([
			'kategori' => "Kuantitatif"
		]);
		$modelKategori->insert([
			'kategori' => "Logika"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Sinonim"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Antonim"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Analogi"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Logika Aritmatika"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Matematika"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Logika Umum"
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Logika Penalaran "
		]);
		$modelJenisSoal->insert([
			'jenis_soal' => "Gambar/ Spasial"
		]);

		







		

		$passwordMahasiswa = "mahasiswa";
		$passwordMahasiswa = password_hash($passwordMahasiswa,PASSWORD_DEFAULT);

		$modelMahasiswa->insert([
			'id_role' => 2,
			'nim' => 1001,
			'nama_mhs'=> 'udin',
			'password'=> $passwordMahasiswa,
			'ttl' => 'bandung 10/12/2002',
			'jenis_kelamin' => 'L',
			'prodi' => 'tataboga',
			'email' => 'udin@udin.com',
			'no_hp' => '0810298300129',
			'foto' => 'https://i1.sndcdn.com/avatars-tm1zD1OYWhfcHeAw-kuMfAA-t240x240.jpg'
		]);
		$modelMahasiswa->insert([
			'id_role' => 2,
			'nim' => 1004,
			'nama_mhs'=> 'cika',
			'password'=> $passwordMahasiswa,
			'ttl' => 'bandung 10/12/2002',
			'jenis_kelamin' => 'P',
			'prodi' => 'perikanan',
			'email' => 'udin@udin.com',
			'no_hp' => '0810298300129',
			'foto' => 'https://static.wikia.nocookie.net/naruto/images/9/97/Hinata.png/revision/latest?cb=20170701162302&path-prefix=id'
		]);
		$passwordAdmin = "admin";
		$passwordAdmin = password_hash($passwordAdmin,PASSWORD_DEFAULT);
		$modelAdmin->insert([
			'id_role' => 1,
			'username' => "admin",
			
			'password' => $passwordAdmin
		]);


		
	}
}
